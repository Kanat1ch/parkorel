// Onload events
let startWidth = document.documentElement.clientWidth;
checkWindowWidth();

let body = document.documentElement;
if (body.requestFullscreen) {
  body.requestFullscreen();
} else if (body.webkitrequestFullscreen) {
  body.webkitrequestFullscreen();
} else if (body.mozrequestFullscreen) {
  body.mozrequestFullscreen();
} else if (body.msrequestFullscreen) {
  body.msrequestFullscreen();
}

// Slider 3.0
const attrContent = document.querySelector('.attr__content');
const attrItems = document.querySelectorAll('.attr__content-item');
const btnLeft = document.querySelector('#btnLeft');
const btnRight = document.querySelector('#btnRight');
const navList = document.querySelector('.attr__navigation');
const swipe = document.querySelector('.leftswipe');
const slideProgress = document.querySelector('.slide-progress');
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
    slideProgress.classList.remove('active');
    setTimeout(goes, 50);
    function goes() {
        slideProgress.classList.add('active');
    }
    attrItems.forEach(item => {
        item.style.transform = `translateX(-${position}%)`;
    });
    
    navItems.forEach(navItem => {
        navItem.classList.remove('active');
    });

    navItems[position / 100].classList.add('active');
}

function nextSlide() {
    clearInterval(slideInterval);
    if (position < (attrItems.length - 1) * 100) {
        position += 100;
        changeSlide();
    } else {
        position = 0;
        changeSlide();
    }
    slideInterval = setInterval(nextSlide, 6000);
}

function prevSlide() {
    clearInterval(slideInterval);
    if (position > 0) {
        position -= 100;
        changeSlide();
    } else {
        position = (attrItems.length - 1) * 100;
        changeSlide();
    }
    slideInterval = setInterval(nextSlide, 6000);
}

let slideInterval = setInterval(nextSlide, 6000);
slideProgress.classList.add('active');


// Mobile Touches
let xDown = null;                  
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
    clearInterval(slideInterval);
        if (xDiff > 9) {
            if (position < (attrItems.length - 1) * 100) {
                position += 100;
                changeSlide();
            } else {
                position = 0;
                changeSlide();
            }
            swipe.style.display = 'none';
        } else if (xDiff < -9) {
            if (position > 0) {
                position -= 100;
                changeSlide();
            } else {
                position = (attrItems.length - 1) * 100;
                changeSlide();
            }
            swipe.style.display = 'none';
        }   
        slideInterval = setInterval(nextSlide, 6000);      
                      
    /* reset values */
    xDown = null;
}

// Clubs Tabs
const clubsItems = document.querySelectorAll('.clubs__content-item');

function checkClubsHeaderHeight() {
    clubsItems.forEach(item => {
        if (item.querySelector('h2').offsetHeight > 30) {
            item.style.padding = '12px 0';
        } else {
            item.style.padding = '22px 0';
        }
    });
}

clubsItems.forEach(item => {
    item.addEventListener('click', e => {
        let current = e.target.closest('.clubs__content-item');
        if (!current.querySelector('.clubs-description').classList.contains('active')) {
            current.querySelector('.clubs-description').classList.add('active');
            let currentHeight = current.scrollHeight;
            current.style.height = currentHeight + 15 + 'px';
            current.querySelector('.clubs-title').style.justifyContent = 'space-between';
            current.querySelector('span').classList.add('active');
            current.querySelector('.clubs-showfull').style.transform = 'scale(1, -1)';
        } else {
            current.style.height = '70px';
            current.querySelector('.clubs-description').classList.remove('active');
            current.querySelector('.clubs-title').style.justifyContent = '';
            current.querySelector('span').classList.remove('active');
            current.querySelector('.clubs-showfull').style.transform = '';
        }
    });
});


// History slider
const historyDate = document.querySelector('.history-date');
const historyNext = document.querySelector('.history-text__next');
const historyPrev = document.querySelector('.history-text__prev');
const years = document.querySelector('.years');
const yearsItems = document.querySelectorAll('.years-item');
const historyItems = document.querySelectorAll('.text-item');
const historyMainText = document.querySelector('.history-text__main-text');
function checkWindowWidth() {
    let historyWidth = document.documentElement.clientWidth;
    return historyWidth;
}

let yearsStep = 40;
if (checkWindowWidth() < 577) {
    yearsStep = 33.333333;
}

