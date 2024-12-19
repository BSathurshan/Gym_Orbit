document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll('.form-slide'); // Get all slides
    let currentIndex = 0; // Start at the first slide

    const nextButtons = document.querySelectorAll('.next-btn'); // Next buttons
    const prevButtons = document.querySelectorAll('.prev-btn'); // Previous buttons

    // Function to show a slide based on the index
    function showSlide(index) {
        forms.forEach((form, i) => {
            form.classList.toggle('active', i === index); // Show only the active form
        });
    }

    // Next button functionality
    nextButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (currentIndex < forms.length - 1) {
                currentIndex++; // Increment slide index
                showSlide(currentIndex); // Show the next slide
            }
        });
    });

    // Previous button functionality
    prevButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--; // Decrement slide index
                showSlide(currentIndex); // Show the previous slide
            }
        });
    });

    // Initialize the first slide
    showSlide(currentIndex);
});
