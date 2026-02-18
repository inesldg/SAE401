window.addEventListener('scroll', function () {
    const header = document.querySelector('header');
    if (window.scrollY > 70) { // Si on scrolle de plus de 70px
        header.classList.add('sticky');
    } else {
        if (window.scrollY == 0) {
            header.classList.remove('sticky');
        }
    }
});