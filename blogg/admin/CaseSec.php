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

   <h1 class="heading">Case Section</h1>

   <div class="box-container">
   
   <div class="box">
      <?php
         $select_cases = $conn->prepare("SELECT * FROM `case`");
         $select_cases->execute();
         $numbers_of_cases = $select_cases->rowCount();
      ?>
      <h3><?= $numbers_of_cases; ?></h3>
      <p>Total Cases</p>
      <a href="cases.php" class="btn">see cases</a>
   </div>

   <div class="box">
      <?php
         $select_cases = $conn->prepare("SELECT * FROM `case` WHERE `Status` = 'completed'");
         $select_cases->execute();
         $numbers_of_cases = $select_cases->rowCount();
      ?>
      <h3><?= $numbers_of_cases; ?></h3>
      <p>completed cases</p>
      <a href="CompleteCase.php" class="btn">see cases</a>
   </div>

   <div class="box">
      <?php
         // Correcting the SQL query
         $select_cases = $conn->prepare("SELECT * FROM `case` WHERE `Status` = 'ongoing'");
         $select_cases->execute();
         $numbers_of_cases = $select_cases->rowCount();
      ?>
      <h3><?= $numbers_of_cases; ?></h3>
      <p>ongoing cases</p>
      <a href="onCase.php" class="btn">see cases</a>
   </div>

   <div class="box">
      <?php
         $select_cases = $conn->prepare("SELECT * FROM `case` WHERE `Status` = 'pending'");
         $select_cases->execute();
         $numbers_of_cases = $select_cases->rowCount();
      ?>
      <h3><?= $numbers_of_cases; ?></h3>
      <p>pending cases</p>
      <a href="Pending.php" class="btn">see cases</a>
   </div>

   </div>

</section>

<!-- admin dashboard section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
