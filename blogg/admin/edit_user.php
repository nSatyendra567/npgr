<?php
include '../components/connect.php';
include '../../config/data.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit;
}

$message = [];

// Check if the form is submitted to save or delete an advocate
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handling save advocate request
    if (isset($_POST['save'])) {
        $advocate_id = filter_var($_POST['advocate_id'], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $court = filter_var($_POST['court'], FILTER_SANITIZE_STRING);
        $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
        $officeAdd = filter_var($_POST['officeAdd'], FILTER_SANITIZE_STRING);
        $chamberAdd = filter_var($_POST['chamberAdd'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $enrollmentId = filter_var($_POST['enrollmentId'], FILTER_SANITIZE_STRING);
        $courtId = filter_var($_POST['courtId'], FILTER_SANITIZE_STRING);
        $status = filter_var($_POST['approved'], FILTER_SANITIZE_EMAIL);
        // Update the advocate in the database
        $update_advocate = $conn->prepare("UPDATE `advocate` SET Name = ?, Court = ?, State = ?, officeAdd = ?, chamberAdd = ?, Email = ?, Phone = ?, EnrollmentId = ?, CourtId = ?, approved = ? WHERE id = ?");
        $update_advocate->execute([$name, $court, $state, $officeAdd, $chamberAdd, $email, $phone, $enrollmentId, $courtId, $status, $advocate_id]);

        $message[] = 'Advocate updated!';

        // Handle image upload
        $old_image = $_POST['old_image'];
        $image = $_FILES['photo']['name'];
        $image_size = $_FILES['photo']['size'];
        $image_tmp_name = $_FILES['photo']['tmp_name'];
        
        if (!empty($image)) {
            // Check for image size and duplicate names
            if ($image_size > 2000000) {
                $message[] = 'Image size is too large!';
            } else {
                $fileExtension = pathinfo($image, PATHINFO_EXTENSION);
                $uniqueFileName = uniqid('', true) . '.' . $fileExtension;
                $uploadDir = '../../advocate/'; // Ensure this directory exists and is writable
                $filePath = $uploadDir . $uniqueFileName;

                if (move_uploaded_file($image_tmp_name, $filePath)) {
                    $imagePathInDb = 'advocate/' . $uniqueFileName;
                    $update_image = $conn->prepare("UPDATE `advocate` SET Photo = ? WHERE id = ?");
                    $update_image->execute([$imagePathInDb, $advocate_id]);

                    if ($old_image != $imagePathInDb && $old_image != '') {
                        unlink('../../' . $old_image);
                    }

                    $message[] = 'Image updated!';
                } else {
                    $message[] = 'Failed to upload image!';
                }
            }
        }
    }

    // Handling delete advocate request
    if (isset($_POST['delete_advocate'])) {
        $advocate_id = filter_var($_POST['advocate_id'], FILTER_SANITIZE_STRING);
        $delete_image = $conn->prepare("SELECT * FROM `advocate` WHERE id = ?");
        $delete_image->execute([$advocate_id]);
        $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
        
        if ($fetch_delete_image['Photo'] != '') {
            unlink('../../' . $fetch_delete_image['Photo']);
        }
        
        $delete_advocate = $conn->prepare("DELETE FROM `advocate` WHERE id = ?");
        $delete_advocate->execute([$advocate_id]);
        
        $message[] = 'Advocate deleted successfully!';
    }

    // Handling delete image request
    if (isset($_POST['delete_image'])) {
        $advocate_id = filter_var($_POST['advocate_id'], FILTER_SANITIZE_STRING);
        $delete_image = $conn->prepare("SELECT * FROM `advocate` WHERE id = ?");
        $delete_image->execute([$advocate_id]);
        $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
        
        if ($fetch_delete_image['Photo'] != '') {
            unlink('../../' . $fetch_delete_image['Photo']);
        }

        $unset_image = $conn->prepare("UPDATE `advocate` SET Photo = '' WHERE id = ?");
        $unset_image->execute([$advocate_id]);
        $message[] = 'Image deleted successfully!';
    }
}

// Fetch the advocate details to edit
$advocate_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_STRING) : '';
$select_advocate = $conn->prepare("SELECT * FROM `advocate` WHERE id = ?");
$select_advocate->execute([$advocate_id]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Advocate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="advocate-editor">
    <h1 class="heading">Edit Advocate</h1>

    <?php
    if ($select_advocate->rowCount() > 0) {
        while ($fetch_advocate = $select_advocate->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?= $advocate_id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_image" value="<?= $fetch_advocate['Photo']; ?>">
                <input type="hidden" name="advocate_id" value="<?= $fetch_advocate['id']; ?>">
                <p>Approval Status <span>*</span></p>
                <select name="approved" class="box">
                    <option value="1" <?= $fetch_advocate['approved'] == 1 ? 'selected' : ''; ?>>Approved</option>
                    <option value="0" <?= $fetch_advocate['approved'] == 0 ? 'selected' : ''; ?>>Not Approved</option>
                </select>
                <p>Name <span>*</span></p>
                <input type="text" name="name" maxlength="255" required placeholder="Add advocate name" class="box" value="<?= $fetch_advocate['Name']; ?>">
                <p>Court <span>*</span></p>
                <input type="text" name="court" maxlength="255" required placeholder="Court name" class="box" value="<?= $fetch_advocate['Court']; ?>">
                <p>State <span>*</span></p>
                <select id="states" name="state" class="box" required>
                    <option value="">Select a state</option>
                    <?php foreach (STATE_NAME as $s) : ?>
                        <option value="<?php echo $s; ?>" <?= $fetch_advocate['State'] == $s ? 'selected' : ''; ?>><?php echo $s; ?></option>
                    <?php endforeach; ?>
                </select>
                <p>Office Address <span>*</span></p>
                <input type="text" name="officeAdd" maxlength="255" required placeholder="Office Address" class="box" value="<?= $fetch_advocate['officeAdd']; ?>">
                <p>Chamber Address</p>
                <input type="text" name="chamberAdd" maxlength="255" placeholder="Chamber Address" class="box" value="<?= $fetch_advocate['chamberAdd']; ?>">
                <p>Email <span>*</span></p>
                <input type="email" name="email" maxlength="255" required placeholder="Email" class="box" value="<?= $fetch_advocate['Email']; ?>">
                <p>Phone <span>*</span></p>
                <input type="text" name="phone" maxlength="15" required placeholder="Phone" class="box" value="<?= $fetch_advocate['Phone']; ?>">
                <p>Enrollment ID <span>*</span></p>
                <input type="text" name="enrollmentId" maxlength="50" required placeholder="Enrollment ID" class="box" value="<?= $fetch_advocate['EnrollmentId']; ?>">
                <p>Npgrc ID <span>*</span></p>
                <input type="text" name="courtId" maxlength="50" required placeholder="NPGRC ID" class="box" value="<?= $fetch_advocate['CourtId']; ?>">
                <p>Photo</p>
                <input type="file" name="photo" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
                <?php if ($fetch_advocate['Photo'] != '') { ?>
                    <img src="../../<?= $fetch_advocate['Photo']; ?>" class="box" alt="">
                    <input type="submit" value="Delete Image" class="inline-delete-btn" name="delete_image" onclick="return confirm('delete this photo?');">
                <?php } ?>
                <div class="flex-btn">
                    <input type="submit" value="Save Advocate" name="save" class="btn">
                    <input type="submit" value="Delete Advocate" class="delete-btn" name="delete_advocate" onclick="return confirm('delete this advocate?');">
                </div>
                <a href="users_accounts.php" class="option-btn">Go Back</a>
            </form>
            </div>
            
            <?php
        }
    } else {
        echo '<p class="empty">No advocates found!</p>';
        ?>
        <div class="flex-btn">
            <a href="users_accounts.php" class="option-btn">View Advocates</a>
            <!-- <a href="add_advocate.php" class="option-btn">Add Advocate</a> -->
        </div>
        <?php
    }
    ?>

</section>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
