const visImpBtn = document.querySelector('.vis-imp-btn');
const defaultVersion = document.querySelector('#defaultVersion');
const visImpStyles = document.createElement('link');


visImpBtn.addEventListener('click', () => {
    visImpStyles.setAttribute('rel', 'stylesheet');
    visImpStyles.setAttribute('href', 'styles/css/visimp.min.css');
    document.querySelector('head').append(visImpStyles);

    const hr = document.querySelectorAll('hr');
    hr.forEach(item => {
        item.style.display = 'none';
    });

    swiper.destroy();
    galleryThumbs.destroy();
    galleryTop.destroy();

    document.querySelectorAll('.clubs__content-item').forEach(item => {
        item.classList.add('clubs__content-item-vi');
        item.classList.remove('clubs__content-item');
    });
});

defaultVersion.addEventListener('click', () => {
    visImpStyles.remove();

    // swiper.init();
    // galleryThumbs.init();
    // galleryTop.init();

    const hr = document.querySelectorAll('hr');
    hr.forEach(item => {
        item.style.display = '';
    });

    document.querySelectorAll('.clubs__content-item-vi').forEach(item => {
        item.classList.add('clubs__content-item');
        item.classList.remove('clubs__content-item-vi');
    });

    document.querySelectorAll('*').forEach(item => {
        item.style.fontSize = '';
        item.style.letterSpacing = '';
        item.style.color = '';
        item.style.borderColor = '';
    });

    document.body.style.backgroundColor = '';
});

const fontPlusBtn = document.getElementById('fontPlus');
const fontMinusBtn = document.getElementById('fontMinus');
const spacingPlusBtn = document.getElementById('spacingPlus');
const spacingMinusBtn = document.getElementById('spacingMinus');
const bgWhiteBtn = document.getElementById('bgWhite');
const bgBlackBtn = document.getElementById('bgBlack');

let elementSize = 0 ;

fontPlusBtn.addEventListener('click', () => {
    const elements = document.querySelectorAll('h1, h2, h3, a, p, span, #date, .slide-title');

    if (elementSize < 3) {
        elementSize++;

        elements.forEach(item => {
            const elementsFz = parseInt(window.getComputedStyle(item).getPropertyValue('font-size'));
            item.style.fontSize = `${elementsFz + 2}px`;
        });
    }

    panelByDefault();
});

fontMinusBtn.addEventListener('click', () => {
    const elements = document.querySelectorAll('h1, h2, h3, a, p, span, #date, .slide-title');

    if (elementSize > 0) {
        elementSize--;

        elements.forEach(item => {
            const elementsFz = parseInt(window.getComputedStyle(item).getPropertyValue('font-size'));
            item.style.fontSize = `${elementsFz - 2}px`;
        });
    }

    panelByDefault();

});

let elementSpacing = 0;

spacingPlusBtn.addEventListener('click', () => {
    const elements = document.querySelectorAll('h1, h2, h3, a, p, span, #date, .slide-title');
    if (elementSpacing < 3) {
        elementSpacing++;
    }

    elements.forEach(item => {
        item.style.letterSpacing = `${elementSpacing}px`;
    });

    panelByDefault();
});

spacingMinusBtn.addEventListener('click', () => {
    const elements = document.querySelectorAll('h1, h2, h3, a, p, span, #date, .slide-title');
    if (elementSpacing > 0) {
        elementSpacing--;
    }

    elements.forEach(item => {
        const elementsSpacing = parseInt(window.getComputedStyle(item).getPropertyValue('letter-spacing'));
        item.style.letterSpacing = `${elementsSpacing - 1}px`;
    });

    panelByDefault();
});

bgBlackBtn.addEventListener('click', () => {
    const elements = document.querySelectorAll('h1, h2, h3, a, p, span, #date, .slide-title');
    const elementsBorder = document.querySelectorAll('.header-vi li, .afisha h2, .afisha a, .attr-slide, .clubs__content-item-vi');
    
    elements.forEach(item => {
        item.style.color = '#fff';
    });

    elementsBorder.forEach(item => {
        item.style.borderColor = '#fff';
    });

    document.body.style.backgroundColor = '#111';
});

bgWhiteBtn.addEventListener('click', () => {
    const elements = document.querySelectorAll('h1, h2, h3, a, p, span, #date, .slide-title');
    const elementsBorder = document.querySelectorAll('.header-vi li, .afisha h2, .afisha a, .attr-slide, .clubs__content-item-vi');
    
    elements.forEach(item => {
        item.style.color = '';
    });

    elementsBorder.forEach(item => {
        item.style.borderColor = '';
    });

    document.body.style.backgroundColor = '';
});

function panelByDefault() {
    const elements = document.querySelectorAll('.vi-panel__item span, .vi-panel__item button');
    elements.forEach(item => {
        item.style.fontSize = '';
        item.style.letterSpacing = '';
    });
}
