<?php include 'partials/header.php' ?>

<main class="w-full min-h-screen flex justify-center bg-gray-100">
    <div class="max-w-7xl flex flex-col md:flex-row w-full justify-between gap-10 py-10 md:py-16 px-10">
        <div class="w-full md:w-1/2 flex flex-col gap-5 bg-white rounded-lg p-8">
            <h2 class="text-2xl sm:text-3xl md:text-4xl text-center font-semibold text-gray-800">Register Your Complaint</h2>
            <p class="text-sm text-gray-600 text-right">Fields marked with <span class="text-red-500">*</span> are mandatory</p>
            <form class="flex flex-col gap-5" action="" method="POST">
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="name">Name: <span class="text-red-500">*</span></label>
                    <input name="name" class="focus:outline-none focus:border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter your Full Name" autocomplete="off" required />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="email">Email: <span class="text-red-500">*</span></label>
                    <input name="email" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="email" placeholder="Enter your Email Id" autocomplete="off" required />
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="phone">Phone: <span class="text-red-500">*</span></label>
                    <input name="phone" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="tel" placeholder="Enter phone like 9827645321" autocomplete="off" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="subject">Subject: <span class="text-red-500">*</span></label>
                    <input name="subject" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="text" placeholder="Enter complaint subject" autocomplete="off" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="complain-file">Complain File: <span class="text-red-500">*</span></label>
                    <input name="complain-file" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" type="file" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-base font-semibold text-gray-700" for="description">Description:</label>
                    <textarea name="description" class="outline-none focus:outline-none border border-black py-2 px-2 w-full rounded-md text-lg" placeholder="Enter complaint description" rows="4"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <input class="outline-none focus:outline-none py-2 px-2 w-full rounded-md text-lg bg-yellow cursor-pointer text-white hover:text-xl transition-all duration-150" type="submit" value="Submit" />
                </div>
            </form>
        </div>
        <div class="w-full md:w-1/2 flex flex-col gap-10 bg-white rounded-lg p-8">
            <div class="mt-10 mb-10">
                <h1 class="text-center text-2xl font-semibold text-gray-800">Structure of NPGRC Commission</h1>
            </div>
            <figure class="relative w-full h-auto">
                <img class="w-full h-full object-contain" src="./images/npgrc-structure.png" alt="NPGRC" />
            </figure>
        </div>
    </div>
</main>

<?php include 'partials/logos.php' ?>
<?php include 'partials/footer.php' ?>
