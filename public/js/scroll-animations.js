// Scroll Animation Handler
document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with animation classes, excluding header elements
    const animatedElements = document.querySelectorAll('.fade-up, .fade-in-left, .fade-in-right, .fade-in-scale, .slide-in-up');
    
    // Filter out header elements to prevent animations
    const filteredElements = Array.from(animatedElements).filter(element => {
        return !element.closest('header') && !element.closest('.header');
    });
    
    // Create intersection observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add animate class when element comes into view
                entry.target.classList.add('animate');
                
                // For staggered animations, add delay classes
                const parent = entry.target.closest('.row');
                if (parent) {
                    const siblings = Array.from(parent.children);
                    const index = siblings.indexOf(entry.target.closest('.col-lg-6, .col-lg-4, .col-lg-3, .col-lg-5, .col-6'));
                    
                    if (index !== -1) {
                        // Add delay based on index
                        entry.target.classList.add(`animate-delay-${Math.min(index + 1, 4)}`);
                    }
                }
            }
        });
    }, {
        threshold: 0.2, // Trigger when 20% of element is visible
        rootMargin: '0px 0px -100px 0px' // Start animation earlier to reduce white flash
    });
    
    // Observe all filtered animated elements (excluding header)
    filteredElements.forEach(element => {
        observer.observe(element);
    });
    
    // Special handling for work gallery items
    const workItems = document.querySelectorAll('.work__item');
    workItems.forEach((item, index) => {
        observer.observe(item);
        // Add staggered delay
        item.style.animationDelay = `${index * 0.05}s`;
    });
    
    // Special handling for portfolio items
    const portfolioItems = document.querySelectorAll('.portfolio__item');
    portfolioItems.forEach((item, index) => {
        observer.observe(item);
        // Add staggered delay
        item.style.animationDelay = `${index * 0.1}s`;
    });
    
    // Special handling for services items
    const serviceItems = document.querySelectorAll('.services__item');
    serviceItems.forEach((item, index) => {
        observer.observe(item);
        // Add staggered delay
        item.style.animationDelay = `${index * 0.08}s`;
    });
    
    // Special handling for partners logos
    const partnerLogos = document.querySelectorAll('.partners__logo');
    partnerLogos.forEach((logo, index) => {
        observer.observe(logo);
        // Add staggered delay
        logo.style.animationDelay = `${index * 0.05}s`;
    });
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Parallax effect for hero section
window.addEventListener('scroll', function() {
    const scrolled = window.pageYOffset;
    const hero = document.querySelector('.hero');
    if (hero) {
        hero.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});

// Add scroll progress indicator
window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset;
    const docHeight = document.body.offsetHeight - window.innerHeight;
    const scrollPercent = (scrollTop / docHeight) * 100;
    
    // Update any progress bars or indicators
    const progressBars = document.querySelectorAll('.scroll-progress');
    progressBars.forEach(bar => {
        bar.style.width = scrollPercent + '%';
    });
});