let activeYear = 0;

function nextYear() {
    if (activeYear < yearsItems.length - 1) {
        activeYear++;
        for (let i = 0; i < yearsItems.length; i++) {
            yearsItems[i].classList.remove('active');
            historyItems[i].classList.remove('active');
            yearsItems[activeYear].classList.add('active');
            historyItems[activeYear].classList.add('active');
        }
        if (checkWindowWidth() < 577) {
            yearsStep -= 33.333333;
        } else {
            yearsStep -= 20;
        }
        years.style.transform = `translateX(${yearsStep}%)`;
    } else {
        activeYear = 0;
        yearsStep = 40;
        if (checkWindowWidth() < 577) {
            yearsStep = 33.333333;
        }
        for (let i = 0; i < yearsItems.length; i++) {
            yearsItems[i].classList.remove('active');
            historyItems[i].classList.remove('active');
            yearsItems[activeYear].classList.add('active');
            historyItems[activeYear].classList.add('active');
        }
        years.style.transform = `translateX(${yearsStep}%)`;
    }
}

function prevYear() {
    if (activeYear > 0) {
        activeYear--;
        for (let i = 0; i < yearsItems.length; i++) {
            yearsItems[i].classList.remove('active');
            historyItems[i].classList.remove('active');
            yearsItems[activeYear].classList.add('active');
            historyItems[activeYear].classList.add('active');
        }
        if (checkWindowWidth() < 577) {
            yearsStep += 33.333333;
        } else {
            yearsStep += 20;
        }
        years.style.transform = `translateX(${yearsStep}%)`;
    } else {
        activeYear = yearsItems.length - 1;
        yearsStep = -(yearsItems.length - 1) * 20 + 40;
        if (checkWindowWidth() < 577) {
            yearsStep = -(yearsItems.length - 1) * 33.333333 + 33.333333;
        }
        for (let i = 0; i < yearsItems.length; i++) {
            yearsItems[i].classList.remove('active');
            historyItems[i].classList.remove('active');
            yearsItems[activeYear].classList.add('active');
            historyItems[activeYear].classList.add('active');
        }
        years.style.transform = `translateX(${yearsStep}%)`;
    }

}

function resetActive() {
    let newWidth = document.documentElement.clientWidth;
    if (startWidth != newWidth) {
        activeYear = 0;
        yearsStep = 40;
        if (checkWindowWidth() < 577) {
            yearsStep = 33.333333;
        }
        for (let i = 0; i < yearsItems.length; i++) {
            yearsItems[i].classList.remove('active');
            historyItems[i].classList.remove('active');
            yearsItems[activeYear].classList.add('active');
            historyItems[activeYear].classList.add('active');
        }
        years.style.transform = `translateX(${yearsStep}%)`;
        startWidth = newWidth;
    }
}

// Mobile Touches
let yDown = null;                  
function getTouchesHistory(event) {
  return event.touches || event.originalEvent.touches; 
}                                                     
function handleTouchStartHistory(event) {
    const firstTouch = getTouchesHistory(event)[0];                                      
    yDown = firstTouch.clientX;
}                                            
function handleTouchMoveHistory(event) {
    if (!yDown) {
        return;
    }

    let yUp = event.touches[0].clientX;                                    
    let yDiff = yDown - yUp;
        if (yDiff > 9) {
            nextYear();
        } else if (yDiff < -9) {
            prevYear();
        }                     
    /* reset values */
    yDown = null;
}

// Event Listeners
btnRight.addEventListener('click', nextSlide);
btnLeft.addEventListener('click', prevSlide);
attrContent.addEventListener('touchstart', handleTouchStart, false);        
attrContent.addEventListener('touchmove', handleTouchMove, false);
historyDate.addEventListener('touchstart', handleTouchStartHistory, false);        
historyDate.addEventListener('touchmove', handleTouchMoveHistory, false);
historyMainText.addEventListener('touchstart', handleTouchStartHistory, false);        
historyMainText.addEventListener('touchmove', handleTouchMoveHistory, false);
historyNext.addEventListener('click', nextYear);
historyPrev.addEventListener('click', prevYear);
window.addEventListener('resize', checkWindowWidth);
window.addEventListener('resize', resetActive);
window.addEventListener('resize', checkClubsHeaderHeight);
window.addEventListener('load', checkClubsHeaderHeight);