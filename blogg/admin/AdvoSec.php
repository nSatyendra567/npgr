<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading">Advocates Section</h1>

   <div class="box-container">

   <div class="box">
      <?php
         $select_users = $conn->prepare("SELECT * FROM `advocate`");
         $select_users->execute();
         $numbers_of_users = $select_users->rowCount();
      ?>
      <h3><?= $numbers_of_users; ?></h3>
      <p>Total No. Advocate</p>
      <a href="users_accounts.php" class="btn">see advocate</a>
   </div>
   


   <div class="box">
      <?php
         $not_approved = $conn->prepare("SELECT * FROM `advocate` WHERE approved = 0");
         $not_approved->execute();
         $numbers_of_not_approved = $not_approved->rowCount();
      ?>
      <h3><?= $numbers_of_not_approved; ?></h3>
      <p>Not Approved Advocate</p>
      <a href="not_aproved.php" class="btn">see not aproved</a>
   </div>
   <div class="box">
      <?php
         $not_approved = $conn->prepare("SELECT * FROM `advocate` WHERE approved = 1");
         $not_approved->execute();
         $numbers_of_not_approved = $not_approved->rowCount();
      ?>
      <h3><?= $numbers_of_not_approved; ?></h3>
      <p>Approved Advocate</p>
      <a href="aproved.php" class="btn">see aproved Advocate</a>
   </div>

   </div>

</section>

<!-- admin dashboard section ends -->










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>