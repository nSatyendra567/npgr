<?php include 'partials/header.php' ?>

<main class="w-full min-h-screen flex justify-center">
    <div class="max-w-7xl flex flex-col md:flex-row w-full justify-between gap-10 py-10 md:py-16 px-10">
        <div class="w-full md:w-1/2 flex flex-col gap-10">
            <h2 class="text-2xl sm:text-3xl md:text-4xl text-center">Register Your Complaint</h2>
            <form class="flex flex-col gap-5" action="" method="POST">
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold" for="name">Name:</label>
                    <input name="name" class="focus:outline-none focus:border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter your Full Name" autocomplete="off" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold" for="email">Email:</label>
                    <input name="email" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter your Email Id" autocomplete="off" />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold" for="phone">Phone:</label>
                    <input name="phone" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter phone like 9827645321" autocomplete="off">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold" for="subject">Subject:</label>
                    <input name="subject" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter complaint subject" autocomplete="off">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold" for="subject">Complain File:</label>
                    <input name="subject" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="file" >
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold" for="description">Description:</label>
                    <textarea name="descriptionj" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter complaint subject " rows="4"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <input class="outline-none focus:outline-none py-2 px-2 w-full rounded-md text-lg bg-yellow cursor-pointer text-white hover:text-xl transition-all duration-150" type="submit" value="Submit" />
                </div>
            </form>
        </div>
        <div class="w-full md:w-1/2">
            <figure class="relative w-full h-full">
                <img class="w-full h-full object-contain" src="./images/npgrc-structure.png" alt="NPGRC" />
            </figure>
        </div>
    </div>
</main>

<?php include 'partials/logos.php' ?>

<?php include 'partials/footer.php' ?>