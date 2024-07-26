<?php 
include 'blogg/components/connect.php';
include 'partials/header.php'; 
?>

<main class="w-full h-screen flex justify-center">
    <div class="max-w-7xl px-10 w-full flex flex-col items-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl pb-10">Check your Case Status</h2>
        <form class="flex border border-black max-w-xl w-full rounded-md" action="" method="POST" enctype="multipart/form-data">
            <input class="flex-1 py-2 px-2 rounded-tl-md rounded-bl-md" name="referenceId" type="text" placeholder="Enter Reference ID" required>
            <input class="px-8 py-2 bg-yellow text-white rounded-tr-md rounded-br-md cursor-pointer text-lg hover:scale-105 transition-all duration-150" type="submit" value="Search" />
        </form>
 
        <div class="flex w-full flex-col gap-5 py-10 items-start max-w-xl">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['referenceId'])) {
                $referenceId = filter_var($_POST['referenceId'], FILTER_SANITIZE_STRING);

                // Query the database for the case using the reference ID
                $sql = "SELECT * FROM `case` WHERE ReferenceNo = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$referenceId]);

                // Check if a case was found
                if ($stmt->rowCount() > 0) {
                    $case = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <h3 class="text-xl sm:text-2xl md:text-3xl">Your Details</h3>
                    <ul class="flex flex-col gap-2">
                        <li class="text-lg"><span class="text-xl text-yellow font-semibold">Status:</span> <?= htmlspecialchars($case['Status']) ?></li>
                        <li class="text-lg"><span class="text-xl text-yellow font-semibold">Name:</span> <?= htmlspecialchars($case['Name']) ?></li>
                        <li class="text-lg"><span class="text-xl text-yellow font-semibold">Email:</span> <?= htmlspecialchars($case['Email']) ?></li>
                        <li class="text-lg"><span class="text-xl text-yellow font-semibold">Phone:</span> <?= htmlspecialchars($case['Phone']) ?></li>
                    </ul>
                    <!-- <div class="flex-col flex gap-5">
                        <p class="text-black text-lg">Would you like to remind to finish your case urgently?</p>
                        <div class="flex gap-5">
                            <button class="bg-yellow text-white text-lg w-36 rounded-md py-2 px-5 text-center hover:scale-105 transition-all duration-150" type="button">Yes</button>
                            <button class="bg-yellow text-white text-lg w-36 rounded-md py-2 px-5 text-center hover:scale-105 transition-all duration-150" type="button">No</button>
                        </div>
                    </div> -->
                    <?php
                } else {
                    echo "<p class='text-red-600'>No case found with this Reference ID.</p>";
                }
            }
            ?>
        </div>
    </div>
</main>

<?php include 'partials/logos.php'; ?>
<?php include 'partials/footer.php'; ?>
