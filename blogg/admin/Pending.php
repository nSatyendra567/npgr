<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

// Alter the table if necessary
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if (isset($_POST['case_id'])) {
       $case_id = filter_var($_POST['case_id'], FILTER_SANITIZE_NUMBER_INT);
   }

   if (isset($_POST['delete_case'])) {
       // Handle case deletion
       $delete_case = $conn->prepare("DELETE FROM `case` WHERE `id` = ?");
       $delete_case->execute([$case_id]);

       // Add a message for successful deletion
       $message[] = 'Case deleted successfully.';

       // Redirect to the same page
       header('Location: ' . $_SERVER['PHP_SELF']);
       exit();
   } elseif (isset($_POST['new_status'], $_POST['updates'], $_POST['email'])) {
       // Handle status and updates update
       $new_status = filter_var(trim($_POST['new_status']), FILTER_SANITIZE_STRING);
       $updates = filter_var(trim($_POST['updates']), FILTER_SANITIZE_STRING);
       $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
       $name = $_POST['name'];

       // Fetch current case details
       $fetch_case = $conn->prepare("SELECT `Status`, `updates` FROM `case` WHERE `id` = ?");
       $fetch_case->execute([$case_id]);
       $current_case = $fetch_case->fetch(PDO::FETCH_ASSOC);

       // Ensure the status value is valid
       $valid_statuses = ['On going', 'Pending', 'Completed'];
       if (in_array($new_status, $valid_statuses)) {
           if ($new_status == $current_case['Status'] && $updates == $current_case['updates']) {
               // No change detected
               $message[] = 'No changes detected. Please modify the status or updates.';
           } else {
               // Update the status and updates
               $update_status = $conn->prepare("UPDATE `case` SET `Status` = ?, `updates` = ? WHERE `id` = ?");
               $update_status->execute([$new_status, $updates, $case_id]);

               // Send email notification
               $to = $email;
               $subject = 'Case Status Updated';
               $message_body = "
               <p>Hello {$name},</p>
               <p>Your case status has been updated.</p>
               <p>To check your case status, please click the button below:</p>
               <p><a href='http://npgrcommission.in/case-status' style='display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Check Your Case Status</a></p>
               <p>Thank you for contacting us!</p>
               <p>NPGRC Legal Team (New Delhi)</p>
               <a href='www.npgrcommission.in '>www.npgrcommission.in </a>
               ";
               $headers = 'From: no-reply@npgrcommission.in' . "\r\n" .
               $headers .= "Reply-To: no-reply@npgrcomission.in\r\n";
               $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
               $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";;

               if (mail($to, $subject, $message_body, $headers)) {
                   $message[] = 'Case updated successfully and email sent.';
               } else {
                   $message[] = 'Case updated successfully, but email sending failed.';
               }

               // Redirect to the same page
               header('Location: ' . $_SERVER['PHP_SELF']);
               exit();
           }
       } else {
           $message[] = 'Invalid status value.';
       }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- users accounts section starts  -->

<section class="accounts">

   <h1 class="heading">Cases Details</h1>

   <div class="box-container">

   <?php
      $select_cases = $conn->prepare("SELECT * FROM `case` WHERE `Status` = 'pending'");
      $select_cases->execute();
      if ($select_cases->rowCount() > 0) {
         while ($fetch_cases = $select_cases->fetch(PDO::FETCH_ASSOC)) { 
            $case_id = $fetch_cases['id']; 
            $file_path = htmlspecialchars($fetch_cases['Complain_File']);
   ?>
   <div class="box boxxy">
      <p> File No. : <span><?= htmlspecialchars($case_id); ?></span> </p>
      <p> Name : <span><?= htmlspecialchars($fetch_cases['Name']); ?></span> </p>
      <p> Email : <span><?= htmlspecialchars($fetch_cases['Email']); ?></span> </p>
      <p> Phone : <span><?= htmlspecialchars($fetch_cases['Phone']); ?></span> </p>
      <p> Subject : <span><?= htmlspecialchars($fetch_cases['Subject']); ?></span> </p>
      <p> Status : <span><?= htmlspecialchars($fetch_cases['Status']); ?></span> </p>
      <p> Urgent : <span><?= $fetch_cases['Urgent'] ? 'Yes' : 'No'; ?></span> </p>
      <p> Description : <span><?= htmlspecialchars($fetch_cases['Description']); ?></span> </p>
      <p> Reference No : <span><?= htmlspecialchars($fetch_cases['ReferenceNo']); ?></span> </p>
      <?php if (!empty($file_path)): ?>
      <p> Complain File : <a href="../../<?= $file_path ?>" download="<?= basename($file_path) ?>" class="btn">Download File</a></p>
      <?php endif; ?>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="box">
         <input type="hidden" name="case_id" value="<?= $case_id; ?>">
         <input type="hidden" name="email" value="<?= htmlspecialchars($fetch_cases['Email']); ?>">
         <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_cases['Name']); ?>">
         <p>Update Status:</p>
         <select name="new_status" id="new_status" required style="font-size:18px ">
            <option value="On going" <?= $fetch_cases['Status'] == 'On going' ? 'selected' : ''; ?>>On going</option>
            <option value="Pending" <?= $fetch_cases['Status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="Completed" <?= $fetch_cases['Status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
         </select>
         <input type="text" name="updates" value="<?= htmlspecialchars($fetch_cases['updates']); ?>" class="box" placeholder="Updates" required>
         <button type="submit" class="btn">Update Status</button>
         <input type="submit" value="Delete Case" class="delete-btn" onclick="return confirm('delete this Case?');" name="delete_case">
      </form>
   </div>
   <?php
         }
      } else {
         echo '<p class="empty">No cases available</p>';
      }
   ?>

   </div>

</section>

<!-- cases details section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
