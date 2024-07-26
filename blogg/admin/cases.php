<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

// Alter the table if necessary
$conn->exec("ALTER TABLE `case` MODIFY `Status` VARCHAR(20)");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['case_id'], $_POST['new_status'])) {
    $case_id = filter_var($_POST['case_id'], FILTER_SANITIZE_NUMBER_INT);
    $new_status = filter_var(trim($_POST['new_status']), FILTER_SANITIZE_STRING);

    // Ensure the status value is valid
    $valid_statuses = ['ongoing', 'pending', 'completed'];
    if (in_array($new_status, $valid_statuses)) {
        $update_status = $conn->prepare("UPDATE `case` SET `Status` = ? WHERE `id` = ?");
        $update_status->execute([$new_status, $case_id]);
    } else {
        echo 'Invalid status value';
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
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
      $select_cases = $conn->prepare("SELECT * FROM `case`");
      $select_cases->execute();
      if ($select_cases->rowCount() > 0) {
         while ($fetch_cases = $select_cases->fetch(PDO::FETCH_ASSOC)) { 
            $case_id = $fetch_cases['id']; 
            $file_path = htmlspecialchars($fetch_cases['Complain_File']);
   ?>
   <div class="box boxxy">
      <p> Case ID : <span><?= htmlspecialchars($case_id); ?></span> </p>
      <p> Name : <span><?= htmlspecialchars($fetch_cases['Name']); ?></span> </p>
      <p> Email : <span><?= htmlspecialchars($fetch_cases['Email']); ?></span> </p>
      <p> Phone : <span><?= htmlspecialchars($fetch_cases['Phone']); ?></span> </p>
      <p> Subject : <span><?= htmlspecialchars($fetch_cases['Subject']); ?></span> </p>
      <p> Status : <span><?= htmlspecialchars($fetch_cases['Status']); ?></span> </p>
      <p> Urgent : <span><?= $fetch_cases['Urgent'] ? 'Yes' : 'No'; ?></span> </p>
      <p> Description : <span><?= htmlspecialchars($fetch_cases['Description']); ?></span> </p>
      <p> Reference No : <span><?= htmlspecialchars($fetch_cases['ReferenceNo']); ?></span> </p>
      <p> Complain File : <a href="../../<?= $file_path ?>" download="<?= basename($file_path) ?>" class="btn">Download File</a></p>
      <form method="POST" action="">
         <input type="hidden" name="case_id" value="<?= $case_id; ?>">
         <p>Update Status:</p>
         <select name="new_status" id="new_status" required>
            <option value="ongoing" <?= $fetch_cases['Status'] == 'ongoing' ? 'selected' : ''; ?>>Ongoing</option>
            <option value="pending" <?= $fetch_cases['Status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="completed" <?= $fetch_cases['Status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
         </select>
         <button type="submit" class="btn">Update Status</button>
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
