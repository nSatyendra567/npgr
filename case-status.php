1<?php include 'partials/header.php' ?>

<main class="w-full h-screen flex justify-center">
    <div class="max-w-7xl px-10 w-full flex flex-col items-center">
        <h2 class="text-2xl sm:text-3xl md:text-4xl pb-10">Check your Case Status</h2>
        <div class="flex border border-black max-w-xl w-full rounded-md">
            <input class="flex-1 py-2 px-2 rounded-tl-md rounded-bl-md " type="text" placeholder="Enter refrenceId">
            <input class="px-8 py-2 bg-yellow text-white rounded-tr-md rounded-br-md cursor-pointer text-lg  hover:scale-105 transition-all duration-150" type="submit" value="Search" />
        </div>
 
        <div class="flex w-full flex-col gap-5 py-10 items-start max-w-xl ">
            <h3 class="text-xl sm:text-2xl md:text-3xl">Your Details</h3>
            <ul class="flex flex-col gap-2">
                <li class="text-lg"><span class="text-xl text-yellow font-semibold">Status:</span> Pending</li>
                <li class="text-lg"><span class="text-xl text-yellow font-semibold">Name:</span> Your Name</li>
                <li class="text-lg"><span class="text-xl text-yellow font-semibold">Email:</span> youremail@gmail.com</li>
                <li class="text-lg"><span class="text-xl text-yellow font-semibold">Phone:</span> 8765456732</li>
            </ul>
            <div class="flex-col flex gap-5">
                <p class="text-black text-lg">Would you like to remind to finish your case urgently</p>
                <div class="flex gap-5">
                    <button class="bg-yellow text-white text-lg w-36 rounded-md  py-2 px-5 text-center hover:scale-105 transition-all duration-150" type="button">Yes</button>
                    <button class="bg-yellow text-white text-lg w-36 rounded-md py-2 px-5 text-center hover:scale-105 transition-all duration-150" type="button">No</button>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include 'partials/logos.php' ?>

<?php include 'partials/footer.php' ?>