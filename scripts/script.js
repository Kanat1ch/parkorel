// DOM Elements
const body = document.querySelector('body'),
      header = document.querySelector('.header'),
      menuBtn = document.querySelector('.menu-btn'),
      mobileMenu = document.querySelector('.mobile-menu'),
      line = document.querySelector('.line'),
      searchBtn = document.querySelector('.search-btn'),
      searchInput = document.querySelector('.header__navmenu input'),
      headerInfo = document.querySelector('.header__info'),
      navLinks = document.querySelectorAll('.mobile-menu ul li');

// Visually Impaired
if ((localStorage.getItem('vi')) == 'true') {
    
}
      

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
menuBtn.addEventListener('click', openCloseMenu);

function openCloseMenu() {
    mobileMenu.classList.toggle('active');
    if (mobileMenu.classList.contains('active')) {
        line.classList.add('active-arrow');
        body.style.overflowY = 'hidden';
        document.documentElement.style.overflow = 'hidden';
        mobileMenu.style.overflowY = 'scroll';
    } else {
        line.classList.remove('active-arrow');
        body.style.overflowY = '';
        document.documentElement.style.overflow = '';
    }
}

// Fixed Menu
document.addEventListener('scroll', () => {
    if (window.pageYOffset > 70) {
        header.style.transform = 'translateY(-80px)';
        header.classList.add('fixed');
        header.style.transform = 'translateY(0)';
    } else {
        header.style.transform = 'translateY(0)';
        header.classList.remove('fixed');
    }
});

// Mobile Menu

navLinks.forEach((link, index) => {
    link.style.transitionDelay = `${index * 0.03}s`;
});
