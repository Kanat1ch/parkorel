// DOM Elements
const body = document.querySelector('body'),
      header = document.querySelector('.header'),
      menuBtn = document.querySelector('.menu-btn'),
      mobileMenu = document.querySelector('.mobile-menu'),
      line = document.querySelector('.line'),
      searchBtn = document.querySelector('.search-btn'),
      searchInput = document.querySelector('.header__navmenu input'),
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
        mobileMenu.style.overflowY = 'scroll';
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