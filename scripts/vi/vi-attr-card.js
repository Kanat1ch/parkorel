const visImpBtn = document.querySelector('.vis-imp-btn');
const defaultVersion = document.querySelector('#defaultVersion');

visImpBtn.addEventListener('click', () => {
    localStorage.setItem('vi', 'true');
});

defaultVersion.addEventListener('click', () => {
    window.location.reload();

    localStorage.setItem('vi', 'false');
});

const fontPlusBtn = document.getElementById('fontPlus');
const fontMinusBtn = document.getElementById('fontMinus');
const spacingPlusBtn = document.getElementById('spacingPlus');
const spacingMinusBtn = document.getElementById('spacingMinus');
const bgWhiteBtn = document.getElementById('bgWhite');
const bgBlackBtn = document.getElementById('bgBlack');

let elementSize = 0 ;
const elements = document.querySelectorAll('h1, h2, h3, h4, a, p, ul, span, small');
const elementsBorder = document.querySelectorAll('.header-vi li');

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
    elements.forEach(item => {
        item.style.color = '#fff';
    });

    elementsBorder.forEach(item => {
        item.style.borderColor = '#fff';
    });

    document.body.style.backgroundColor = '#111';
});

bgWhiteBtn.addEventListener('click', () => {    
    elements.forEach(item => {
        item.style.color = '';
    });

    elementsBorder.forEach(item => {
        item.style.borderColor = '';
    });

    document.body.style.backgroundColor = '';
});

function panelByDefault() {
    const elements = document.querySelectorAll('.vi-panel__item span, .vi-panel__item button, .header-vi ul li a');
    elements.forEach(item => {
        item.style.fontSize = '';
        item.style.letterSpacing = '';
    });
}