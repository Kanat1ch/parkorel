const visImpBtn = document.querySelector('.vis-imp-btn');
const defaultVersion = document.querySelector('#defaultVersion');
const visImpStyles = document.createElement('link');

visImpBtn.addEventListener('click', () => {
    visImpStyles.setAttribute('rel', 'stylesheet');
    visImpStyles.setAttribute('href', 'styles/css/vi.min.css');
    document.querySelector('head').append(visImpStyles);

    const hr = document.querySelectorAll('hr');
    hr.forEach(item => {
        item.style.display = 'none';
    });

    swiper.destroy(false);
    galleryThumbs.destroy(false);
    galleryTop.destroy(false);

    document.querySelectorAll('.clubs__content-item').forEach(item => {
        item.style.height = '';
        item.classList.add('clubs__content-item-vi');
        item.classList.remove('clubs__content-item');
    });
});

defaultVersion.addEventListener('click', () => {
    window.location.reload();
});

const fontPlusBtn = document.getElementById('fontPlus');
const fontMinusBtn = document.getElementById('fontMinus');
const spacingPlusBtn = document.getElementById('spacingPlus');
const spacingMinusBtn = document.getElementById('spacingMinus');
const bgWhiteBtn = document.getElementById('bgWhite');
const bgBlackBtn = document.getElementById('bgBlack');

let elementSize = 0 ;
const elements = document.querySelectorAll('h1, h2, h3, a, p, span, .place-text, #date, .slide-title, .attr__item-title, .attr__info-item_text');

fontPlusBtn.addEventListener('click', () => {
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
    if (elementSpacing < 3) {
        elementSpacing++;
    }

    elements.forEach(item => {
        item.style.letterSpacing = `${elementSpacing}px`;
    });

    panelByDefault();
});

spacingMinusBtn.addEventListener('click', () => {
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
    const elementsBorder = document.querySelectorAll('.header-vi li, .afisha h2, .afisha a, .attr-slide, .clubs__content-item-vi');
    
    elements.forEach(item => {
        item.style.color = '#fff';
    });

    elementsBorder.forEach(item => {
        item.style.borderColor = '#fff';
    });

    document.body.style.backgroundColor = '#111';

    document.querySelectorAll('.intro__places_item img').forEach(item => {
        item.style.filter = 'brightness(1)';
    });
});

bgWhiteBtn.addEventListener('click', () => {
    const elementsBorder = document.querySelectorAll('.header-vi li, .afisha h2, .afisha a, .attr-slide, .clubs__content-item-vi');
    
    elements.forEach(item => {
        item.style.color = '';
    });

    elementsBorder.forEach(item => {
        item.style.borderColor = '';
    });

    document.body.style.backgroundColor = '';

    document.querySelectorAll('.intro__places_item img').forEach(item => {
        item.style.filter = 'brightness(0)';
    });
});

function panelByDefault() {
    const elements = document.querySelectorAll('.vi-panel__item span, .vi-panel__item button');
    elements.forEach(item => {
        item.style.fontSize = '';
        item.style.letterSpacing = '';
    });
}