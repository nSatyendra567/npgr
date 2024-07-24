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
var swiper = new Swiper(".partnerSwiper", {
    slidesPerView: 2,
    spaceBetween: 20,
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 30,
        },
        1024: {
            slidesPerView: 5,
            spaceBetween: 30,
        },
    },

});