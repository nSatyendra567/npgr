<?php 

include 'blogg/components/connect.php';
include 'partials/header.php';


?>

<main class="w-full min-h-screen flex justify-center bg-gray-100">
    <div class="max-w-7xl flex flex-col md:flex-row w-full justify-center gap-10 py-10 md:py-16 px-10">
        <div class="w-full md:w-1/2 flex flex-col gap-5 bg-white rounded-lg md:p-8 p-4">
            <h2 class="text-2xl sm:text-3xl md:text-4xl text-center font-semibold text-gray-800">Register Your Complaint</h2>
            <p class="text-sm text-gray-600 sm:text-right">Fields marked with <span class="text-red-500">*</span> are mandatory</p>
            <?php
function generateSecureUniqueId($prefix = 'NPGRC/PTN', $filename = 'last_sequence.txt') {
    if (!file_exists($filename)) {
        file_put_contents($filename, '1000');
    }

    $lastSequenceNumber = (int) file_get_contents($filename);

    $newSequenceNumber = $lastSequenceNumber + 1;

    file_put_contents($filename, (string) $newSequenceNumber);

    $uniqueId = sprintf('%s/%04d', $prefix, $newSequenceNumber);

    return $uniqueId;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = '6Ld0FxoqAAAAAIEh0KTiqvSuM6DdONgorOFEAUA0';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
    $responseKeys = json_decode($response, true);
    if (intval($responseKeys["success"]) !== 1) {
        echo "<p class='text-red-600 text-center font-semibold'>Please complete the captcha.</p>";
    } else {
        // Sanitize user inputs
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $urgent = isset($_POST['urgent']) ? 1 : 0;

        // Initialize file path as null
        $filePath = null;
        $fileUploadError = null;

        // Handle file upload
        if (isset($_FILES['complain-file']) && $_FILES['complain-file']['error'] != UPLOAD_ERR_NO_FILE) {
            if ($_FILES['complain-file']['error'] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['complain-file']['tmp_name'];
                $fileName = $_FILES['complain-file']['name'];
                $fileSize = $_FILES['complain-file']['size'];
                $fileType = $_FILES['complain-file']['type'];

                // Define the target directory and file path
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                // Generate a unique name for the file
                $uniqueFileName = uniqid('', true) . '.' . $fileExtension;

                // Define the target directory and file path
                $uploadDir = 'Complaint/'; // Make sure this directory exists and is writable
                $filePath = $uploadDir . $uniqueFileName;

                // Move the uploaded file to the target directory
                if (!move_uploaded_file($fileTmpPath, $filePath)) {
                    $fileUploadError = "Error uploading file.";
                }
            } else {
                $fileUploadError = "Error: " . $_FILES['complain-file']['error'];
            }
        }

        if ($fileUploadError === null) {
            $referenceNo = generateSecureUniqueId();

            // Prepare SQL query using PDO
            $sql = "INSERT INTO `case` (Name, Email, Phone, Subject, Complain_File, Description, Status, Urgent, ReferenceNo) VALUES (?, ?, ?, ?, ?, ?, 'Pending', ?, ?)";
            $stmt = $conn->prepare($sql);

            // Execute the statement
            if ($stmt->execute([$name, $email, $phone, $subject, $filePath, $description, $urgent, $referenceNo])) {
                echo "<p class='text-green-600 text-center font-semibold'>Record inserted successfully.</p>
                      <p class='text-green-600 text-center font-semibold'>Your Reference No. for this Registered Case is : $referenceNo</p>";
                      // Send email to the user
                $to = $email;
                $userSubject = "NPGRC:Your Case Registration Confirmation";
                $headers = "From: no-reply@npgrcomission.in\r\n";
                $headers .= "Reply-To: no-reply@npgrcomission.in\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                // Email content
                $message = "
                <html>
                <head>
                    <title>NPGRC Case Registration Confirmation</title>
                </head>
                <body>
                    <p>Hello $name</p>
                    <p>Your case has been registered with NPGRC.</p>
                    <p><strong>Your Diary number is: $referenceNo</strong></p>
                    <p>This diary number will be used for future references. Please do not reply to this mail</p>
                    <p>To check your case status, please click the button below:</p>
                    <p><a href='http://npgrcommission.in/case-status' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Check Your Case Status</a></p>
                    <p>Thank you for contacting us!</p>
                    <p>NPGRC Legal Team (New Delhi)</p>
                    <a href='www.npgrcommission.in '>www.npgrcommission.in </a>
                </body>
                </html>
                ";
                // Send notification email to admin
                $adminEmail = 'complaint@npgrcommission.in'; // Replace with your admin email address
                $adminSubject = "New Case Registration Notification";
                $adminHeaders = "From: no-reply@npgrcomission.in\r\n";
                $adminHeaders .= "Reply-To: no-reply@npgrcomission.in\r\n";
                $adminHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";

                // Email content for admin
                $adminMessage = "
                <html>
                <head>
                    <title>New Case Registration Notification</title>
                </head>
                <body>
                    <p>A new case has been registered by a user.</p>
                    <p><strong>User Details:</strong></p>
                    <ul>
                        <li><strong>Name:</strong> $name</li>
                        <li><strong>Email:</strong> $email</li>
                        <li><strong>Phone:</strong> $phone</li>
                        <li><strong>Subject:</strong> $subject</li>
                        <li><strong>Description:</strong> $description</li>";

                // Check if a file was uploaded
                if (isset($_FILES['complain-file']) && $_FILES['complain-file']['error'] != UPLOAD_ERR_NO_FILE) {
                    $adminMessage .= "<li><strong>File:</strong> <a href='https://npgrcomission.in/$filePath'>$filePath</a></li>";
                }

                $adminMessage .= "
                        <li><strong>Dairy No:</strong> $referenceNo</li>
                    </ul>
                    <p>Thank you!</p>
                </body>
                </html>
                ";

                // Send the email to the admin
                // Send the email
                if (mail($to, $userSubject, $message, $headers) && mail($adminEmail, $adminSubject, $adminMessage, $adminHeaders)) {
                    echo "<p class='text-green-600 text-center font-semibold'>A confirmation email with Refrence Number has been sent to your email.</p>";
                } else {
                    echo "<p class='text-red-600 text-center font-semibold'>Error sending email.(please take note of the refrence no.)</p>";
                }

            } else {
                echo "<p class='text-red-600 text-center font-semibold'>Error inserting record: " . $stmt->errorInfo()[2] . "</p>";
            }
        } else {
            echo "<p class='text-red-600 text-center font-semibold'>$fileUploadError</p>";
        }
    }
}
?>

            <form class="flex flex-col gap-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="name">Name: <span class="text-red-500">*</span></label>
                    <input name="name" class="focus:outline-none focus:border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter your Full Name" autocomplete="off" required />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="email">Email: <span class="text-red-500">*</span></label>
                    <input name="email" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="email" placeholder="Enter your Email Id" autocomplete="off" required />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="phone">Phone: <span class="text-red-500">*</span></label>
                    <input name="phone" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="tel" placeholder="Enter phone like 9827645321" autocomplete="off" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="subject">Subject: <span class="text-red-500">*</span></label>
                    <input name="subject" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter complaint subject" autocomplete="off" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="complain-file">Complain File:</label>
                    <input name="complain-file" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="file" >
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="description">Description:</label>
                    <textarea name="description" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" placeholder="Enter complaint description" rows="4"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700">
                        <input type="checkbox" name="declaration-consent" class="mr-2" required>
                        l declare that the details provided are true & correct to the best of my knowledge. I am also aware that providing false information/uploading forged documents is an offence under relevant legal provision. 
                    </label>
                </div>
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <div class="flex flex-col gap-2">
                    <input class="outline-none focus:outline-none py-2 px-2 w-full rounded-md text-lg bg-yellow cursor-pointer text-white hover:text-xl transition-all duration-150" type="submit" value="Submit" />
                </div>
            </form>
        </div>
        <!-- <div class="w-full md:w-1/2 flex flex-col gap-10 bg-white rounded-lg p-8">
            <div class="mt-10 mb-10">
                <h1 class="text-center text-2xl font-semibold text-gray-800">Structure of NPGRC Commission</h1>
            </div>
            <figure class="relative w-full h-auto">
                <img class="w-full h-full object-contain" src="./images/npgrc-structure.png" alt="NPGRC" />
            </figure>
        </div> -->
    </div>
</main>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Ld0FxoqAAAAAJt3OkVwW4SyxmCt6hAdGYSZ2ZLq', {action: 'submit'}).then(function(token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>

<?php include 'partials/logos.php' ?>
<?php include 'partials/footer.php' ?>
