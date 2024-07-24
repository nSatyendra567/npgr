<?php include 'partials/header.php';
include 'config/data.php'
 ?>
<main class="w-full min-h-screen flex justify-center py-10">
    <form action="create-advocate-action.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md w-full max-w-xl">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" name="photo" id="photo" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="court" class="block text-sm font-medium text-gray-700">Court</label>
            <input type="text" name="court" id="court" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="states" class="block text-sm font-medium text-gray-700">State</label>

            <select id="states" name="states" class="mt-1 py-2 w-full px-2 outline-none w-full text-lg rounded">
                <option value="">Select a state</option>
                <?php foreach (STATE_NAME as $state) : ?>
                    <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label for="office-address" class="block text-sm font-medium text-gray-700">Office Address</label>
            <textarea name="office-address" id="office-address" required class="mt-1 p-2 w-full border border-gray-300 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label for="chamber-address" class="block text-sm font-medium text-gray-700">Chamber Address</label>
            <textarea name="chamber-address" id="chamber-address" required class="mt-1 p-2 w-full border border-gray-300 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number</label>
            <input type="text" name="mobile_number" id="mobile_number" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email ID</label>
            <input type="email" name="email" id="email" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="enrollment-id" class="block text-sm font-medium text-gray-700">Enrollment Id</label>
            <input type="text" name="enrollment-id" id="enrollment-id" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mb-4">
            <label for="court-id" class="block text-sm font-medium text-gray-700">Court Id</label>
            <input type="text" name="court-id" id="court-id" required class="mt-1 p-2 w-full border border-gray-300 rounded">
        </div>
        <div class="mt-6">
            <button type="submit" class="w-full bg-yellow text-white p-2 rounded">Submit</button>
        </div>
    </form>
</main>
<?php include 'partials/footer.php' ?>