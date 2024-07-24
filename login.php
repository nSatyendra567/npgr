<?php
include 'partials/header.php'
?>
<section class="w-full h-screen flex justify-center items-center">
    <?php
    // Display session message if set
    if (isset($_SESSION["message"])) {
        echo "<div id='messageBox' class='fixed inset-0 flex items-center justify-center'>
        <div class='relative p-5 bg-white rounded-md shadow-md w-11/12 md:w-1/2 lg:w-1/3'>
            <i id='cancelMessage' class='fa-solid fa-xmark absolute cursor-pointer right-2 top-2 text-2xl text-brown'></i>
            <p class='mt-5 text-lg text-light-blue text-center'> {$_SESSION['message']}</p>
        </div>
    </div>";
        // Clear the message
        unset($_SESSION["message"]);
    }
    ?>
    <form method="POST" action="./actions/login-action.php" class="w-80 h-fit flex flex-col gap-5 justify-center items-center p-5 rounded-md shadow-md text-brown">
        <h2 class="text-center text-2xl">Login to Dashboard</h2>
        <div class="flex flex-col gap-1 w-full">
            <label class="text-lg" for="email">Email:</label>
            <input id="email" class="py-2 px-2 outline-none w-full text-lg rounded" type="email" name="email" placeholder="Enter email" />
        </div>
        <div class="flex flex-col gap-1 w-full">
            <label class="text-lg" for="password">Password:</label>
            <input id="password" class="py-2 px-2 outline-none w-full text-lg rounded" type="password" name="password" placeholder="Enter Password" />
        </div>
        <input type="submit" name="submit" class="py-2 cursor-pointer px-2 outline-none w-full text-lg rounded bg-light-blue text-white" />
    </form>
</section>
<?php
include 'partials/footer.php'
?>