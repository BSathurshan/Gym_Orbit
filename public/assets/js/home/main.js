document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling to all links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Animate stats when they come into view
    const stats = document.querySelectorAll('.stat-number');
    const options = {
        threshold: 0.5,
        rootMargin: "0px"
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, options);

    stats.forEach(stat => {
        stat.style.opacity = 0;
        stat.style.transform = 'translateY(20px)';
        observer.observe(stat);
    });

    // Add smooth reveal for news cards
    const newsCards = document.querySelectorAll('.news-card');
    newsCards.forEach((card, index) => {
        card.style.opacity = 0;
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.opacity = 1;
            card.style.transform = 'translateY(0)';
        }, 200 * index);
    });

    // Animate elements when they come into view
    const animateElements = document.querySelectorAll('.animate-fade-up');
    const animateOptions = {
        threshold: 0.2,
        rootMargin: "50px"
    };

    const animateObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target);
            }
        });
    }, animateOptions);

    animateElements.forEach(element => {
        element.style.opacity = 0;
        element.style.transform = 'translateY(20px)';
        animateObserver.observe(element);
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navPages = document.querySelector('.nav-pages');

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
            navPages.classList.toggle('active');
        });
    }
}); 