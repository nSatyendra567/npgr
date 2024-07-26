<?php

include 'blogg/components/connect.php';

// session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'blogg/components/like_post.php';


$get_id = $_GET['post_id'];

if (isset($_POST['add_comment'])) {

   $admin_id = $_POST['admin_id'];
   $admin_id = filter_var($admin_id, FILTER_SANITIZE_STRING);
   $user_name = $_POST['user_name'];
   $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
   $comment = $_POST['comment'];
   $comment = filter_var($comment, FILTER_SANITIZE_STRING);

   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ? AND admin_id = ? AND user_id = ? AND user_name = ? AND comment = ?");
   $verify_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);

   if ($verify_comment->rowCount() > 0) {
      $message[] = 'comment already added!';
   } else {
      $insert_comment = $conn->prepare("INSERT INTO `comments`(post_id, admin_id, user_id, user_name, comment) VALUES(?,?,?,?,?)");
      $insert_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);
      $message[] = 'new comment added!';
   }
}

if (isset($_POST['edit_comment'])) {
   $edit_comment_id = $_POST['edit_comment_id'];
   $edit_comment_id = filter_var($edit_comment_id, FILTER_SANITIZE_STRING);
   $comment_edit_box = $_POST['comment_edit_box'];
   $comment_edit_box = filter_var($comment_edit_box, FILTER_SANITIZE_STRING);

   $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE comment = ? AND id = ?");
   $verify_comment->execute([$comment_edit_box, $edit_comment_id]);

   if ($verify_comment->rowCount() > 0) {
      $message[] = 'comment already added!';
   } else {
      $update_comment = $conn->prepare("UPDATE `comments` SET comment = ? WHERE id = ?");
      $update_comment->execute([$comment_edit_box, $edit_comment_id]);
      $message[] = 'your comment edited successfully!';
   }
}

if (isset($_POST['delete_comment'])) {
   $delete_comment_id = $_POST['comment_id'];
   $delete_comment_id = filter_var($delete_comment_id, FILTER_SANITIZE_STRING);
   $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
   $delete_comment->execute([$delete_comment_id]);
   $message[] = 'comment deleted successfully!';
}

?>

<?php include 'partials/header.php'; ?>

<body class="bg-gray-100">

   <!-- header section starts  -->
   <!-- header section ends -->

   <?php
   if (isset($_POST['open_edit_box'])) {
      $comment_id = $_POST['comment_id'];
      $comment_id = filter_var($comment_id, FILTER_SANITIZE_STRING);
   ?>
      <section class="comment-edit-form bg-white p-6 rounded-md shadow-md max-w-xl mx-auto my-6">
         <p class="text-lg font-semibold mb-4">Edit your comment</p>
         <?php
         $select_edit_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ?");
         $select_edit_comment->execute([$comment_id]);
         $fetch_edit_comment = $select_edit_comment->fetch(PDO::FETCH_ASSOC);
         ?>
         <form action="" method="POST" class="space-y-4">
            <input type="hidden" name="edit_comment_id" value="<?= $comment_id; ?>">
            <textarea name="comment_edit_box" required cols="30" rows="10" placeholder="Please enter your comment" class="w-full p-2 border border-gray-300 rounded-md"><?= $fetch_edit_comment['comment']; ?></textarea>
            <button type="submit" class="inline-block bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600" name="edit_comment">Edit Comment</button>
            <div class="inline-block text-gray-500 cursor-pointer hover:underline" onclick="window.location.href = 'view_post.php?post_id=<?= $get_id; ?>';">Cancel Edit</div>
         </form>
      </section>
   <?php
   }
   ?>


   <section class="posts-container py-10">

      <div class="max-w-4xl mx-auto">

         <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? AND id = ?");
         $select_posts->execute(['active', $get_id]);
         if ($select_posts->rowCount() > 0) {
            while ($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)) {

               $post_id = $fetch_posts['id'];

               $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
               $count_post_comments->execute([$post_id]);
               $total_post_comments = $count_post_comments->rowCount();

               $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
               $count_post_likes->execute([$post_id]);
               $total_post_likes = $count_post_likes->rowCount();

               $confirm_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ? AND post_id = ?");
               $confirm_likes->execute([$user_id, $post_id]);
         ?>
               <form class="bg-white p-6 rounded-md shadow-md mb-6" method="post">
                  <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                  <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">
                  <div class="post-admin mb-4">
                     <h3 class="text-2xl font-semibold text-green-700 text-yellow">Blog</h3>
                  </div>

                  <?php
                  if ($fetch_posts['image'] != '') {
                  ?>
                     <img src="blogg/uploaded_img/<?= $fetch_posts['image']; ?>" class="w-full h-auto mb-4" alt="">
                  <?php
                  }
                  ?>
                  <div class="post-title text-xl font-semibold mb-2"><?= $fetch_posts['title']; ?></div>
                  <div class="post-content mb-4">
                     <pre class="whitespace-pre-wrap font-encode-sans"><?= $fetch_posts['content']; ?></pre>
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="text-center text-gray-500">No posts found!</p>';
         }
         ?>
      </div>

   </section>

   <?php include 'partials/footer.php'; ?>

  
</body>

</html>
