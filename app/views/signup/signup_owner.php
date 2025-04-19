<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup/login_slide.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup/signup.css">
    <style>
        .feedback {
            font-size: 0.9em;
            margin-top: 5px;
            display: block;
        }
        .feedback.error {
            color: red;
        }
        .feedback.success {
            color: green;
        }
        .next-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .next-btn.invalid {
            background-color: red;
            cursor: not-allowed;
        }
        .prev-btn {
            background-color: #ccc;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button-grp {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <form id="signupForm" action="<?= ROOT ?>/signup/addOwner" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" id="type" value="owner">
            <input type="hidden" name="access" id="access" value="normal">
           
            <!-- Slide 1: Basic Info -->
            <div class="form-slide active">
                <p style="color: dimgray;">Sign Up as a Gym Owner</p>
                <h2>Step 1: Basic Information</h2>
                <label for="owner_name">Name:</label>
                <input type="text" name="owner_name" id="owner_name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <span id="emailFeedback" class="feedback"></span>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <span id="usernameFeedback" class="feedback"></span>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <button type="button" class="next-btn">Next</button>
            </div>
            
            <!-- Slide 2: Upload Photos (Owner) -->
            <div class="form-slide">
                <h2>Step 2: Gym Logo (Optional)</h2>
                <label for="file">Upload (Optional):</label>
                <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png">
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="button" class="next-btn">Next</button>
                </div>
            </div>

            <!-- Slide 3: Links (Owner) -->
            <div class="form-slide">
                <h2>Step 3: Links</h2>
                <label for="web">Website Link:</label>
                <input type="url" name="web" id="web" required>
                <span id="webFeedback" class="feedback"></span>
                <label for="social">Social Link:</label>
                <input type="url" name="social" id="social" required>
                <span id="socialFeedback" class="feedback"></span>
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="button" class="next-btn">Next</button>
                </div>
            </div>
            
            <!-- Slide 4: Other User Info (Owner) -->
            <div class="form-slide">
                <h2>Step 4: Other Information</h2>
                <label for="gym_name">Gym Name:</label>
                <input type="text" name="gym_name" id="gym_name" required>
                <span id="gymNameFeedback" class="feedback"></span>
                <label for="owner_contact">Your Phone:</label>
                <input type="tel" name="owner_contact" id="owner_contact" pattern="\+94[0-9]{9}" placeholder="+94712345678" required>
                <span id="ownerContactFeedback" class="feedback"></span>
                <label for="gym_contact">Gym Phone:</label>
                <input type="tel" name="gym_contact" id="gym_contact" pattern="\+94[0-9]{9}" placeholder="+94712345678" required>
                <span id="gymContactFeedback" class="feedback"></span>
                <label for="start_year">Start Year:</label>
                <input type="date" name="start_year" id="start_year" required>
                <span id="startYearFeedback" class="feedback"></span>
                <label for="experience">Experience (Years):</label>
                <input type="number" name="experience" id="experience" min="0" required>
                <span id="experienceFeedback" class="feedback"></span>
                <label for="location">Address:</label>
                <input type="text" name="location" id="location" required>
                <span id="locationFeedback" class="feedback"></span>
                <label for="age">Age:</label>
                <input type="number" name="age" id="age" min="0" max="100" required>
                <span id="ageFeedback" class="feedback"></span>
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer Not to Say</option>
                </select>
                <span id="genderFeedback" class="feedback"></span>
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="submit" class="next-btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div id="image-preload-container">
        <img src="<?= ROOT ?>/assets/images/signup/image1.jpg" alt="preload-image">
        <img src="<?= ROOT ?>/assets/images/signup/image2.jpg" alt="preload-image">
        <img src="<?= ROOT ?>/assets/images/signup/image3.jpg" alt="preload-image">
        <img src="<?= ROOT ?>/assets/images/signup/image4.jpg" alt="preload-image">
        <img src="<?= ROOT ?>/assets/images/signup/image5.jpg" alt="preload-image">
    </div>
    <div id="slideshow-container">
        <div class="slide"></div>
    </div>
    <script src="<?= ROOT ?>/assets/js/signup/script.js"></script>
    <script src="<?= ROOT ?>/assets/js/signup/signup_owner.js"></script>
</body>
</html>