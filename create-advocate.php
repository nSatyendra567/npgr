<?php 
include 'partials/header.php';
include 'config/data.php';
include 'blogg/components/connect.php';
 ?>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize user inputs
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $court = filter_var($_POST['court'], FILTER_SANITIZE_STRING);
            $state = filter_var($_POST['states'], FILTER_SANITIZE_STRING);
            $officeAddress = filter_var($_POST['office-address'], FILTER_SANITIZE_STRING);
            $chamberAddress = filter_var($_POST['chamber-address'], FILTER_SANITIZE_STRING);
            $mobileNumber = filter_var($_POST['mobile_number'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $enrollmentId = filter_var($_POST['enrollment-id'], FILTER_SANITIZE_STRING);
            // $courtId = filter_var($_POST['court-id'], FILTER_SANITIZE_STRING);
            $date = date('Y-m-d'); // Assuming the current date
            $approved = isset($_POST['urgent']) ? 1 : 0;
        
            // Handle file upload
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['photo']['tmp_name'];
                $fileName = $_FILES['photo']['name'];
                $fileSize = $_FILES['photo']['size'];
                $fileType = $_FILES['photo']['type'];
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
                // Generate a unique name for the file
                $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
                $uploadDir = 'advocate/'; // Make sure this directory exists and is writable
                $filePath = $uploadDir . $uniqueFileName;
        
                // Move the uploaded file to the target directory
                if (move_uploaded_file($fileTmpPath, $filePath)) {
                    // Prepare SQL query using PDO
                    $sql = "INSERT INTO advocate (Name, Photo, Court, State, officeAdd, chamberAdd, Email, Phone, EnrollmentId , date, approved) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
        
                    // Execute the statement
                    if ($stmt->execute([$name, $filePath, $court, $state, $officeAddress, $chamberAddress, $email, $mobileNumber, $enrollmentId, $date, $approved])) {
                        $to = $email;
                $userSubject = "Request for Collaboration with NPGRC";
                $headers = "From: no-reply@npgrcommission.in\r\n";
                $headers .= "Reply-To: no-reply@npgrcommission.in\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                // Email content for user
                $message = "
                <html>
                <head>
                    <title>Onboarding Confirmation</title>
                </head>
                <body>
                    <p>Hello {$name},</p>
                    <p>Your request for collaborating with NPGRC has been submitted. We will review this and get in touch with you at the earliest. </p>
                    <p>Thank you</p>
                    <p>NPGRC Legal Team (New Delhi)</p>
                    <a href='www.npgrcommission.in '>www.npgrcommission.in </a>
                </body>
                </html>
                ";

                // Send notification email to admin
                $adminEmail = 'complaint@npgrcommission.in'; // Replace with your admin email address
                $adminSubject = "New Advocate Onboarding Notification";
                $adminHeaders = "From: no-reply@npgrcommission.in\r\n";
                $adminHeaders .= "Reply-To: no-reply@npgrcommission.in\r\n";
                $adminHeaders .= "Content-Type: text/html; charset=UTF-8\r\n";

                // Email content for admin
                $adminMessage = "
                <html>
                <head>
                    <title>New Advocate Onboarding Notification</title>
                </head>
                <body>
                    <p>A new advocate has been onboarded by a user.</p>
                    <p><strong>Advocate Details:</strong></p>
                    <ul>
                        <li><strong>Name:</strong> $name</li>
                        <li><strong>Email:</strong> $email</li>
                        <li><strong>Phone:</strong> $mobileNumber</li>
                        <li><strong>Court:</strong> $court</li>
                        <li><strong>State:</strong> $state</li>
                        <li><strong>Office Address:</strong> $officeAddress</li>
                        <li><strong>Chamber Address:</strong> $chamberAddress</li>
                        <li><strong>Enrollment ID:</strong> $enrollmentId</li>
                        <li><strong>Photo:</strong> <a href='https://npgrcommission.in/$filePath'>Profile Photo</a></li>
                        <li><strong>Date:</strong> $date</li>
                        <li><strong>Approved:</strong> $approved</li>
                    </ul>
                    <p>Thank you!</p>
                </body>
                </html>
                ";

                // Send the email to the user and admin
                if (mail($to, $userSubject, $message, $headers) && mail($adminEmail, $adminSubject, $adminMessage, $adminHeaders)) {
                    echo "<p class='text-green-600 text-center font-semibold'>Your request have been submitted to NPGRC. Thank you.</p>";
                } else {
                    echo "<p class='text-red-600 text-center font-semibold'>Record inserted, but error sending emails.</p>";
                }
                    } else {
                        echo "<p class='text-red-600 text-center font-semibold'>Error inserting record: " . $stmt->errorInfo()[2] . "</p>";
                    }
                } else {
                    echo "<p class='text-red-600 text-center font-semibold'>Error uploading file.</p>";
                }
            } else {
                echo "<p class='text-red-600'>Error: " . $_FILES['photo']['error'] . "</p>";
            }
        }
    ?>
<main class="w-full min-h-screen flex justify-center py-10">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md w-full max-w-xl">
        <h2 class="text-2xl sm:text-3xl md:text-4xl text-center font-semibold text-gray-800 mb-5">Register With NPGRC</h2>
        <p class="text-sm text-gray-600 sm:text-right mb-5">Fields marked with <span class="text-red-500 text-base font-bold">*</span> are mandatory</p>
        <div class="mb-4">
            <label for="name" class="block text-base font-bold text-gray-700">Name<span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-base font-bold text-gray-700">Photo<span class="text-red-500">*</span></label>
            <input type="file" name="photo" id="photo" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="court" class="block text-base font-bold text-gray-700">Court<span class="text-red-500">*</span></label>
            <input type="text" name="court" id="court" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="states" class="block text-base font-bold text-gray-700">State<span class="text-red-500">*</span></label>

            <select id="states" name="states" class="mt-1 py-2 w-full px-2 outline-none w-full text-lg rounded" required>
                <option value="">Select a state</option>
                <?php foreach (STATE_NAME as $state) : ?>
                    <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="office-address" class="block text-base font-bold text-gray-700">Office Address<span class="text-red-500">*</span></label>
            <textarea name="office-address" id="office-address" required class="mt-1 p-2 w-full border border-gray-300 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label for="chamber-address" class="block text-base font-bold text-gray-700">Chamber Address<span class="text-red-500">*</span></label>
            <textarea name="chamber-address" id="chamber-address" required class="mt-1 p-2 w-full border border-gray-300 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label for="mobile_number" class="block text-base font-bold text-gray-700">Mobile Number<span class="text-red-500">*</span></label>
            <input type="text" name="mobile_number" id="mobile_number" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-base font-bold text-gray-700">Email ID<span class="text-red-500">*</span></label>
            <input type="email" name="email" id="email" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="enrollment-id" class="block text-base font-bold text-gray-700">Enrollment Id<span class="text-red-500">*</span></label>
            <input type="text" name="enrollment-id" id="enrollment-id" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-base font-semibold text-gray-700">
                <input type="checkbox" name="declaration-consent" class="mr-2" required>
                I hereby consent to accept the <span class="text-purple-700 font-bold"><a href="./declaration.php" target="_blank" >declaration</a></span> to collaborate with the National Public Grievances Redressal Commission (NPGRC).
            </label>
        </div>
        <div class="mt-6">
            <button type="submit" class="w-full bg-yellow text-white p-2 rounded">Submit</button>
        </div>
    </form>
</main>

<?php include 'partials/footer.php' ?>