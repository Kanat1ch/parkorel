// // Preloader
// document.body.onload = function() {
//     setTimeout(function() {
//         let preloader = document.querySelector('.preloader');
//         if (!preloader.classList.contains('done')) {
//             preloader.classList.add('done');
//         }
//     }, 1800);
// };


// DOM Elements
const body = document.querySelector('body'),
      header = document.querySelector('.header'),
      menuBtn = document.querySelector('.menu-btn'),
      mobileMenu = document.querySelector('.mobile-menu'),
      line = document.querySelector('.line'),
      searchBtn = document.querySelector('.search-btn'),
      searchInput = document.querySelector('input'),
      headerInfo = document.querySelector('.header__info');

// Search Button
searchBtn.addEventListener('click', () => {
    searchInput.classList.toggle('search-active');
    if (searchInput.classList.contains('search-active')) {
        headerInfo.style.transform = 'translateY(-80px)';
    } else {
        headerInfo.style.transform = '';
    }
});

// Burger menu
menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('active');
    if (mobileMenu.classList.contains('active')) {
        line.classList.add('active-arrow');
        body.style.overflowY = 'hidden';
    } else {
        line.classList.remove('active-arrow');
        body.style.overflowY = '';
    }
});

// Fixed Menu
document.addEventListener('scroll', () => {
    if (window.pageYOffset > 30) {
        header.style.transform = 'translateY(-80px)';
    } else {
        header.style.transform = 'translateY(0)';
    }

    if (window.pageYOffset > window.innerHeight - 80) {
       header.classList.add('fixed');
       header.style.transform = 'translateY(0)';
    } else {
        header.classList.remove('fixed');
    }


});

// Slider
const track = document.querySelector('.attr-items');
const slides = document.querySelectorAll('.attr-item');
const btnLeft = document.querySelector('#btnLeft');
const btnRight = document.querySelector('#btnRight');


let slidesToShow = 4; // Количество видимых слайдов
const slidesToScroll = 1; // Количество прокручиваемых слайдов
let position = 0; // Текущая позиция

let itemWidth = slides[0].clientWidth;

function getSlides() {
    if (document.documentElement.clientWidth < 1200.02 && document.documentElement.clientWidth > 768.02) {
        slidesToShow = 3;
    } else if (document.documentElement.clientWidth <= 768.02 && document.documentElement.clientWidth > 456.02) {
        slidesToShow = 2;
    } else if (document.documentElement.clientWidth <= 456.02) {
        slidesToShow = 1;
    } else {    
        slidesToShow = 4;
    }
    slides.forEach(function(item) {
        item.style.minWidth = 100 / slidesToShow + '%';
    });
    itemWidth = slides[0].clientWidth;
    position = 0;
    moveSlide(position);
}

getSlides();


window.addEventListener('resize', getSlides);


btnRight.addEventListener('click', () => {
    btnLeft.style.opacity = '';
    if (position < slides.length - slidesToShow) {
        position += slidesToScroll;
        moveSlide(position);

        if (position == slides.length - slidesToShow) {
            btnRight.style.opacity = '0.75';
        }
    }
});

btnLeft.addEventListener('click', () => {
    btnRight.style.opacity = '';
    if (position > 0) {
        position -= slidesToScroll;
        moveSlide(position);

        if (position == 0) {
            btnLeft.style.opacity = '0.75';
        }
    }
});
 
function moveSlide(position) {
    slides.forEach(function(item) {
        item.style.transform = `translateX(-${position * itemWidth}px)`;
    });
}

