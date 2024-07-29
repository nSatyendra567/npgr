<footer class="relative w-full min-h-[100px]  bg-blue py-10 px-5 sm:px-10 md:px-16 lg:px-24 xl:px-32">
    <!-- Fixed Buttons -->
    <!-- <a href="https://api.whatsapp.com/send?phone=9955005100" class="text-3xl w-1/2 h-12 sm:w-20 sm:h-20 flex justify-center items-center  bg-light-blue p-5 sm:rounded-[50%] text-white fixed left-0 bottom-0 sm:left-10 sm:bottom-10 z-20 border-r"><i class="fa-brands fa-whatsapp "></i></a>
    <a href="tel:+919955005100" class="text-2xl  w-1/2 h-12 sm:w-20 sm:h-20 flex justify-center items-center bg-light-blue p-5 sm:rounded-[50%] text-white fixed right-0 bottom-0 sm:right-10 sm:bottom-10 z-20 border-l"> <i class="fa-solid fa-phone"></i>
    </a> -->

   
    <div class="flex flex-col items-center justify-center flex-wrap gap-10">
        <figure class="w-32 h-32">
            <img class="w-full h-full object-cover" src="./images/npgrc.png" alt="NPGRC" />
        </figure>
        <p class="text-center text-white text-lg">राष्ट्रीय लोक शिकायत एवं निवारण आयोग</p>
        <div class="flex gap-3 itemc-center justify-center">
            <a class="bg-yellow rounded-full p-2 flex justify-center items-center text-white" href="">
                <i class="fab fa-facebook-f fa-x"></i>
            </a>
            <a class="bg-yellow rounded-full p-2 flex justify-center items-center text-white" href="">
                <i class="fab fa-twitter fa-x"></i>
            </a>
            <a class="bg-yellow rounded-full p-2 flex justify-center items-center text-white" href=""><i class="fab fa-instagram fa-x"></i>
            </a>
            <a class="bg-yellow rounded-full p-2 flex justify-center items-center text-white" href="">
                <i class="fab fa-youtube fa-1x"></i>
            </a>
            <a class="bg-yellow rounded-full p-2 flex justify-center items-center text-white" href="https://wa.me/9711484000" target="_blank">
                <i class="fab fa-whatsapp fa-1x"></i>
            </a>
            <a class="bg-yellow rounded-full p-2 flex justify-center items-center text-white" href="tel:+919516064000">
                <i class="fas fa-solid fa-phone fa-1x"></i>
            </a>
        </div>
    </div>
    <hr class="mt-8 text-white " />
    <ul class="foote_bottom_ul_amrc flex flex-wrap text-white font-bold justify-center space-x-4 mt-2 mb-10">
        <li><a href="./index.php" class="hover:underline hover:text-yellow">Home</a></li>
        <li><a href="./about.php" class="hover:underline hover:text-yellow">About</a></li>
        <li><a href="./service/legal-aid" class="hover:underline hover:text-yellow">Services</a></li>
        <li><a href="./case-status.php" class="hover:underline hover:text-yellow">Case Status</a></li>
        <li><a href="./governing-bodies.php" class="hover:underline hover:text-yellow">Governing Bodies</a></li>
        <li><a href="./advocate-panel.php" class="hover:underline hover:text-yellow">Pan India Advocates</a></li>
        <li><a href="./contact.php" class="hover:underline hover:text-yellow">Contact</a></li>
        <li><a href="./blogs.php" class="hover:underline hover:text-yellow">Blog</a></li>
        <li><a href="./declaration.php" class="hover:underline hover:text-yellow">Declaration</a></li>
    </ul>

    <div class="text-center text-base text-white mt-3">
        <p>Copyright <a href="https://npgrcomission.in/" class="text-white font-semibold">© NPGRC</a> The National Public Grievances
            & Redressal Commission 2024. All Rights Reserved </p>
    </div>
    <div class="text-center text-base text-white mt-5 pb-10 sm:pb-0 ">
        Designed and Developed by <a href="https://mindsahead.in/" class="text-white font-semibold">MindsAhead Digital</a>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="./js/index.js"></script>
<script>
    // Swiper for banner
    var swiper = new Swiper(".bannerSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        effect: "fade",
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

    });
    var swiper = new Swiper(".mySwiper", {
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

     // Swiper for logos
     var logoswiper = new Swiper(".logoSwiper", {
    slidesPerView: 5, // Default value for larger screens
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // When the window width is >= 320px
        220: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        320: {
            slidesPerView: 3,
            spaceBetween: 10,
        },
        // When the window width is >= 480px
        480: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        // When the window width is >= 640px
        640: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        // When the window width is >= 768px
        768: {
            slidesPerView: 5,
            spaceBetween: 30,
        },
        // When the window width is >= 1024px
        1024: {
            slidesPerView: 6,
            spaceBetween: 30,
        },
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const prevButton = document.querySelector('.carousel-button-prev');
    const nextButton = document.querySelector('.carousel-button-next');
    const carouselWrapper = document.querySelector('.carousel-wrapper');
    const carouselItems = document.querySelectorAll('.carousel-item');

    let currentIndex = 0;
    let autoSlideInterval;

    prevButton.addEventListener('click', () => {
        clearInterval(autoSlideInterval); // Clear the interval to prevent conflicts
        currentIndex = (currentIndex === 0) ? carouselItems.length - 1 : currentIndex - 1;
        updateCarousel();
        startAutoSlide(); // Restart the interval
    });

    nextButton.addEventListener('click', () => {
        clearInterval(autoSlideInterval); // Clear the interval to prevent conflicts
        currentIndex = (currentIndex === carouselItems.length - 1) ? 0 : currentIndex + 1;
        updateCarousel();
        startAutoSlide(); // Restart the interval
    });

    function updateCarousel() {
        const newTransformValue = -currentIndex * 100 + '%';
        carouselWrapper.style.transform = `translateX(${newTransformValue})`;
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(() => {
            currentIndex = (currentIndex === carouselItems.length - 1) ? 0 : currentIndex + 1;
            updateCarousel();
        }, 3000); // Change slides every 3 seconds
    }

    startAutoSlide();
});


</script>
</body>

</html>