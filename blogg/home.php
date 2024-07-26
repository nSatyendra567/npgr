<?php

include 'components/connect.php';

// session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'components/like_post.php';

?>



<?php include 'components/header.php'; ?>
<body class="bg-gray-100">


   <section class="container mx-auto px-4 py-8">

      <h1 class="text-3xl font-bold mb-8 text-center">Espacios Blogs</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

         <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? LIMIT 6 ");
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

               <div class="bg-white shadow-md rounded-lg overflow-hidden">
                  <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                  <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">

                  <?php if ($fetch_posts['image'] != '') { ?>
                     <img src="uploaded_img/<?= $fetch_posts['image']; ?>" alt="Post Image" class="w-full h-48 object-cover">
                  <?php } ?>

                  <div class="p-6">
                     <h2 class="text-xl font-semibold mb-2"><?= $fetch_posts['title']; ?></h2>
                     <p class="text-gray-700 mb-4"><?= substr($fetch_posts['content'], 0, 250); ?></p> <!-- Displaying a limited portion of content -->
                     <a href="view_post.php?post_id=<?= $post_id; ?>" class="text-indigo-500 hover:underline">Read More</a>
                  </div>
               </div>

         <?php
            }
         } else {
            echo '<p class="text-center text-gray-500">No posts added yet!</p>';
         }
         ?>
      </div>

      <div class="mt-8 text-center">
         <a href="posts.php" class="inline-block bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600">View All Posts</a>
      </div>

   </section>

   <?php include 'components/footer.php'; ?>

   <script src="js/script.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
