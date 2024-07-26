<?php

include 'blogg/components/connect.php';

// session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'blogg/components/like_post.php';

?>

<?php include 'partials/header.php' ?>

<section class="posts-container py-8">

      <h1 class="heading text-4xl font-bold text-center mb-8">Blogs</h1>

      <div class="box-container grid gap-6 md:grid-cols-2 lg:grid-cols-3">

         <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ?");
         $select_posts->execute(['active']);
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

               <div class="post-card bg-white p-6 rounded-lg shadow-md">
                  <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                  <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">

                  <?php if ($fetch_posts['image'] != '') { ?>
                     <img src="blogg/uploaded_img/<?= $fetch_posts['image']; ?>" alt="Post Image" class="w-full h-48 object-cover rounded-lg mb-4">
                  <?php } ?>

                  <div class="postss">
                     <div class="post-title text-xl font-semibold mb-2"><?= $fetch_posts['title']; ?></div>
                     <div class="post-content text-gray-600 mb-4">
                        <?= substr($fetch_posts['content'], 0, 250); ?> <!-- Displaying a limited portion of content -->
                     </div>
                  </div>

                  <div class="read-more">
                     <a href="view_post.php?post_id=<?= $post_id; ?>" class="text-blue-500 hover:underline">Read More</a>
                  </div>
               </div>

         <?php
            }
         } else {
            echo '<p class="empty text-center text-gray-500">No posts added yet!</p>';
         }
         ?>
      </div>

   </section>

   <?php include 'partials/footer.php'; ?>