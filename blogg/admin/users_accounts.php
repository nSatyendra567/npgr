<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
   exit();
}
$message = [];
// Handle the approve action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve_id'])) {
    $approve_id = $_POST['approve_id'];
    $courtId = $_POST['courtId'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    
    try {
        // Begin a transaction
        $conn->beginTransaction();

        // Check for the uniqueness of courtId
        $check_query = $conn->prepare("SELECT COUNT(*) FROM `advocate` WHERE CourtId = ?");
        $check_query->execute([$courtId]);
        $count = $check_query->fetchColumn();

        if ($count > 0) {
            // CourtId already exists
            $message[] = 'Error: The NPGRC ID is already in use. Please choose a different ID.';
        } else {
            // Update query to approve and update courtId
            $update_query = $conn->prepare("UPDATE `advocate` SET approved = 1, CourtId = ? WHERE id = ?");
            $update_query->execute([$courtId, $approve_id]);

            // Commit the transaction
            $conn->commit();

            // Send email to advocate
            $subject = "Approval Notification from NPGRC";
            $body = "
                <html>
                <head>
                    <title>Approval Notification from NPGRC</title>
                </head>
                <body>
                    <p>Hello {$name},</p>
                    <p>Your request for collaborating with NPGRC is approved. </p>
                    <p>Your NPGRC ID is: $courtId</p>
                    <p>Thank you for your collaboration with NPGRC.</p>
                    <p>NPGRC Legal Team (New Delhi)</p>
                    <a href='www.npgrcommission.in '>www.npgrcommission.in </a>
                </body>
                </html>
                ";
                $headers = "From: no-reply@npgrcommission.in\r\n";
                $headers .= "Reply-To: no-reply@npgrcommission.in\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            if (mail($email, $subject, $body, $headers)) {
                $message[] = "Advocate approved and email sent to $email.";
            } else {
                $message[] = "Advocate approved, but email could not be sent.";
            }

            // Redirect to the same page
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollBack();
        $message[] = "Failed to approve advocate: " . $e->getMessage();
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Advocate</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- users accounts section starts  -->

<section class="accounts">

   <h1 class="heading">Advocates</h1>

   <div class="box-container">
    <?php
  
    $select_account = $conn->prepare("SELECT * FROM `advocate`");
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
                <?php if ($fetch_accounts['approved']) { ?>
                <p>Npgrc ID : <span><?= htmlspecialchars($fetch_accounts['CourtId']); ?></span></p>
                <?php } ?>
                <p>Date : <span><?= htmlspecialchars($fetch_accounts['date']); ?></span></p>
                <p>Approved : <span><?= $fetch_accounts['approved'] ? 'Yes' : 'No'; ?></span></p>
                <div class="flex-btn">
                    <a href="edit_user.php?id=<?= htmlspecialchars($user_id); ?>" class="option-btn">edit</a>
                </div>
                <?php if (!$fetch_accounts['approved']) { ?>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="approve_id" value="<?= htmlspecialchars($user_id); ?>">
                        <input type="hidden" name="name" value="<?= htmlspecialchars($fetch_accounts['Name']); ?>">
                        <input type="hidden" name="email" value="<?= htmlspecialchars($fetch_accounts['Email']); ?>">
                        <p>Npgrc ID <span>*</span></p>
                        <input type="text" name="courtId" maxlength="50" required placeholder="NPGRC ID" class="box" value="<?= $fetch_accounts['CourtId']; ?>" required >
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
