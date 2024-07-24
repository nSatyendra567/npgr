<?php

function getCurrent()
{
    return basename($_SERVER['PHP_SELF']);
}

?>
<aside class="w-80 shadow rounded-lg h-fit flex flex-col">
    <a class="py-3 px-4 border-t border-b <?php echo getCurrent() == 'legal-aid.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/legal-aid.php">Legal Aid</a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'mediation.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/mediation.php">Mediation</a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'investigation.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/investigation.php">Investigation
    </a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'adalat.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/adalat.php">Adalat</a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'child-act.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/child-act.php">Child Act</a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'women-act.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/women-act.php">Women Act</a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'human-right-act.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/human-right-act.php">Human Rights Act</a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'environment-act.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/environment-act.php">Environment Act</a>
    <a class="py-3 px-4 border-b <?php echo getCurrent() == 'nmc-act.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/nmc-act.php">NMC Act </a>
    <a class="py-3 px-4 <?php echo getCurrent() == 'indian-nursing-act.php' ? 'bg-blue text-white' : ''; ?>" href="<?php echo ROOT_URL ?>service/indian-nursing-act.php">Indian Nursing Act
    </a>
</aside>