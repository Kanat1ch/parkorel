// Preloader
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

// Slider 2.0
const attrContent = document.querySelector('.attr__content');
const attrItems = document.querySelectorAll('.attr__content-item');
const btnLeft = document.querySelector('#btnLeft');
const btnRight = document.querySelector('#btnRight');
const navList = document.querySelector('.attr__navigation');
const swipe = document.querySelector('.leftswipe');
let position = 0;

// Create dots
attrItems.forEach(item => {
    const navDot = document.createElement('div');
    navDot.classList.add('attr__navigation-item');
    navList.append(navDot);
});

// First dot is active
const navItems = document.querySelectorAll('.attr__navigation-item');
navItems[0].classList.add('active');

// Change position if navItem is clicked
for (let i = 0; i < navItems.length; i++) {
    navItems[i].addEventListener('click', () => {
        position = i * 100;
        changeSlide();
    });
}

// Change slides
function changeSlide() {
    swipe.style.display = 'none';
    attrItems.forEach(item => {
        item.style.transform = `translateX(-${position}%)`;
    });
    
    navItems.forEach(navItem => {
        navItem.classList.remove('active');
    });

    navItems[position / 100].classList.add('active');
}

// Mobile Touches
let xDown = null;                                                        
let yDown = null;
function getTouches(event) {
  return event.touches || event.originalEvent.touches; 
}                                                     
function handleTouchStart(event) {
    const firstTouch = getTouches(event)[0];                                      
    xDown = firstTouch.clientX;                                      
}                                            
function handleTouchMove(event) {
    if (!xDown) {
        return;
    }

    let xUp = event.touches[0].clientX;                                    
    let xDiff = xDown - xUp;

        if (xDiff > 8) {
            if (position < (attrItems.length - 1) * 100) {
                position += 100;
                changeSlide();
            } else {
                position = 0;
                changeSlide();
            }
        } else if (xDiff < -8) {
            if (position > 0) {
                position -= 100;
                changeSlide();
            } else {
                position = (attrItems.length - 1) * 100;
                changeSlide();
            }
        }         
                      
    /* reset values */
    xDown = null;
}

// Event Listeners
btnRight.addEventListener('click', () => {
    if (position < (attrItems.length - 1) * 100) {
        position += 100;
        changeSlide();
    } else {
        position = 0;
        changeSlide();
    }
});
btnLeft.addEventListener('click', () => {
    if (position > 0) {
        position -= 100;
        changeSlide();
    } else {
        position = (attrItems.length - 1) * 100;
        changeSlide();
    }
});
attrContent.addEventListener('touchstart', handleTouchStart, false);        
attrContent.addEventListener('touchmove', handleTouchMove, false);

