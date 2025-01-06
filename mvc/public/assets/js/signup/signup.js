document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll('.form-slide'); // Get all slides
    let currentIndex = 0; // Start at the first slide

    const nextButtons = document.querySelectorAll('.next-btn'); // Next buttons
    const prevButtons = document.querySelectorAll('.prev-btn'); // Previous buttons

    const emailInput = document.getElementById("email");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");

    // Function to show a slide based on the index
    function showSlide(index) {
        forms.forEach((form, i) => {
            form.classList.toggle('active', i === index); // Show only the active form
        });
    }

    // Email validation
    function validateEmail(email) {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        return emailPattern.test(email);
    }

    // Username validation
    function validateUsername(username) {
        const usernamePattern = /^[a-zA-Z][a-zA-Z0-9]{5,}$/;
        return usernamePattern.test(username);
    }

    // Password validation
    function validatePassword(password) {
        const passwordPattern = /^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z].*[a-zA-Z])[a-zA-Z0-9]{6,}$/;
        return passwordPattern.test(password);
    }

    // Validation for Step 1 (Basic Info)
    function validateStep1() {
        const email = emailInput.value.trim();
        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();

        if (!validateEmail(email)) {
            alert("Please enter a valid email address in the format: name@gmail.com");
            return false;
        }

        if (!validateUsername(username)) {
            alert("Username must be at least 6 characters long and start with a letter.");
            return false;
        }

        if (!validatePassword(password)) {
            alert("Password must be at least 6 characters long and contain at least 4 letters.");
            return false;
        }

        return true;
    }

    // Next button functionality
    nextButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            if (index === 0) { // Validate only on the first slide
                if (!validateStep1()) {
                    return; // Stop if validation fails
                }
            }

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
