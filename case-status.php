<?php 
include 'blogg/components/connect.php';
include 'partials/header.php'; 

function maskEmail($email) {
    $email_parts = explode('@', $email);
    $username = $email_parts[0];
    $domain = $email_parts[1];

    $masked_username = substr($username, 0, 1) . str_repeat('*', strlen($username) - 1);
    $masked_domain = $domain; // Optionally, you can mask part of the domain too

    return $masked_username . '@' . $masked_domain;
}

function maskPhone($phone) {
    $length = strlen($phone);
    $masked_phone = str_repeat('*', $length - 4) . substr($phone, -4);

    return $masked_phone;
}
?>

<main class="w-full  h-auto flex justify-center">
<div class="max-w-7xl px-5 sm:px-10 w-full flex flex-col items-center">
    <h2 class="text-2xl sm:text-3xl md:text-4xl pb-10 text-center">Check your Case Status</h2>
    <form class="flex flex-col sm:flex-row border border-black max-w-xl w-full rounded-md" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input class="w-full sm:flex-1 py-2 px-2 rounded-tl-md rounded-tr-md sm:rounded-tr-none sm:rounded-bl-md" name="referenceId" type="text" placeholder="Enter Diary No." required>
        <input class="w-full sm:w-auto px-8 py-2 bg-yellow text-white rounded-bl-md sm:rounded-bl-none rounded-br-md cursor-pointer text-lg hover:scale-105 transition-all duration-150" type="submit" value="Search" />
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
                        <li class="text-lg"><span class="text-xl text-yellow font-semibold">Email:</span> <?= maskEmail(htmlspecialchars($case['Email'])) ?></li>
                        <li class="text-lg"><span class="text-xl text-yellow font-semibold">Phone:</span> <?= maskPhone(htmlspecialchars($case['Phone'])) ?></li>
                        <?php if (!empty($case['updates'])): ?>
                            <li class="text-lg">
                                <span class="text-xl text-yellow font-semibold">Update:</span> <?= htmlspecialchars($case['updates']) ?>
                            </li>
                        <?php endif; ?>
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
                    echo "<p class='text-red-600'>No case found with this Diary Number.</p>";
                }
            }
            ?>
        </div>
    </div>
</main>

<?php include 'partials/logos.php'; ?>
<?php include 'partials/footer.php'; ?>
