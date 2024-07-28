<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit;
}

$message = [];

// Check if the form is submitted to save or delete a post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handling save post request
    if (isset($_POST['save'])) {
        $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_STRING);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
        $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

        // Update the post in the database
        $update_post = $conn->prepare("UPDATE `posts` SET title = ?, content = ?, category = ?, status = ? WHERE id = ?");
        $update_post->execute([$title, $content, $category, $status, $post_id]);

        $message[] = 'Post updated!';

        // Handle image upload
        $old_image = $_POST['old_image'];
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_img/' . $image;

        if (!empty($image)) {
            // Check for image size and duplicate names
            if ($image_size > 2000000) {
                $message[] = 'Image size is too large!';
            } else {
                $update_image = $conn->prepare("UPDATE `posts` SET image = ? WHERE id = ?");
                move_uploaded_file($image_tmp_name, $image_folder);
                $update_image->execute([$image, $post_id]);
                if ($old_image != $image && $old_image != '') {
                    unlink('../uploaded_img/' . $old_image);
                }
                $message[] = 'Image updated!';
            }
        }
    }

    // Handling delete post request
    if (isset($_POST['delete_post'])) {
        $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_STRING);
        $delete_image = $conn->prepare("SELECT * FROM `posts` WHERE id = ?");
        $delete_image->execute([$post_id]);
        $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
        
        if ($fetch_delete_image['image'] != '') {
            unlink('../uploaded_img/' . $fetch_delete_image['image']);
        }
        
        $delete_post = $conn->prepare("DELETE FROM `posts` WHERE id = ?");
        $delete_post->execute([$post_id]);
        $delete_comments = $conn->prepare("DELETE FROM `comments` WHERE post_id = ?");
        $delete_comments->execute([$post_id]);
        
        $message[] = 'Post deleted successfully!';
    }

    // Handling delete image request
    if (isset($_POST['delete_image'])) {
      $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_STRING);
      $delete_image = $conn->prepare("SELECT * FROM `posts` WHERE id = ?");
      $delete_image->execute([$post_id]);
      $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
      
      if ($fetch_delete_image['image'] != '') {
          unlink('../uploaded_img/' . $fetch_delete_image['image']);
      }
  
      $unset_image = $conn->prepare("UPDATE `posts` SET image = '' WHERE id = ?");
      $unset_image->execute([$post_id]);
      $message[] = 'Image deleted successfully!';
  }
  
}

// Fetch the post details to edit
$post_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_SANITIZE_STRING) : '';
$select_posts = $conn->prepare("SELECT * FROM `posts` WHERE id = ?");
$select_posts->execute([$post_id]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
    <script src="https://cdn.tiny.cloud/1/7u8bev4kgkqli9sesaftbgd5b6eb3dqy9wwequ2600bdxrgw/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="post-editor">
    <h1 class="heading">Edit Post</h1>

    <?php
    if ($select_posts->rowCount() > 0) {
        while ($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="old_image" value="<?= $fetch_posts['image']; ?>">
                <input type="hidden" name="post_id" value="<?= $fetch_posts['id']; ?>">
                <p>Post Status <span>*</span></p>
                <select name="status" class="box" required>
                    <option value="<?= $fetch_posts['status']; ?>" selected><?= $fetch_posts['status']; ?></option>
                    <option value="active">Active</option>
                    <option value="deactive">Deactive</option>
                </select>
                <p>Post Title <span>*</span></p>
                <input type="text" name="title" maxlength="100" required placeholder="Add post title" class="box" value="<?= $fetch_posts['title']; ?>">
                <p>Post Content <span>*</span></p>
                <textarea name="content" class="box" required maxlength="10000" placeholder="Write your content..." cols="30" rows="10"><?= $fetch_posts['content']; ?></textarea>
                <p>Post Category <span>*</span></p>
                <select name="category" class="box" required>
                    <option value="<?= $fetch_posts['category']; ?>" selected><?= $fetch_posts['category']; ?></option>
                    <option value="nature">Nature</option>
                    <option value="education">Education</option>
                    <option value="pets and animals">Pets and Animals</option>
                    <option value="technology">Technology</option>
                    <option value="fashion">Fashion</option>
                    <option value="entertainment">Entertainment</option>
                    <option value="movies and animations">Movies</option>
                    <option value="gaming">Gaming</option>
                    <option value="music">Music</option>
                    <option value="sports">Sports</option>
                    <option value="news">News</option>
                    <option value="travel">Travel</option>
                    <option value="comedy">Comedy</option>
                    <option value="design and development">Design and Development</option>
                    <option value="food and drinks">Food and Drinks</option>
                    <option value="lifestyle">Lifestyle</option>
                    <option value="personal">Personal</option>
                    <option value="health and fitness">Health and Fitness</option>
                    <option value="business">Business</option>
                    <option value="shopping">Shopping</option>
                    <option value="animations">Animations</option>
                </select>
                <p>Post Image</p>
                <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
                <?php if ($fetch_posts['image'] != '') { ?>
                    <img src="../uploaded_img/<?= $fetch_posts['image']; ?>" class="image" alt="">
                    <input type="submit" value="Delete Image" class="inline-delete-btn" name="delete_image">
                <?php } ?>
                <div class="flex-btn">
                    <input type="submit" value="Save Post" name="save" class="btn">
                    <a href="view_posts.php" class="option-btn">Go Back</a>
                    <input type="submit" value="Delete Post" class="delete-btn" name="delete_post">
                </div>
            </form>
            <?php
        }
    } else {
        echo '<p class="empty">No posts found!</p>';
        ?>
        <div class="flex-btn">
            <a href="view_posts.php" class="option-btn">View Posts</a>
            <a href="add_posts.php" class="option-btn">Add Posts</a>
        </div>
        <?php
    }
    ?>

</section>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>
<!-- Include TinyMCE script -->

</body>
</html>
