document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll('.form-slide');
    let currentIndex = 0;

    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.prev-btn');

    const emailInput = document.getElementById("email");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const webInput = document.getElementById("web");
    const socialInput = document.getElementById("social");
    const gymNameInput = document.getElementById("gym_name");
    const ownerContactInput = document.getElementById("owner_contact");
    const gymContactInput = document.getElementById("gym_contact");
    const startYearInput = document.getElementById("start_year");
    const experienceInput = document.getElementById("experience");
    const locationInput = document.getElementById("location");
    const ageInput = document.getElementById("age");
    const genderInput = document.getElementById("gender");
    const emailFeedback = document.getElementById("emailFeedback");
    const usernameFeedback = document.getElementById("usernameFeedback");
    const webFeedback = document.getElementById("webFeedback");
    const socialFeedback = document.getElementById("socialFeedback");
    const gymNameFeedback = document.getElementById("gymNameFeedback");
    const ownerContactFeedback = document.getElementById("ownerContactFeedback");
    const gymContactFeedback = document.getElementById("gymContactFeedback");
    const startYearFeedback = document.getElementById("startYearFeedback");
    const experienceFeedback = document.getElementById("experienceFeedback");
    const locationFeedback = document.getElementById("locationFeedback");
    const ageFeedback = document.getElementById("ageFeedback");
    const genderFeedback = document.getElementById("genderFeedback");

    let isEmailValid = false;
    let isUsernameValid = false;
    let isPasswordValid = false;
    let isWebValid = false;
    let isSocialValid = false;
    let isGymNameValid = false;
    let isOwnerContactValid = false;
    let isGymContactValid = false;
    let isStartYearValid = false;
    let isExperienceValid = false;
    let isLocationValid = false;
    let isAgeValid = false;
    let isGenderValid = false;

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

    function validateURL(url) {
        const urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
        return urlPattern.test(url);
    }

    function validateGymName(gymName) {
        return gymName.trim().length > 0;
    }

    function validateContact(contact) {
        const contactPattern = /^\+94[0-9]{9}$/;
        return contactPattern.test(contact);
    }

    function validateStartYear(startYear) {
        const date = new Date(startYear);
        const today = new Date();
        return !isNaN(date) && date <= today;
    }

    function validateExperience(experience) {
        const expNum = parseInt(experience, 10);
        return !isNaN(expNum) && expNum >= 0;
    }

    function validateLocation(location) {
        return location.trim().length > 0;
    }

    function validateAge(age) {
        const ageNum = parseInt(age, 10);
        return !isNaN(ageNum) && ageNum >= 0 && ageNum <= 100;
    }

    function validateGender(gender) {
        return gender !== "" && ["male", "female", "prefer not to say"].includes(gender);
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
            if (!response.ok) {
                console.error(`checkContactAvailability failed with status: ${response.status}`, response.statusText);
                throw new Error(`HTTP error: ${response.status}`);
            }
            const data = await response.json();
            console.log('checkContactAvailability response:', { contact, data });
            return typeof data === 'boolean' ? data : false;
        } catch (error) {
            console.error('Error checking contact:', error);
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
            if (isWebValid && isSocialValid) {
                nextButton.classList.remove('invalid');
                nextButton.disabled = false;
            } else {
                nextButton.classList.add('invalid');
                nextButton.disabled = true;
            }
        } else if (slideIndex === 3) {
            if (isGymNameValid && isOwnerContactValid && isGymContactValid && isStartYearValid && isExperienceValid && isLocationValid && isAgeValid && isGenderValid) {
                nextButton.classList.remove('invalid');
                nextButton.disabled = false;
            } else {
                nextButton.classList.add('invalid');
                nextButton.disabled = true;
            }
        } else {
            // Slide 1 (gym logo) always allows "Next"
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

    webInput.addEventListener('input', () => {
        const web = webInput.value.trim();
        webFeedback.textContent = '';

        if (!validateURL(web)) {
            webFeedback.textContent = 'Please enter a valid URL (e.g., https://example.com).';
            webFeedback.className = 'feedback error';
            isWebValid = false;
        } else {
            webFeedback.textContent = 'Website link is valid!';
            webFeedback.className = 'feedback success';
            isWebValid = true;
        }
        console.log('Web check:', { web, isWebValid });
        updateNextButton(2);
    });

    socialInput.addEventListener('input', () => {
        const social = socialInput.value.trim();
        socialFeedback.textContent = '';

        if (!validateURL(social)) {
            socialFeedback.textContent = 'Please enter a valid URL (e.g., https://facebook.com/gym).';
            socialFeedback.className = 'feedback error';
            isSocialValid = false;
        } else {
            socialFeedback.textContent = 'Social link is valid!';
            socialFeedback.className = 'feedback success';
            isSocialValid = true;
        }
        console.log('Social check:', { social, isSocialValid });
        updateNextButton(2);
    });

    gymNameInput.addEventListener('input', () => {
        const gymName = gymNameInput.value.trim();
        gymNameFeedback.textContent = '';

        if (!validateGymName(gymName)) {
            gymNameFeedback.textContent = 'Gym name cannot be empty.';
            gymNameFeedback.className = 'feedback error';
            isGymNameValid = false;
        } else {
            gymNameFeedback.textContent = 'Gym name is valid!';
            gymNameFeedback.className = 'feedback success';
            isGymNameValid = true;
        }
        console.log('Gym name check:', { gymName, isGymNameValid });
        updateNextButton(3);
    });

    ownerContactInput.addEventListener('input', async () => {
        const ownerContact = ownerContactInput.value.trim();
        const gymContact = gymContactInput.value.trim();
        ownerContactFeedback.textContent = '';

        if (!validateContact(ownerContact)) {
            ownerContactFeedback.textContent = 'Phone number must be 10 digits starting with +94 (e.g., +94712345678).';
            ownerContactFeedback.className = 'feedback error';
            isOwnerContactValid = false;
        } else if (gymContact && ownerContact === gymContact) {
            ownerContactFeedback.textContent = 'Your phone and gym phone cannot be the same.';
            ownerContactFeedback.className = 'feedback error';
            isOwnerContactValid = false;
            isGymContactValid = false;
            gymContactFeedback.textContent = 'Your phone and gym phone cannot be the same.';
            gymContactFeedback.className = 'feedback error';
        } else {
            const isAvailable = await checkContactAvailability(ownerContact);
            console.log('Owner contact check:', { ownerContact, isAvailable, isOwnerContactValid });
            if (isAvailable) {
                ownerContactFeedback.textContent = 'Phone number is available!';
                ownerContactFeedback.className = 'feedback success';
                isOwnerContactValid = true;
            } else {
                ownerContactFeedback.textContent = 'Phone number is already taken.';
                ownerContactFeedback.className = 'feedback error';
                isOwnerContactValid = false;
            }
        }
        updateNextButton(3);
    });

    gymContactInput.addEventListener('input', async () => {
        const gymContact = gymContactInput.value.trim();
        const ownerContact = ownerContactInput.value.trim();
        gymContactFeedback.textContent = '';

        if (!validateContact(gymContact)) {
            gymContactFeedback.textContent = 'Phone number must be 10 digits starting with +94 (e.g., +94712345678).';
            gymContactFeedback.className = 'feedback error';
            isGymContactValid = false;
        } else if (ownerContact && gymContact === ownerContact) {
            gymContactFeedback.textContent = 'Gym phone and your phone cannot be the same.';
            gymContactFeedback.className = 'feedback error';
            isGymContactValid = false;
            isOwnerContactValid = false;
            ownerContactFeedback.textContent = 'Gym phone and your phone cannot be the same.';
            ownerContactFeedback.className = 'feedback error';
        } else {
            const isAvailable = await checkContactAvailability(gymContact);
            console.log('Gym contact check:', { gymContact, isAvailable, isGymContactValid });
            if (isAvailable) {
                gymContactFeedback.textContent = 'Phone number is available!';
                gymContactFeedback.className = 'feedback success';
                isGymContactValid = true;
            } else {
                gymContactFeedback.textContent = 'Phone number is already taken.';
                gymContactFeedback.className = 'feedback error';
                isGymContactValid = false;
            }
        }
        updateNextButton(3);
    });

    ownerContactInput.addEventListener('keypress', (event) => {
        const allowedChars = ['+', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        if (!allowedChars.includes(event.key)) {
            event.preventDefault();
        }
    });

    gymContactInput.addEventListener('keypress', (event) => {
        const allowedChars = ['+', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        if (!allowedChars.includes(event.key)) {
            event.preventDefault();
        }
    });

    startYearInput.addEventListener('input', () => {
        const startYear = startYearInput.value;
        startYearFeedback.textContent = '';

        if (!validateStartYear(startYear)) {
            startYearFeedback.textContent = 'Please select a valid date not in the future.';
            startYearFeedback.className = 'feedback error';
            isStartYearValid = false;
        } else {
            startYearFeedback.textContent = 'Start year is valid!';
            startYearFeedback.className = 'feedback success';
            isStartYearValid = true;
        }
        console.log('Start year check:', { startYear, isStartYearValid });
        updateNextButton(3);
    });

    experienceInput.addEventListener('input', () => {
        const experience = experienceInput.value.trim();
        experienceFeedback.textContent = '';

        if (!validateExperience(experience)) {
            experienceFeedback.textContent = 'Experience must be a non-negative number.';
            experienceFeedback.className = 'feedback error';
            isExperienceValid = false;
        } else {
            experienceFeedback.textContent = 'Experience is valid!';
            experienceFeedback.className = 'feedback success';
            isExperienceValid = true;
        }
        console.log('Experience check:', { experience, isExperienceValid });
        updateNextButton(3);
    });

    locationInput.addEventListener('input', () => {
        const location = locationInput.value.trim();
        locationFeedback.textContent = '';

        if (!validateLocation(location)) {
            locationFeedback.textContent = 'Address cannot be empty.';
            locationFeedback.className = 'feedback error';
            isLocationValid = false;
        } else {
            locationFeedback.textContent = 'Address is valid!';
            locationFeedback.className = 'feedback success';
            isLocationValid = true;
        }
        console.log('Location check:', { location, isLocationValid });
        updateNextButton(3);
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
        updateNextButton(3);
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
        updateNextButton(3);
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
        const web = webInput.value.trim();
        const social = socialInput.value.trim();

        if (!validateURL(web)) {
            alert("Please enter a valid website URL (e.g., https://example.com).");
            return false;
        }

        if (!isWebValid) {
            alert("Please enter a valid website URL.");
            return false;
        }

        if (!validateURL(social)) {
            alert("Please enter a valid social URL (e.g., https://facebook.com/gym).");
            return false;
        }

        if (!isSocialValid) {
            alert("Please enter a valid social URL.");
            return false;
        }

        return true;
    }

    function validateStep4() {
        const gymName = gymNameInput.value.trim();
        const ownerContact = ownerContactInput.value.trim();
        const gymContact = gymContactInput.value.trim();
        const startYear = startYearInput.value;
        const experience = experienceInput.value.trim();
        const location = locationInput.value.trim();
        const age = ageInput.value.trim();
        const gender = genderInput.value;

        if (!validateGymName(gymName)) {
            alert("Gym name cannot be empty.");
            return false;
        }

        if (!isGymNameValid) {
            alert("Please enter a valid gym name.");
            return false;
        }

        if (!validateContact(ownerContact)) {
            alert("Your phone number must be 10 digits starting with +94 (e.g., +94712345678).");
            return false;
        }

        if (!isOwnerContactValid) {
            alert("Please choose an available phone number for yourself.");
            return false;
        }

        if (!validateContact(gymContact)) {
            alert("Gym phone number must be 10 digits starting with +94 (e.g., +94712345678).");
            return false;
        }

        if (!isGymContactValid) {
            alert("Please choose an available phone number for the gym.");
            return false;
        }

        if (ownerContact === gymContact) {
            alert("Your phone and gym phone cannot be the same.");
            return false;
        }

        if (!validateStartYear(startYear)) {
            alert("Please select a valid start year not in the future.");
            return false;
        }

        if (!isStartYearValid) {
            alert("Please select a valid start year.");
            return false;
        }

        if (!validateExperience(experience)) {
            alert("Experience must be a non-negative number.");
            return false;
        }

        if (!isExperienceValid) {
            alert("Please enter a valid experience value.");
            return false;
        }

        if (!validateLocation(location)) {
            alert("Address cannot be empty.");
            return false;
        }

        if (!isLocationValid) {
            alert("Please enter a valid address.");
            return false;
        }

        if (!validateAge(age)) {
            alert("Age must be between 0 and 100.");
            return false;
        }

        if (!isAgeValid) {
            alert("Please enter a valid age.");
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
            } else if (index === 3) {
                if (!validateStep4()) {
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

    // Trigger initial validation for gender to show feedback
    genderInput.dispatchEvent(new Event('change'));

    // Ensure "Next" button for non-validated slide is enabled on load
    updateNextButton(1); // Slide 2 (gym logo)

    showSlide(currentIndex);
});