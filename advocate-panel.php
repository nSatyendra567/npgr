<?php include 'partials/header.php';
include 'config/data.php';
include 'blogg/components/connect.php';
?>
<main class="w-full min-h-screen flex flex-col items-center justify-center py-10 md:py-16">
    <div class="max-w-7xl px-5 sm:px-10 w-full">
        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl text-center mb-10">Pan India Advocate</h2>
        <div class="flex justify-center gap-10 flex-wrap">
            <p>National Public Grievance and Redressal commission (NPGRC) is one of the biggest organization in India in which advocates and Judges work for the benefit of general public by addressing their issues and grievances brought to the notice of the commission. NPGRC's advocate panel is available throughout India in every State and District levels. More than 4000 advocates are associated and working with this organization in various parts of the country. The objective of the organization is to resolve the complaints and grievances making sure that the resolution to any issue is done by strictly ensuring justice to the complainant after thorough validation of the issue.</p>
        </div>
    </div>
    
    <div class="max-w-7xl px-5 sm:px-10 w-full">
        <div class="flex justify-between items-center flex-wrap gap-5 pt-10 md:pt-16">
            <form method="GET" class="w-full max-w-sm mb-5">
                <label for="states" class="block mb-2 text-sm font-medium text-gray-700">Select State</label>
                <select id="states" name="states" class="py-2 w-full px-2 outline-none w-full text-lg rounded" onchange="this.form.submit()">
                    <option value="">Select a state</option>
                    <?php foreach (STATE_NAME as $state) : ?>
                        <option value="<?php echo $state; ?>" <?php echo (isset($_GET['states']) && $_GET['states'] === $state) ? 'selected' : ''; ?>><?php echo $state; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <form method="GET" class="w-full flex max-w-sm mb-5">
                <div class="flex flex-col">
                    <label for="advocateId" class="block mb-2 text-sm font-medium text-gray-700">Search by ID</label>
                    <div class="flex rounded">
                        <input type="text" id="advocateId" name="advocateId" class="flex-1 py-2 px-2 outline-none w-full text-lg rounded-tl rounded-bl" placeholder="Enter Advocate ID" value="<?php echo isset($_GET['advocateId']) ? htmlspecialchars($_GET['advocateId']) : ''; ?>">
                        <input type="submit" value="Search" class="w-fit py-2 px-2 w-fit bg-yellow text-white text-lg rounded-tr rounded-br cursor-pointer">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="flex justify-center gap-10 flex-wrap mt-10">
        <?php
        // Initialize query for approved advocates
        $query = "SELECT * FROM `advocate` WHERE approved = 1";
        $params = [];

        // Check if a state is selected
        if (isset($_GET['states']) && !empty($_GET['states'])) {
            $state = $_GET['states'];
            $query .= " AND State = ?";
            $params[] = $state;
        }

        // Check if an advocate ID is searched
        if (isset($_GET['advocateId']) && !empty($_GET['advocateId'])) {
            $advocateId = $_GET['advocateId'];
            $query .= " AND EnrollmentId = ?";
            $params[] = $advocateId;
        } elseif (!isset($_GET['states'])) {
            // If no state selected, limit the results to 6
            $query .= " LIMIT 6";
        }

        $select_advocates = $conn->prepare($query);
        $select_advocates->execute($params);

        if ($select_advocates->rowCount() > 0) {
            while ($advocate = $select_advocates->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="w-[350px] h-fit p-5 sm:p-10 md:p-5 lg:p-10 rounded-md hover:scale-110 transition-all duration-200 bg-white flex flex-col items-center shadow-lg gap-1">
                    <figure class="w-36 h-36 mb-3">
                        <img class="w-full h-full object-cover rounded-full" src="<?php echo ROOT_URL ?><?php echo htmlspecialchars($advocate['Photo']); ?>">
                    </figure>
                    <h3 class="text-xl text-center"><?= htmlspecialchars($advocate['Name']); ?></h3>
                    <h4 class="text-lg text-center font-bold text-maroon">Chamber: <?= htmlspecialchars($advocate['chamberAdd']); ?></h4>
                    <h4 class="text-lg text-center font-bold text-maroon">Office: <?= htmlspecialchars($advocate['officeAdd']); ?></h4>
                    <h4 class="text-lg text-center font-bold text-maroon">Court: <?= htmlspecialchars($advocate['Court']); ?></h4>
                    <p class="text-base text-center">Mobile: <?= htmlspecialchars($advocate['Phone']); ?></p>
                    <p class="text-base text-center">Email: <?= htmlspecialchars($advocate['Email']); ?></p>
                </div>
        <?php
            }
        } else {
            echo '<p class="empty">No advocates found</p>';
        }
        ?>
    </div>
</main>

<?php include 'partials/logos.php' ?>
<?php include 'partials/footer.php' ?>
