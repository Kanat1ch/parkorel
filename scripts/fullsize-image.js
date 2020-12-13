const viewImagesBtn = document.querySelector('.view-images');
const imagesSection = document.querySelector('.images');
const boxShadowStart = document.querySelector('.box-shadow-start');
const boxShadowEnd = document.querySelector('.box-shadow-end');
const closeImages = document.querySelector('.close-images');
const images = document.querySelectorAll('.image');
const loupe = document.querySelectorAll('.loupe');
const fullSize = document.querySelector('.fullsize-image');
const overlay = document.querySelector('.overlay');

const screenWidth = document.documentElement.clientWidth;
const screenHeight = document.documentElement.clientHeight;

if (images.length < 3) {
    imagesSection.classList.add('less-3');
} else if (images.length === 3) {
    imagesSection.classList.add('exactly-3');
} else if (images.length > 3 && images.length <= 6) {
    imagesSection.classList.add('more-3');
}

if (screenWidth > 1200) {
    if ((images.length - 2) / 3 == 1) {
        const emptyDiv = document.createElement('div');
        emptyDiv.classList.add('image');
        imagesSection.querySelector('.content').append(emptyDiv);
    }
}

viewImagesBtn.addEventListener('click', () => {
    if (screenWidth > screenHeight) {
    boxShadowStart.style.cssText = `box-shadow: 0 0 ${screenWidth * 1.5}px ${screenWidth * 1.5}px rgba(0, 0, 0, 0.5);`;
    boxShadowEnd.style.cssText = `box-shadow: 0 0 ${screenWidth * 1.5}px ${screenWidth * 1.5}px rgba(0, 0, 0, 0.5);`;
    } else {
        boxShadowStart.style.cssText = `box-shadow: 0 0 ${screenHeight * 1.5}px ${screenHeight * 1.5}px rgba(0, 0, 0, 0.5);`;
        boxShadowEnd.style.cssText = `box-shadow: 0 0 ${screenHeight * 1.5}px ${screenHeight * 1.5}px rgba(0, 0, 0, 0.5);`;
    }
    boxShadowStart.classList.add('active');
    boxShadowEnd.classList.add('active');
    viewImagesBtn.style.opacity = '0';
    document.documentElement.style.overflow = 'hidden';
    imagesSection.style.cssText = `opacity: 1; visibility: visible;`;
    closeImages.style.opacity = '1';
    setTimeout(() => {
        imagesSection.style.backdropFilter = 'blur(5px)';
    }, 300);
    images.forEach((item, index) => {
        item.style.transitionDelay = `${index * 0.1}s`;
        item.style.transform = 'translateY(0)';
        item.style.opacity = '1';
    });
});

closeImages.addEventListener('click', () => {
    boxShadowStart.classList.remove('active');
    boxShadowEnd.classList.remove('active');
    boxShadowStart.style.cssText = ``;
    boxShadowEnd.style.cssText =``;
    viewImagesBtn.style.opacity = '';
    document.documentElement.style.overflow = '';
    imagesSection.style.cssText = ``;
    closeImages.style.opacity = '0';
    images.forEach(item => {
        item.style.transitionDelay = '';
        item.style.transform = '';
        item.style.opacity = '';
    });
});

function openImage(e) {
    const image = e.target.parentElement.querySelector('img');
    const imagePath = image.getAttribute('src');
    fullSize.innerHTML = `<img src="${imagePath}"><div class="close-image">&times;</div>`;
    fullSize.style.cssText = `transform: translate(-50%, -50%) scale(1); opacity: 1;`;
    overlay.style.cssText = `opacity: 1; visibility: visible;`;

    const closeBtn = document.querySelector('.close-image');
    closeBtn.addEventListener('click', closeImage);
}

function closeImage() {
    fullSize.style.cssText = `transform: translate(-50%, -50%) scale(0); opacity: 0;`;
    overlay.style.cssText = `opacity: 0, visibility: hidden;`;
}

document.body.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        closeImage(e);
    }
});
overlay.addEventListener('click', closeImage);

loupe.forEach(item => {
    item.addEventListener('click', openImage);
});


