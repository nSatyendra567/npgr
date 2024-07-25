<?php

function getCurrent()
{
    return basename($_SERVER['PHP_SELF']);
}

?>
<aside class="w-full md:w-80 shadow rounded-lg h-fit flex flex-col">
            <a class="py-2 px-3 border-t border-b <?php echo getCurrent() === 'about.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>about.php">About Us</a>
            <a class="py-3 px-4 border-b <?php echo getCurrent() === 'mission-vision.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>mission-vision.php">Mission & Vision</a>
            <a class="py-3 px-4 border-b <?php echo getCurrent() == 'acts-rules.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>acts-rules.php">Acts and Rules</a>
            <a class="py-3 px-4 border-b <?php echo getCurrent() == 'public-grievance.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>public-grievance.php">Public Grievances</a>
            <a class="py-3 px-4 <?php echo getCurrent() == 'organisation-structure.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>organisation-structure.php">Organisation Structure</a>
        </aside>