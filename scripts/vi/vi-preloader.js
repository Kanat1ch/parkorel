if ((localStorage.getItem('vi')) == 'true') {
    showPreloader();
    function showPreloader() {
        let hideAll = document.querySelector('.cssload-container');
        if ((localStorage.getItem('viDarkTheme') == 'true')) {
            hideAll.style.backgroundColor = '#111';
        }
        hideAll.style.display = 'block';
        document.body.onload = function() {
            setTimeout(function() {
                hideAll.style.display = 'none';
            }, 500);
        };
    }
}