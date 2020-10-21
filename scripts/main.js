// Attractions 
const swiper = new Swiper('.attr-container', {
    wrapperClass: 'attr-wrapper',
    slideClass: 'attr-slide',
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    loop: true,
    touchEventsTarget: 'wrapper',
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    }
  });

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
            current.style.height = 'auto';
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
const galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 1,
    effect: 'fade',
    freeMode: false,
    simulateTouch: false,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  const galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    slidesPerView: 3,
    speed: 500,
    grabCursor: true,
    breakpoints: {
      1200: {
        slidesPerView: 5
      }
    },
    centeredSlides: true,
    touchRatio: 0.5,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    thumbs: {
      swiper: galleryThumbs
    }
  });

window.addEventListener('resize', checkClubsHeaderHeight);
window.addEventListener('load', checkClubsHeaderHeight);