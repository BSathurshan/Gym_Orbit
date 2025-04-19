document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll('.form-slide');
    let currentIndex = 0;

    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.prev-btn');

    const emailInput = document.getElementById("email");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const ageInput = document.getElementById("age");
    const contactInput = document.getElementById("contact");
    const genderInput = document.getElementById("gender");
    const activeModeInput = document.getElementById("activeMode");
    const emailFeedback = document.getElementById("emailFeedback");
    const usernameFeedback = document.getElementById("usernameFeedback");
    const ageFeedback = document.getElementById("ageFeedback");
    const contactFeedback = document.getElementById("contactFeedback");
    const genderFeedback = document.getElementById("genderFeedback");
    const activeModeFeedback = document.getElementById("activeModeFeedback");

    let_correction_needed = false;
    let isEmailValid = false;
    let isUsernameValid = false;
    let isPasswordValid = false;
    let isAgeValid = false;
    let isContactValid = false;
    let isGenderValid = false;
    let isActiveModeValid = false;

    // Ensure ROOT is defined
    if (typeof ROOT === 'undefined') {
        console.error('ROOT constant is not defined');
        emailFeedback.textContent = 'Error: Application configuration missing.';
        emailFeedback.className = 'feedback error';
        return;
    }

    function showSlide(index) {
        forms.forEach((form, i) => {
            form.classList.toggle('active', i === index);
        });
    }

    function validateEmail(email) {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
        return emailPattern.test(email);
    }

    function validateUsername(username) {
        const usernamePattern = /^[a-zA-Z][a-zA-Z0-9]{5,}$/;
        return usernamePattern.test(username);
    }

    function validatePassword(password) {
        const passwordPattern = /^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z].*[a-zA-Z])[a-zA-Z0-9]{6,}$/;
        return passwordPattern.test(password);
    }

    function validateAge(age) {
        const ageNum = parseInt(age, 10);
        return !isNaN(ageNum) && ageNum >= 0 && ageNum <= 100;
    }

    function validateContact(contact) {
        const contactPattern = /^\+94[0-9]{9}$/;
        return contactPattern.test(contact);
    }

    function validateGender(gender) {
        return gender !== "" && ["male", "female", "prefer not to say"].includes(gender);
    }

    function validateActiveMode(activeMode) {
        return activeMode !== "" && ["full", "part", "temporary", "not sure"].includes(activeMode);
    }

    async function checkEmailAvailability(email) {
        try {
            console.log('Fetching email availability:', { email, url: `${ROOT}/signup/checkEmail` });
            const response = await fetch(`${ROOT}/signup/checkEmail`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email }),
            });
            console.log('Email fetch response:', { status: response.status, ok: response.ok });
            if (!response.ok) {
                console.error(`checkEmailAvailability failed with status: ${response.status}`, response.statusText);
                throw new Error(`HTTP error: ${response.status}`);
            }
            const data = await response.json();
            console.log('checkEmailAvailability response:', { email, data });
            return typeof data === 'boolean' ? data : false;
        } catch (error) {
            console.error('Error checking email:', error);
            emailFeedback.textContent = 'Error checking email availability.';
            emailFeedback.className = 'feedback error';
            return false;
        }
    }

    async function checkUsernameAvailability(username) {
        try {
            console.log('Fetching username availability:', { username, url: `${ROOT}/signup/checkUsername` });
            const response = await fetch(`${ROOT}/signup/checkUsername`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ username }),
            });
            console.log('Username fetch response:', { status: response.status, ok: response.ok });
            if (!response.ok) {
                console.error(`checkUsernameAvailability failed with status: ${response.status}`, response.statusText);
                throw new Error(`HTTP error: ${response.status}`);
            }
            const data = await response.json();
            console.log('checkUsernameAvailability response:', { username, data });
            return typeof data === 'boolean' ? data : false;
        } catch (error) {
            console.error('Error checking username:', error);
            usernameFeedback.textContent = 'Error checking username availability.';
            usernameFeedback.className = 'feedback error';
            return false;
        }
    }

    async function checkContactAvailability(contact) {
        try {
            console.log('Fetching contact availability:', { contact, url: `${ROOT}/signup/checkContact` });
            const response = await fetch(`${ROOT}/signup/checkContact`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ contact }),
            });
            console.log('Contact fetch response:', { status: response.status, ok: response.ok });
            if (!response.ok) {
                console.error(`checkContactAvailability failed with status: ${response.status}`, response.statusText);
                throw new Error(`HTTP error: ${response.status}`);
            }
            const data = await response.json();
            console.log('checkContactAvailability response:', { contact, data });
            return typeof data === 'boolean' ? data : false;
        } catch (error) {
            console.error('Error checking contact:', error);
            contactFeedback.textContent = 'Error checking phone number availability.';
            contactFeedback.className = 'feedback error';
            return false;
        }
    }

    function updateNextButton(slideIndex) {
        const nextButton = forms[slideIndex].querySelector('.next-btn');
        if (slideIndex === 0) {
            if (isEmailValid && isUsernameValid && isPasswordValid) {
                nextButton.classList.remove('invalid');
                nextButton.disabled = false;
            } else {
                nextButton.classList.add('invalid');
                nextButton.disabled = true;
            }
        } else if (slideIndex === 2) {
            if (isAgeValid && isContactValid && isGenderValid && isActiveModeValid) {
                nextButton.classList.remove('invalid');
                nextButton.disabled = false;
            } else {
                nextButton.classList.add('invalid');
                nextButton.disabled = true;
            }
        } else {
            // Slides 1 (profile photo), 3 (goalChoice), 4 (achieveChoice) always allow "Next"
            nextButton.classList.remove('invalid');
            nextButton.disabled = false;
        }
    }

    emailInput.addEventListener('input', async () => {
        const email = emailInput.value.trim();
        emailFeedback.textContent = '';

        if (!validateEmail(email)) {
            emailFeedback.textContent = 'Please enter a valid Gmail address.';
            emailFeedback.className = 'feedback error';
            isEmailValid = false;
        } else {
            const isAvailable = await checkEmailAvailability(email);
            console.log('Email check:', { email, isAvailable, isEmailValid });
            if (isAvailable) {
                emailFeedback.textContent = 'Email is available!';
                emailFeedback.className = 'feedback success';
                isEmailValid = true;
            } else {
                emailFeedback.textContent = 'Email is already taken.';
                emailFeedback.className = 'feedback error';
                isEmailValid = false;
            }
        }
        updateNextButton(0);
    });

    usernameInput.addEventListener('input', async () => {
        const username = usernameInput.value.trim();
        usernameFeedback.textContent = '';

        if (!validateUsername(username)) {
            usernameFeedback.textContent = 'Username must be at least 6 characters and start with a letter.';
            usernameFeedback.className = 'feedback error';
            isUsernameValid = false;
        } else {
            const isAvailable = await checkUsernameAvailability(username);
            console.log('Username check:', { username, isAvailable, isUsernameValid });
            if (isAvailable) {
                usernameFeedback.textContent = 'Username is available!';
                usernameFeedback.className = 'feedback success';
                isUsernameValid = true;
            } else {
                usernameFeedback.textContent = 'Username is already taken.';
                usernameFeedback.className = 'feedback error';
                isUsernameValid = false;
            }
        }
        updateNextButton(0);
    });

    passwordInput.addEventListener('input', () => {
        const password = passwordInput.value.trim();
        if (!validatePassword(password)) {
            isPasswordValid = false;
        } else {
            isPasswordValid = true;
        }
        updateNextButton(0);
    });

    ageInput.addEventListener('input', () => {
        const age = ageInput.value.trim();
        ageFeedback.textContent = '';

        if (!validateAge(age)) {
            ageFeedback.textContent = 'Age must be between 0 and 100.';
            ageFeedback.className = 'feedback error';
            isAgeValid = false;
        } else {
            ageFeedback.textContent = 'Age is valid!';
            ageFeedback.className = 'feedback success';
            isAgeValid = true;
        }
        console.log('Age check:', { age, isAgeValid });
        updateNextButton(2);
    });

    contactInput.addEventListener('input', async () => {
        const contact = contactInput.value.trim();
        contactFeedback.textContent = '';

        if (!validateContact(contact)) {
            contactFeedback.textContent = 'Phone number must be 10 digits starting with +94 (e.g., +94712345678).';
            contactFeedback.className = 'feedback error';
            isContactValid = false;
        } else {
            const isAvailable = await checkContactAvailability(contact);
            console.log('Contact check:', { contact, isAvailable, isContactValid });
            if (isAvailable) {
                contactFeedback.textContent = 'Phone number is available!';
                contactFeedback.className = 'feedback success';
                isContactValid = true;
            } else {
                contactFeedback.textContent = 'Phone number is already taken.';
                contactFeedback.className = 'feedback error';
                isContactValid = false;
            }
        }
        updateNextButton(2);
    });

    contactInput.addEventListener('keypress', (event) => {
        const allowedChars = ['+', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        if (!allowedChars.includes(event.key)) {
            event.preventDefault();
        }
    });

    genderInput.addEventListener('change', () => {
        const gender = genderInput.value;
        genderFeedback.textContent = '';

        if (!validateGender(gender)) {
            genderFeedback.textContent = 'Please select a gender.';
            genderFeedback.className = 'feedback error';
            isGenderValid = false;
        } else {
            genderFeedback.textContent = 'Gender selected!';
            genderFeedback.className = 'feedback success';
            isGenderValid = true;
        }
        console.log('Gender check:', { gender, isGenderValid });
        updateNextButton(2);
    });

    activeModeInput.addEventListener('change', () => {
        const activeMode = activeModeInput.value;
        activeModeFeedback.textContent = '';

        if (!validateActiveMode(activeMode)) {
            activeModeFeedback.textContent = 'Please select an active mode.';
            activeModeFeedback.className = 'feedback error';
            isActiveModeValid = false;
        } else {
            activeModeFeedback.textContent = 'Active mode selected!';
            activeModeFeedback.className = 'feedback success';
            isActiveModeValid = true;
        }
        console.log('ActiveMode check:', { activeMode, isActiveModeValid });
        updateNextButton(2);
    });

    function validateStep1() {
        const email = emailInput.value.trim();
        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();

        if (!validateEmail(email)) {
            alert("Please enter a valid email address in the format: name@gmail.com");
            return false;
        }

        if (!isEmailValid) {
            alert("Please choose an available email address.");
            return false;
        }

        if (!validateUsername(username)) {
            alert("Username must be at least 6 characters long and start with a letter.");
            return false;
        }

        if (!isUsernameValid) {
            alert("Please choose an available username.");
            return false;
        }

        if (!validatePassword(password)) {
            alert("Password must be at least 6 characters long and contain at least 4 letters.");
            return false;
        }

        return true;
    }

    function validateStep3() {
        const age = ageInput.value.trim();
        const contact = contactInput.value.trim();
        const gender = genderInput.value;
        const activeMode = activeModeInput.value;

        if (!validateAge(age)) {
            alert("Age must be between 0 and 100.");
            return false;
        }

        if (!isAgeValid) {
            alert("Please enter a valid age.");
            return false;
        }

        if (!validateContact(contact)) {
            alert("Phone number must be 10 digits starting with +94 (e.g., +94712345678).");
            return false;
        }

        if (!isContactValid) {
            alert("Please choose an available phone number.");
            return false;
        }

        if (!validateGender(gender)) {
            alert("Please select a gender.");
            return false;
        }

        if (!isGenderValid) {
            alert("Please select a valid gender.");
            return false;
        }

        if (!validateActiveMode(activeMode)) {
            alert("Please select an active mode.");
            return false;
        }

        if (!isActiveModeValid) {
            alert("Please select a valid active mode.");
            return false;
        }

        return true;
    }

    nextButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            if (index === 0) {
                if (!validateStep1()) {
                    return;
                }
            } else if (index === 2) {
                if (!validateStep3()) {
                    return;
                }
            }

            if (currentIndex < forms.length - 1) {
                currentIndex++;
                showSlide(currentIndex);
            }
        });
    });

    prevButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showSlide(currentIndex);
            }
        });
    });

    // Trigger initial validation for gender and activeMode to show feedback
    genderInput.dispatchEvent(new Event('change'));
    activeModeInput.dispatchEvent(new Event('change'));

    // Ensure "Next" buttons for non-validated slides are enabled on load
    updateNextButton(1); // Slide 2 (profile photo)
    updateNextButton(3); // Slide 4 (goalChoice)
    updateNextButton(4); // Slide 5 (achieveChoice)

    showSlide(currentIndex);
});