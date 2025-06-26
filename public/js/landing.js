// Animasi saat scroll
document.addEventListener('DOMContentLoaded', function () {
    // Animasi saat elemen masuk ke viewport
    const animateOnScroll = function () {
        const elements = document.querySelectorAll('.animate-scroll');
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const screenPosition = window.innerHeight / 1.3;

            if (elementPosition < screenPosition) {
                element.classList.add('animated');
            }
        });
    };

    // Efek navbar saat scroll
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        animateOnScroll();
    });

    // Jalankan saat halaman dimuat
    animateOnScroll();

    // Smooth scrolling untuk anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 80, // Sesuaikan offset ini jika navbar fixed Anda punya tinggi berbeda
                    behavior: 'smooth'
                });
            }
        });
    });
});
