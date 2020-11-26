const visImpBtn = document.querySelector('.vis-imp-btn');
const defaultVersion = document.querySelector('#defaultVersion');
const visImpStyles = document.createElement('link');

visImpBtn.addEventListener('click', linkStyles);

function linkStyles() {
    visImpStyles.setAttribute('rel', 'stylesheet');
    visImpStyles.setAttribute('href', 'styles/css/vi-services.min.css');
    document.querySelector('head').append(visImpStyles);

    localStorage.setItem('vi', 'true');

    document.body.style.overflowY = '';
    document.documentElement.style.overflow = '';
}

defaultVersion.addEventListener('click', () => {
    window.location.reload();

    localStorage.setItem('vi', 'false');
    localStorage.setItem('viDarkTheme', 'false');
    localStorage.setItem('viFontSize', 0);
    localStorage.setItem('viLetterSpacing', 0);
});

const fontPlusBtn = document.getElementById('fontPlus');
const fontMinusBtn = document.getElementById('fontMinus');
const spacingPlusBtn = document.getElementById('spacingPlus');
const spacingMinusBtn = document.getElementById('spacingMinus');
const bgWhiteBtn = document.getElementById('bgWhite');
const bgBlackBtn = document.getElementById('bgBlack');

let elementSize = 0;
let elementSpacing = 0;
const elements = document.querySelectorAll('h1, h2, h3, a, p, span');

let lsFontSize = localStorage.getItem('viFontSize');
let lsLetterSpacing = localStorage.getItem('viLetterSpacing');

if (lsFontSize != 0) {
    elements.forEach(item => {
        const elementsFz = parseInt(window.getComputedStyle(item).getPropertyValue('font-size'));
        item.style.fontSize = `${elementsFz + 2 * lsFontSize}px`;
    });
    elementSize = lsFontSize;
    panelByDefault();
}

if (lsLetterSpacing != 0) {
    elements.forEach(item => {
        item.style.letterSpacing = `${lsLetterSpacing}px`;
    });
    elementSpacing = lsLetterSpacing;
    panelByDefault();
}

fontPlusBtn.addEventListener('click', () => {
    if (elementSize < 3) {
        elementSize++;

        elements.forEach(item => {
            const elementsFz = parseInt(window.getComputedStyle(item).getPropertyValue('font-size'));
            item.style.fontSize = `${elementsFz + 2}px`;
        });
    }

    localStorage.setItem('viFontSize', elementSize);

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

    localStorage.setItem('viFontSize', elementSize);

    panelByDefault();
});

spacingPlusBtn.addEventListener('click', () => {
    if (elementSpacing < 3) {
        elementSpacing++;
    }

    elements.forEach(item => {
        item.style.letterSpacing = `${elementSpacing}px`;
    });

    localStorage.setItem('viLetterSpacing', elementSpacing);

    panelByDefault();
});

spacingMinusBtn.addEventListener('click', () => {
    if (elementSpacing > 0) {
        elementSpacing--;
    }

    elements.forEach(item => {
        item.style.letterSpacing = `${elementSpacing}px`;
    });

    localStorage.setItem('viLetterSpacing', elementSpacing);

    panelByDefault();
});

bgBlackBtn.addEventListener('click', () => {
    localStorage.setItem('viDarkTheme', 'true');

    document.body.style.backgroundColor = '#111';
    document.body.classList.add('vi-dark');
});

bgWhiteBtn.addEventListener('click', () => {
    localStorage.setItem('viDarkTheme', 'false');

    document.body.style.backgroundColor = '';
    document.body.classList.remove('vi-dark');
});

function panelByDefault() {
    const elements = document.querySelectorAll('.vi-panel__item span, .vi-panel__item button, .header-vi ul li a');
    elements.forEach(item => {
        item.style.fontSize = '';
        item.style.letterSpacing = '';
    });
}