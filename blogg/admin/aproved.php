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
    $courtId = $_POST['courtId'];

    try {
        // Begin a transaction
        $conn->beginTransaction();

        // Check for the uniqueness of courtId
        $check_query = $conn->prepare("SELECT COUNT(*) FROM `advocate` WHERE CourtId = ?");
        $check_query->execute([$courtId]);
        $count = $check_query->fetchColumn();

        if ($count > 0) {
            // CourtId already exists
            echo "Error: The NPGRC ID is already in use. Please choose a different ID.";
        } else {
            // Update query to approve and update courtId
            $update_query = $conn->prepare("UPDATE `advocate` SET approved = 1, CourtId = ? WHERE id = ?");
            $update_query->execute([$courtId, $approve_id]);

            // Commit the transaction
            $conn->commit();

            // Redirect to the same page
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollBack();
        echo "Failed to approve advocate: " . $e->getMessage();
    }
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

   <h1 class="heading">Approved Advocate</h1>

   <div class="box-container">
    <?php
  
    $select_account = $conn->prepare("SELECT * FROM `advocate` WHERE approved = 1");
    $select_account->execute();
    if ($select_account->rowCount() > 0) {
        while ($fetch_accounts = $select_account->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $fetch_accounts['id'];
    ?>
            <div class="box">
               <p><span><img src="../../<?= htmlspecialchars($fetch_accounts['Photo']); ?>" alt="Photo" style="max-width:100px;"></span></p>
                <!-- <p>Advocate ID : <span><?= htmlspecialchars($user_id); ?></span></p> -->
                <p>Name : <span><?= htmlspecialchars($fetch_accounts['Name']); ?></span></p>
                <p>Court : <span><?= htmlspecialchars($fetch_accounts['Court']); ?></span></p>
                <p>State : <span><?= htmlspecialchars($fetch_accounts['State']); ?></span></p>
                <p>Office Address : <span><?= htmlspecialchars($fetch_accounts['officeAdd']); ?></span></p>
                <p>Chamber Address : <span><?= htmlspecialchars($fetch_accounts['chamberAdd']); ?></span></p>
                <p>Email : <span><?= htmlspecialchars($fetch_accounts['Email']); ?></span></p>
                <p>Phone : <span><?= htmlspecialchars($fetch_accounts['Phone']); ?></span></p>
                <p>Enrollment ID : <span><?= htmlspecialchars($fetch_accounts['EnrollmentId']); ?></span></p>
                <p>Npgrc ID : <span><?= htmlspecialchars($fetch_accounts['CourtId']); ?></span></p>
                <p>Date : <span><?= htmlspecialchars($fetch_accounts['date']); ?></span></p>
                <!-- <p>Approved : <span><?= $fetch_accounts['approved'] ? 'Yes' : 'No'; ?></span></p> -->
                <div class="flex-btn">
                    <a href="edit_user.php?id=<?= htmlspecialchars($user_id); ?>" class="option-btn">edit</a>
                </div>
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
