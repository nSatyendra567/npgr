<?php
session_start(); // Start the session at the beginning
require '../config/constants.php';

function getCurrentPage()
{
    return basename($_SERVER['PHP_SELF']);
}
?>
<!Doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="./images/ASTRO.png">
    <title>NPGRC</title>
    <link rel="shortcut icon" href="<?php ROOT_URL ?>images/npgrc.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }
        .custom-swiper-button-next,
        .custom-swiper-button-prev {
            @apply w-8 h-8; /* Adjust the width and height as needed */
        }

        .custom-swiper-button-next::after,
        .custom-swiper-button-prev::after {
            @apply text-lg; /* Adjust the icon size as needed */
        }

        .active-link {
            background-color: #fd7e14; /* Adjust the background color as needed */
            color: #fff; /* Adjust the text color as needed */
            padding: 10px;
            border-radius: 5px;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        white: '#ffffff',
                        black: '#000000',
                        brown: '#252524',
                        gray: '#F6F6F7',
                        maroon: '#801913',
                        yellow: '#F7B00B',
                        blue: "#092531",
                    },
                    fontFamily: {
                        sans: ['Courier New', 'sans-serif'], // Set Courier New as default sans font
                    },

                },
                listStyleType: {
                    none: 'none',
                    disc: 'disc',
                    decimal: 'decimal',
                    number: 'numer',
                    roman: 'upper-roman',
                }
            }
        }
    </script>
    <style>
        .menuchange {
            position: fixed;
            display: flex;
            flex-direction: column;
            gap: 36px;
            width: 50%;
            height: 100vh;
            background-color: #ffffff;
            padding: 20px 10px;
            top: 0;
            right: 0;
            color: #252524;
            overflow-y: auto;
            z-index: 99;
            transform: translate(100%, 0);
            transition: all .2s ease-in-out;
        }
        .animate-heading {
            text-transform: capitalize;
            background-image: linear-gradient(-225deg, #231557 0%, #44107a 29%, #ff1361 67%, #fff800 100%);
            background-size: auto auto;
            background-clip: border-box;
            background-size: 200% auto;
            color: #fff;
            background-clip: text;
            text-fill-color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: anime 2s linear infinite;
            font-size: 190px;
        }
        @keyframes anime {
            100% {
                background-position: 200% center;
            }
        }

        .changemenu {
            transform: translate(0, 0);
        }

        @media (max-width:640px) {
            .menuchange {
                width: 75%;
            }
        }
    </style>
</head>

<body>
    <nav class="w-full min-h-12 bg-white items-center">
    <div class="px-5 sm:px-10 lg:px-16 flex flex-col md:flex-row md:justify-between items-center">
    <div class="flex flex-row items-center mb-4 md:mb-0">
        <figure class="w-16 h-16 md:w-28 md:h-28">
            <img src="<?php ROOT_URL ?>../images/npgrc.png" alt="NPGRC" />
        </figure>
        <div class="ml-3 text-center md:text-left">
            <a href="<?php echo ROOT_URL ?>index.php">
                <p class="text-base md:text-xl animate-color-change animate-heading font-semibold">
                    राष्ट्रीय लोक शिकायत एवं निवारण आयोग
                </p>
            </a>
            <a href="<?php echo ROOT_URL ?>index.php">
                <h1 class="text-sm md:text-lg animate-color-change animate-heading font-semibold">
                    National Public Grievances & Redressal Commission
                </h1>
            </a>
            <p class="text-xs md:text-sm">Legal Statutory Body Under the Proceedings of Various Laws in India.</p>
        </div>
    </div>
    <figure class="hidden lg:flex gap-10 items-center">
        <img class="w-16 md:w-32 md:h-32" src="<?php ROOT_URL ?>../images/digital-india.png" alt="NPGRC" />
        <img class="w-16 md:w-32 md:h-20" src="<?php ROOT_URL ?>../images/azadi.jpg" alt="NPGRC" />
        <img class="w-14 md:w-28 md:h-16" src="<?php ROOT_URL ?>../images/indian-flag.gif" alt="NPGRC" />
    </figure>
</div>


<div class="bg-blue h-fit py-3 px-5 sm:px-10 lg:px-16 flex justify-start md:justify-center">
        <ul class="nav_items flex-col md:flex-row gap-5 md:gap-7 lg:gap-10 items-center justify-center hidden md:flex text-white">
            <li><a class="<?php echo getCurrentPage() == 'index.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>index.php">Home</a></li>
            <li class="group relative <?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>">
                <p id="list_id2" class="flex gap-2 items-center cursor-pointer">About Us <i class="fa fa-sort-desc text-white" aria-hidden="true"></i>
                </p>
                <ul id="list2" class="hidden absolute top-9 pt-2 left-0 z-40 flex flex-col w-64 bg-blue text-white">
                    <a class="py-2 px-3 border-t border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>about.php">About Us</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>mission-vision.php">Mission & Vision</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>acts-rules.php">Acts and Rules
                    </a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>public-grievance.php">Public Grievances</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>organisation-structure.php">Organisation Structure</a>
                </ul>
            </li>
            <li class="group relative <?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>">
                <p id="list_id" class="flex gap-2 items-center cursor-pointer">Services <i class="fa fa-sort-desc text-white" aria-hidden="true"></i>
                </p>
                <ul id="list" class="hidden absolute top-9 pt-2 left-0 z-40 flex flex-col w-64 bg-blue text-white list">
                    <a class="py-2 px-3 border-t border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/legal-aid.php">Legal Aid</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/mediation.php">Mediation</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/investigation.php">Investigation
                    </a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/adalat.php">Adalat</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/child-act.php">Child Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/women-act.php">Women Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/human-right-act.php">Human Rights Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/environment-act.php">Environment Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/nmc-act.php">NMC Act </a>
                    <a class="py-2 px-3<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/indian-nursing-act.php">Indian Nursing Act
                    </a>
                </ul>
            </li>
            <li><a class="<?php echo getCurrentPage() == 'case-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>case-status.php">Case Status</a></li>
            <li><a class="<?php echo getCurrentPage() == 'governing-bodies.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>governing-bodies.php">Governing Bodies</a></li>
            <li><a class="<?php echo getCurrentPage() == 'advocate-panel.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>advocate-panel.php">Pan India Advocates</a></li>
            <li><a class="<?php echo getCurrentPage() == 'contact.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>contact.php">Contact Us</a></li>
            <li><a class="<?php echo getCurrentPage() == 'blogs.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>blogs.php">Blogs</a></li>
            <div class="flex gap-5 items-center text-white">
                <a class="bg-yellow hover:bg-blue hover:border border-yellow text-center rounded-md px-3 py-2 transition-all duration-150" href="<?php echo ROOT_URL ?>online-complaint.php">Online Complaint</a>
            </div>
        </ul>
        <i id="showme" class="fa-solid fa-bars fa-2x my-auto text-white md:hidden"></i>
    </div>
    <ul id="nav_menu" class="bg-blue nav_items flex-col md:flex-row gap-5 md:gap-7 lg:gap-10 items-center justify-center hidden text-white">
            <li><a class="<?php echo getCurrentPage() == 'index.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>index.php">Home</a></li>
            <li class="group relative <?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>">
                <p id="mlist_id2" class="flex gap-2 items-center">About Us <i class="fa fa-sort-desc text-white" aria-hidden="true"></i>
                </p>
                <ul id="mlist2" class="hidden absolute top-9 pt-2 left-[-40px] rounded-md z-40 flex flex-col w-64 bg-black text-white">
                    <a class="py-2 px-3 border-t border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>about.php">About Us</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>mission-vision.php">Mission & Vision</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>acts-rules.php">Acts and Rules
                    </a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>public-grievance.php">Public Grievances</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>organisation-structure.php">Organisation Structure</a>
                </ul>
            </li>
            <li class="group relative <?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>">
                <p id="mlist_id" class="flex gap-2 items-center">Services <i class="fa fa-sort-desc text-white" aria-hidden="true"></i>
                </p>
                <ul id="mlist" class="hidden absolute top-9 pt-2 right-[-66px] z-40 flex flex-col w-64 bg-black rounded-md text-white list">
                    <a class="py-2 px-3 border-t border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/legal-aid.php">Legal Aid</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/mediation.php">Mediation</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/investigation.php">Investigation
                    </a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/adalat.php">Adalat</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'about.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/child-act.php">Child Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/women-act.php">Women Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/human-right-act.php">Human Rights Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/environment-act.php">Environment Act</a>
                    <a class="py-2 px-3 border-b border-gray<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/nmc-act.php">NMC Act </a>
                    <a class="py-2 px-3<?php echo getCurrentPage() == 'complaint-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>service/indian-nursing-act.php">Indian Nursing Act
                    </a>
                </ul>
            </li>
            <li><a class="<?php echo getCurrentPage() == 'case-status.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>case-status.php">Case Status</a></li>
            <li><a class="<?php echo getCurrentPage() == 'governing-bodies.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>governing-bodies.php">Governing Bodies</a></li>
            <li><a class="<?php echo getCurrentPage() == 'advocate-panel.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>advocate-panel.php">Pan India Advocates</a></li>
            <li><a class="<?php echo getCurrentPage() == 'contact.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>contact.php">Contact Us</a></li>
            <li><a class="<?php echo getCurrentPage() == 'blogs.php' ? 'border-b-2 ' : ''; ?>" href="<?php echo ROOT_URL ?>blogs.php">Blogs</a></li>
            <div class="flex gap-5 items-center text-white pb-5">
                <a class="bg-yellow hover:bg-blue hover:border border-yellow text-center rounded-md px-3 py-2 transition-all duration-150" href="<?php echo ROOT_URL ?>online-complaint.php">Online Complaint</a>
            </div>
        </ul>
        <!-- Socials -->
        <div class="fixed bg-transparent h-fit top-[50%] translate-y-[-70%] z-30 right-0">
            <div class="flex flex-col gap-3 itemc-center justify-center">
                <a class="bg-yellow rounded p-2 flex justify-center items-center text-white" href="">
                    <i class="fab fa-facebook-f fa-x"></i>
                </a>
                <a class="bg-yellow rounded p-2 flex justify-center items-center text-white" href="">
                    <i class="fab fa-twitter fa-x"></i>
                </a>
                <a class="bg-yellow rounded p-2 flex justify-center items-center text-white" href=""><i class="fab fa-instagram fa-x"></i>
                </a>
                <a class="bg-yellow rounded p-2 flex justify-center items-center text-white" href="">
                    <i class="fab fa-youtube fa-1x"></i>
                </a>
            </div>
        </div>
    </nav>
    <script src="../js/index.js"></script>
</body>

</html>