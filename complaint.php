<?php 

include 'blogg/components/connect.php';
include 'partials/header.php';


?>

<main class="w-full min-h-screen flex justify-center bg-gray-100">
    <div class="max-w-7xl flex flex-col md:flex-row w-full justify-between gap-10 py-10 md:py-16 px-10">
        <div class="w-full md:w-1/2 flex flex-col gap-5 bg-white rounded-lg p-8">
            <h2 class="text-2xl sm:text-3xl md:text-4xl text-center font-semibold text-gray-800">Register Your Complaint</h2>
            <p class="text-sm text-gray-600 text-right">Fields marked with <span class="text-red-500">*</span> are mandatory</p>
            <?php
                function generateSecureUniqueId($length = 8) {
                    $currentYear = date('ymd');
                    return $currentYear . ":" . bin2hex(openssl_random_pseudo_bytes($length));
                }
                
                // Process form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Sanitize user inputs
                    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
                    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
                    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
                    $urgent = isset($_POST['urgent']) ? 1 : 0;
                
                    // Handle file upload
                    if (isset($_FILES['complain-file']) && $_FILES['complain-file']['error'] == UPLOAD_ERR_OK) {
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
                        if (move_uploaded_file($fileTmpPath, $filePath)) {
                            $referenceNo = generateSecureUniqueId();
                
                            // Prepare SQL query using PDO
                            $sql = "INSERT INTO `case` (Name, Email, Phone, Subject, Complain_File, Description, Status, Urgent, ReferenceNo) VALUES (?, ?, ?, ?, ?, ?, 'Pending', ?, ?)";
                            $stmt = $conn->prepare($sql);
                
                            // Execute the statement
                            if ($stmt->execute([$name, $email, $phone, $subject, $filePath, $description, $urgent, $referenceNo])) {
                                echo "<p class='text-green-600 text-center font-semibold'>Record inserted successfully.</p>
                                      <p class='text-green-600 text-center font-semibold'>Your Refrence No. for this Registerd Case is : $referenceNo</p>        
                                ";
                            } else {
                                echo "<p class='text-red-600 text-center font-semibold'>Error inserting record: " . $stmt->errorInfo()[2] . "</p>";
                            }
                        } else {
                            echo "<p class='text-red-600 text-center font-semibold'>Error uploading file.</p>";
                        }
                    } else {
                        echo "<p class='text-red-600'>Error: " . $_FILES['complain-file']['error'] . "</p>";
                    }
                }
                
            ?>
            <form class="flex flex-col gap-5" action="" method="POST" enctype="multipart/form-data">
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
                    <label class="text-base font-semibold text-gray-700" for="complain-file">Complain File: <span class="text-red-500">*</span></label>
                    <input name="complain-file" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="file" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="description">Description:</label>
                    <textarea name="description" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" placeholder="Enter complaint description" rows="4"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <input class="outline-none focus:outline-none py-2 px-2 w-full rounded-md text-lg bg-yellow cursor-pointer text-white hover:text-xl transition-all duration-150" type="submit" value="Submit" />
                </div>
            </form>
        </div>
        <div class="w-full md:w-1/2 flex flex-col gap-10 bg-white rounded-lg p-8">
            <div class="mt-10 mb-10">
                <h1 class="text-center text-2xl font-semibold text-gray-800">Structure of NPGRC Commission</h1>
            </div>
            <figure class="relative w-full h-auto">
                <img class="w-full h-full object-contain" src="./images/npgrc-structure.png" alt="NPGRC" />
            </figure>
        </div>
    </div>
</main>

<?php include 'partials/logos.php' ?>
<?php include 'partials/footer.php' ?>
