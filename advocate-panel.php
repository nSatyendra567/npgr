<?php include 'partials/header.php';
include 'config/data.php';
?>
<main class="w-full min-h-screen flex flex-col items-center justify-center py-10 md:py-16">
    <div class="max-w-7xl px-5 sm:px-10 w-full">
        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl text-center mb-10">Pan India Advocate</h2>
        <div class="flex justify-center gap-10 flex-wrap">
            <div class="w-[350px] h-fit p-5 sm:p-10 md:p-5 lg:p-10 rounded-md hover:scale-110 transition-all duration-200 bg-white flex flex-col items-center shadow-lg gap-1">
                <figure class="w-36 h-36 mb-3">
                    <img class="w-full h-full object-cover rounded-full" src="<?php ROOT_URL ?>images/random.avif">
                </figure>
                <h3 class="text-xl text-center">Name of the Body</h3>
                <h4 class="text-lg text-center font-bold text-maroon">Designation</h4>
                <p class="text-base text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, quae nesciunt nemo totam voluptatibus eum quisquam qui nam rem mollitia accusamus odit dolorem itaque quaerat officia quidem porro eligendi. Neque.</p>
            </div>
            <div class="w-[350px] h-fit p-5 sm:p-10 md:p-5 lg:p-10 rounded-md hover:scale-110 transition-all duration-200 bg-white flex flex-col items-center shadow-lg gap-1">
                <figure class="w-36 h-36 mb-3">
                    <img class="w-full h-full object-cover rounded-full" src="<?php ROOT_URL ?>images/random.avif">
                </figure>
                <h3 class="text-xl text-center">Name of the Body</h3>
                <h4 class="text-lg text-center font-bold text-maroon">Designation</h4>
                <p class="text-base text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, quae nesciunt nemo totam voluptatibus eum quisquam qui nam rem mollitia accusamus odit dolorem itaque quaerat officia quidem porro eligendi. Neque.</p>
            </div>
            <div class="w-[350px] h-fit p-5 sm:p-10 md:p-5 lg:p-10 rounded-md hover:scale-110 transition-all duration-200 bg-white flex flex-col items-center shadow-lg gap-1">
                <figure class="w-36 h-36 mb-3">
                    <img class="w-full h-full object-cover rounded-full" src="<?php ROOT_URL ?>images/random.avif">
                </figure>
                <h3 class="text-xl text-center">Name of the Body</h3>
                <h4 class="text-lg text-center font-bold text-maroon">Designation</h4>
                <p class="text-base text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, quae nesciunt nemo totam voluptatibus eum quisquam qui nam rem mollitia accusamus odit dolorem itaque quaerat officia quidem porro eligendi. Neque.</p>
            </div>
            <div class="w-[350px] h-fit p-5 sm:p-10 md:p-5 lg:p-10 rounded-md hover:scale-110 transition-all duration-200 bg-white flex flex-col items-center shadow-lg gap-1">
                <figure class="w-36 h-36 mb-3">
                    <img class="w-full h-full object-cover rounded-full" src="<?php ROOT_URL ?>images/random.avif">
                </figure>
                <h3 class="text-xl text-center">Name of the Body</h3>
                <h4 class="text-lg text-center font-bold text-maroon">Designation</h4>
                <p class="text-base text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, quae nesciunt nemo totam voluptatibus eum quisquam qui nam rem mollitia accusamus odit dolorem itaque quaerat officia quidem porro eligendi. Neque.</p>
            </div>
            <div class="w-[350px] h-fit p-5 sm:p-10 md:p-5 lg:p-10 rounded-md hover:scale-110 transition-all duration-200 bg-white flex flex-col items-center shadow-lg gap-1">
                <figure class="w-36 h-36 mb-3">
                    <img class="w-full h-full object-cover rounded-full" src="<?php ROOT_URL ?>images/random.avif">
                </figure>
                <h3 class="text-xl text-center">Name of the Body</h3>
                <h4 class="text-lg text-center font-bold text-maroon">Designation</h4>
                <p class="text-base text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, quae nesciunt nemo totam voluptatibus eum quisquam qui nam rem mollitia accusamus odit dolorem itaque quaerat officia quidem porro eligendi. Neque.</p>
            </div>
            <div class="w-[350px] h-fit p-5 sm:p-10 md:p-5 lg:p-10 rounded-md hover:scale-110 transition-all duration-200 bg-white flex flex-col items-center shadow-lg gap-1">
                <figure class="w-36 h-36 mb-3">
                    <img class="w-full h-full object-cover rounded-full" src="<?php ROOT_URL ?>images/random.avif">
                </figure>
                <h3 class="text-xl text-center">Name of the Body</h3>
                <h4 class="text-lg text-center font-bold text-maroon">Designation</h4>
                <p class="text-base text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, quae nesciunt nemo totam voluptatibus eum quisquam qui nam rem mollitia accusamus odit dolorem itaque quaerat officia quidem porro eligendi. Neque.</p>
            </div>
        </div>

    </div>
    <div class="max-w-7xl px-5 sm:px-10 w-full">
        <div class="flex justify-between items-center flex-wrap gap-5 pt-10 md:pt-16">
            <form class="w-full max-w-sm mb-5">
                <label for="states" class="block mb-2 text-sm font-medium text-gray-700">Select State</label>
                <select id="states" name="states" class="py-2 w-full px-2 outline-none w-full text-lg rounded">
                    <option value="">Select a state</option>
                    <?php foreach (STATE_NAME as $state) : ?>
                        <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <form class="w-full flex max-w-sm mb-5">
                <div class="flex flex-col">
                    <label for="advocateId" class="block mb-2 text-sm font-medium text-gray-700">Search by ID</label>
                    <div class="flex rounded">
                    <input type="text" id="advocateId" name="advocateId" class="flex-1 py-2 px-2 outline-none w-full text-lg rounded-tl rounded-bl" placeholder="Enter Advocate ID">
                    <input type="submit" value="Search" class="w-fit py-2 px-2 w-fit bg-yellow text-white text-lg rounded-tr rounded-br cursor-pointer">

                    </div>
                </div>
            </form>
        </div>
    </div>

</main>

<?php include 'partials/logos.php' ?>

<?php include 'partials/footer.php' ?>