let preloader = document.querySelector('.preloader');
if (sessionStorage.getItem('visited') != '1') {
    showPreloader();
    sessionStorage.setItem('visited', '1');
}
function showPreloader() {
    preloader.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    document.body.onload = function() {
        setTimeout(function() {
            if (!preloader.classList.contains('done')) {
                preloader.classList.add('done');
            }
            document.body.style.overflow = '';
        }, 1800);
    };
}