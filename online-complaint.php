<?php include 'partials/header.php' ?>

<main class="max-w-7xl mx-auto w-full grid grid-cols-1 flex-col md:flex-row sm:grid-cols-2 md:grid-cols-3 gap-10 py-10 md:py-16 place-items-center px-10 md:px-16">
    <div class="flex flex-col items-center gap-4">
        <img src="images/delhi.jpg" alt="Delhi Complaints Logo" class="w-40 h-32">
        <a target="_blank" class="py-3 h-fit rounded bg-yellow hover:bg-blue text-white text-lg text-center transition-all duration-200 w-full" href="https://pgms.delhi.gov.in/Main.aspx">Delhi Complaints</a>
        <p class="text-center">Any complaints/ Grievance which comes under delhi limits click here.</p>
    </div>
    <div class="flex flex-col items-center gap-4">
        <img src="images/central.jpeg" alt="Central Complaints Logo" class="w-40 h-32">
        <a target="_blank" class="py-3 h-fit rounded bg-yellow hover:bg-blue text-white text-lg text-center transition-all duration-200 w-full" href="https://dpg.gov.in/Lc_ViewStatus.aspx">Central Complaints</a>
        <p class="text-center">Any complaints/ Grievance which comes under central limits click here.</p>
    </div>
    <div class="flex flex-col items-center gap-4">
        <img src="images/npgrc.png" alt="NPGRC Logo" class="w-40 h-32">
        <a class="py-3 h-fit rounded bg-yellow hover:bg-blue text-white text-lg text-center transition-all duration-200 w-full" href="<?php echo ROOT_URL ?>complaintnpgrc.php">Complaint with NPGRC</a>
        <p class="text-center">Raise your complaints/ Grievance with NPGRC,Let’s fight together for your rights.</p>
    </div>
</main>

<?php include 'partials/logos.php' ?>
<?php include 'partials/footer.php' ?>
