function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileBar');
    
    // List of sections to blur, using their existing class names or attributes
    const sectionsToBlur = [
        document.querySelector('.hero'),              // Home section
        document.querySelector('.stats-section'),    // Stats section
        document.querySelector('section[style*="text-align: center"]'), // Social media section
        document.querySelector('.testimonials'),     // Testimonials section
        document.querySelector('.features'),         // Features section
        document.querySelector('.services'),         // Services section
        document.querySelector('.about-us'),         // About Us section
        document.querySelector('.support')           // Support section
    ].filter(Boolean); // Remove any null/undefined elements

    // Check if the mobile menu is visible (block) or not
    const isMenuVisible = mobileMenu.style.display === 'block';

    if (isMenuVisible) {
        // Hide the mobile menu
        mobileMenu.style.display = 'none';
        
        // Remove blur from each section with a staggered delay
        sectionsToBlur.forEach((section, index) => {
            setTimeout(() => {
                section.classList.remove('blur');
            }, index * 200); // 200ms delay between each section
        });
    } else {
        // Show the mobile menu
        mobileMenu.style.display = 'block';
        
        // Apply blur to each section with a staggered delay
        sectionsToBlur.forEach((section, index) => {
            setTimeout(() => {
                section.classList.add('blur');
            }, index * 200); // 200ms delay between each section
        });

        // Ensure the mobile menu itself is not blurred
        mobileMenu.classList.remove('blur');
    }
}

// Add click event listeners to mobile menu links
document.querySelectorAll('.mobile-nav-list a').forEach(link => {
    link.addEventListener('click', () => {
        const mobileMenu = document.getElementById('mobileBar');
        const sectionsToBlur = [
            document.querySelector('.hero'),
            document.querySelector('.stats-section'),
            document.querySelector('section[style*="text-align: center"]'),
            document.querySelector('.testimonials'),
            document.querySelector('.features'),
            document.querySelector('.services'),
            document.querySelector('.about-us'),
            document.querySelector('.support')
        ].filter(Boolean);

        // Hide the mobile menu (equivalent to setting isMenuVisible to false)
        mobileMenu.style.display = 'none';
        
        // Remove blur from each section with a staggered delay
        sectionsToBlur.forEach((section, index) => {
            setTimeout(() => {
                section.classList.remove('blur');
            }, index * 200); // 200ms delay between each section
        });
    });
});