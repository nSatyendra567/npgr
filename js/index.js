// Menu 
const menu = document.getElementById('menu')
            const sidebar = document.getElementById('sidebar')
            menu.addEventListener('click', () => {
                sidebar.classList.add('changemenu')
            })
            removemenu.addEventListener('click', () => {
                sidebar.classList.remove('changemenu')
            })
            
  // Swiper for banner
  var swiper = new Swiper(".bannerSwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: true,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

});

// Swiper for partners
var swiper = new Swiper(".logoSwiper", {
    slidesPerView: 4, // Default number of slides for larger screens
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        480: {
            slidesPerView: 2, // Show 2 slides at a time on small screens
            spaceBetween: 10,
        },
        640: {
            slidesPerView: 3, // Show 3 slides at a time on small screens
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 4, // Show 4 slides at a time on medium screens
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 5, // Show 5 slides at a time on large screens
            spaceBetween: 30,
        },
        1280: {
            slidesPerView: 6, // Show 6 slides at a time on extra-large screens
            spaceBetween: 40,
        },
    },
});

