window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.custom-navbar-bg');
    var links = navbar.querySelectorAll('.nav-item a');
    var scrolled = window.pageYOffset || document.documentElement.scrollTop;
    var regularLogo = document.querySelector('.regular-logo');
    var scrolledLogo = document.querySelector('.scrolled-logo');

    // Toggle navbar background and link styles
    if (scrolled > 300) {
        navbar.classList.add('navbar-scrolled');
        for (var i = 0; i < links.length; i++) {
            links[i].classList.add('link-scrolled');
        }
        if (scrolledLogo) {
            scrolledLogo.style.display = 'block';
        }
        if (regularLogo) {
            regularLogo.style.display = 'none';
        }
    } else {
        navbar.classList.remove('navbar-scrolled');
        for (var i = 0; i < links.length; i++) {
            links[i].classList.remove('link-scrolled');
        }
        if (scrolledLogo) {
            scrolledLogo.style.display = 'none';
        }
        if (regularLogo) {
            regularLogo.style.display = 'block';
        }
    }
});




document.addEventListener("DOMContentLoaded", function () {
    // Temukan tombol "Get Started" dengan ID "get-started-button"
    const getStartedButton = document.querySelector("#get-started-button");

    // Temukan elemen div input dengan ID "input-section"
    const inputSection = document.querySelector("#input-section");

    // Tambahkan event listener untuk tombol "Get Started"
    getStartedButton.addEventListener("click", function (e) {
        e.preventDefault();
        
        // Lakukan scroll otomatis ke elemen div input
        inputSection.scrollIntoView({ behavior: "smooth" });
    });
});
