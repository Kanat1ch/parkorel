let galleryThumbs = new Swiper('.gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 1,
  effect: 'fade',
  freeMode: false,
  simulateTouch: false,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
let galleryTop = new Swiper('.gallery-top', {
  spaceBetween: 10,
  slidesPerView: 3,
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
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: galleryThumbs
  }
});