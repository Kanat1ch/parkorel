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
menuBtn.addEventListener('click', openCloseMenu);

function openCloseMenu() {
    mobileMenu.classList.toggle('active');
    if (mobileMenu.classList.contains('active')) {
        line.classList.add('active-arrow');
        body.style.overflowY = 'hidden';
        mobileMenu.style.overflowY = 'scroll';
    } else {
        line.classList.remove('active-arrow');
        body.style.overflowY = '';
    }
}

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

// Mobile Touches
let xStart = null;                  
function getTouchesMenu(event) {
    return event.touches || event.originalEvent.touches; 
}                                                     
function handleTouchStartMenu(event) {
    const firstTouch = getTouchesMenu(event)[0];                                      
    xStart = firstTouch.clientX;
}                                            
function handleTouchMoveMenu(event) {
    if (!xStart || xStart > 50) {
        return;
    }

    let xFinish = event.touches[0].clientX;                                    
    let diff = xStart - xFinish;
    console.log(diff);
        if (diff < -9) {
            openCloseMenu();
        }            
    /* reset values */
    xStart = null;
}

let yStart = null;                  
function getTouchesCloseMenu(event) {
    return event.touches || event.originalEvent.touches; 
}                                                     
function handleTouchStartCloseMenu(event) {
    const firstTouch = getTouchesMenu(event)[0];                                      
    yStart = firstTouch.clientX;
}                                            
function handleTouchMoveCloseMenu(event) {
    if (!yStart) {
        return;
    }

    let yFinish = event.touches[0].clientX;                                    
    let closeDiff = yStart - yFinish;
    console.log(closeDiff);
        if (closeDiff > 9) {
            openCloseMenu();
        }            
    /* reset values */
    yStart = null;
}

document.addEventListener('touchstart', handleTouchStartMenu, false);        
document.addEventListener('touchmove', handleTouchMoveMenu, false);
mobileMenu.addEventListener('touchstart', handleTouchStartCloseMenu, false);        
mobileMenu.addEventListener('touchmove', handleTouchMoveCloseMenu, false);