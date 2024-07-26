<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
   exit();
}

// Handle the approve action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_id'])) {
   $approve_id = $_POST['approve_id'];
   $update_query = $conn->prepare("UPDATE `advocate` SET approved = 1 WHERE id = ?");
   $update_query->execute([$approve_id]);
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
   <title>Users Accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- users accounts section starts  -->

<section class="accounts">

   <h1 class="heading">Not Approved Advocate</h1>

   <div class="box-container">
    <?php
  
    $select_account = $conn->prepare("SELECT * FROM `advocate` WHERE approved = 0");
    $select_account->execute();
    if ($select_account->rowCount() > 0) {
        while ($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $fetch_accounts['id'];
    ?>
            <div class="box">
               <p><span><img src="../../<?= htmlspecialchars($fetch_accounts['Photo']); ?>" alt="Photo" style="max-width:100px;"></span></p>
                <p>Advocate ID : <span><?= htmlspecialchars($user_id); ?></span></p>
                <p>Name : <span><?= htmlspecialchars($fetch_accounts['Name']); ?></span></p>
                <p>Court : <span><?= htmlspecialchars($fetch_accounts['Court']); ?></span></p>
                <p>State : <span><?= htmlspecialchars($fetch_accounts['State']); ?></span></p>
                <p>Office Address : <span><?= htmlspecialchars($fetch_accounts['officeAdd']); ?></span></p>
                <p>Chamber Address : <span><?= htmlspecialchars($fetch_accounts['chamberAdd']); ?></span></p>
                <p>Email : <span><?= htmlspecialchars($fetch_accounts['Email']); ?></span></p>
                <p>Phone : <span><?= htmlspecialchars($fetch_accounts['Phone']); ?></span></p>
                <p>Enrollment ID : <span><?= htmlspecialchars($fetch_accounts['EnrollmentId']); ?></span></p>
                <p>Court ID : <span><?= htmlspecialchars($fetch_accounts['CourtId']); ?></span></p>
                <p>Date : <span><?= htmlspecialchars($fetch_accounts['date']); ?></span></p>
                <p>Approved : <span><?= $fetch_accounts['approved'] ? 'Yes' : 'No'; ?></span></p>
                <?php if (!$fetch_accounts['approved']) { ?>
                    <form method="POST" action="">
                        <input type="hidden" name="approve_id" value="<?= htmlspecialchars($user_id); ?>">
                        <button type="submit" class="btn">Approve</button>
                    </form>
                <?php } ?>
            </div>
    <?php
        }
    } else {
        echo '<p class="empty">No advocates available</p>';
    }
    ?>
</div>

</section>

<!-- users accounts section ends -->

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
