<footer class="relative w-full min-h-[100px]  bg-blue py-10 px-10 md:px-16 lg:px-24 xl:px-32">
    <!-- Fixed Buttons -->
    <!-- <a href="https://api.whatsapp.com/send?phone=9955005100" class="text-3xl w-1/2 h-12 sm:w-20 sm:h-20 flex justify-center items-center  bg-light-blue p-5 sm:rounded-[50%] text-white fixed left-0 bottom-0 sm:left-10 sm:bottom-10 z-20 border-r"><i class="fa-brands fa-whatsapp "></i></a>
    <a href="tel:+919955005100" class="text-2xl  w-1/2 h-12 sm:w-20 sm:h-20 flex justify-center items-center bg-light-blue p-5 sm:rounded-[50%] text-white fixed right-0 bottom-0 sm:right-10 sm:bottom-10 z-20 border-l"> <i class="fa-solid fa-phone"></i>
    </a> -->

   
    <div class="flex flex-col items-center justify-center flex-wrap gap-10">
        <figure class="w-32 h-32">
            <img class="w-full h-full object-cover" src="./images/npgrc.png" alt="NPGRC" />
        </figure>
        <p class="text-center text-white text-lg">राष्ट्रीय लोक शिकायत एवं निवारण आयोग</p>
    </div>
    <hr class="mt-8 text-white " />
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
        320: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        // When the window width is >= 480px
        480: {
            slidesPerView: 2,
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

</script>
</body>

</html>