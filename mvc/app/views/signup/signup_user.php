<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup/login_slide.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup/signup.css">
    
</head>



<body>
    <div class="signup-container">
        <form id="signupForm" action="<?= ROOT ?>/signup/addUser" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="type" id="type" value="user" >
            <input type="hidden" name="access" id="access" value="normal" >
           
            <!-- Slide 1: Basic Info -->
            
            <div class="form-slide ">
                <p style="color: dimgray;">Sign Up as a Gym Member</p>
                <h2>Step 1: Basic Information</h2>

                <label for="name">Name:</label>
                <input type="text" name="name" id="name" >

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" >
                
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" >
                
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" >
                
                <button type="button" class="next-btn">Next</button>
            </div>
          
            <!-- Slide 2: Upload Photos -->
            
            <div class="form-slide">
                <h2>Step 2: Profile Photo</h2>
                <label for="profilePic"> Upload * </label>
                <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png">
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="button" class="next-btn">Next</button>
                </div>
            </div>


            <!-- Slide 3: Other User Info -->
            
            <div class="form-slide ">
                <h2>Step 3: Other Information</h2>

                <label for="age">Age:</label>
                <input type="tel" name="age" id="age" required>

                <label for="contact">Phone:</label>
                <input type="tel" name="contact" id="contact" required>
                
                <label for="location">Address:</label>
                <input type="text" name="location" id="location" required>
                
                <label for="health">Any health concerns *:</label>
                <input type="text" name="health" id="health" >

                
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer Not to Say</option>
                </select>

              
                <label for="activeMode">Active Mode:</label>
                <select name="activeMode" id="activeMode" required>
                    <option value="" disabled selected>Select your active mode</option>
                    <option value="full">Full Time </option>
                    <option value="part">Part Time</option>
                    <option value="temporary">Temporary</option>
                    <option value="not sure">Not sure</option>
                </select>
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="button" class="next-btn">Next</button>
                </div>
            </div>

            <!-- Slide 4: Choose Goal -->

            <div class="form-slide">
                <h2>Step 4: Choose Your Goal</h2>
                
                <div class="goal-choices">
                    <div class="goal-choice">
                        <input type="radio" id="physic" name="goalChoice" value="Physic" required>
                        <label for="physic">
                            <img src="<?= ROOT ?>/assets/images/signup/physics.jpg" alt="Physic" class="choice-image">
                            <span>Physic</span>
                        </label>
                    </div>
                    
                    <div class="goal-choice">
                        <input type="radio" id="strength" name="goalChoice" value="Strength">
                        <label for="strength">
                            <img src="<?= ROOT ?>/assets/images/signup/strength.jpg" alt="Strength" class="choice-image">
                            <span>Strength</span>
                        </label>
                    </div>
                    
                    <div class="goal-choice">
                        <input type="radio" id="endurance" name="goalChoice" value="Endurance">
                        <label for="endurance">
                            <img src="<?= ROOT ?>/assets/images/signup/endurance.jpg" alt="Endurance" class="choice-image">
                            <span>Endurance</span>
                        </label>
                    </div>
                </div>
            
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="button" class="next-btn">Next</button>
                </div>
            </div>
                    
            <!-- Slide 5: Main Concern -->

            <div class="form-slide">
                <h2>Step 5: Long-term Achievement</h2>
                
                <div class="achieve-choices" style="flex-direction: row;">
                    <div class="achieve-choice">
                        <input type="radio" id="lose-weight" name="achieveChoice" value="Lose Weight" required>
                        <label for="lose-weight">
                            <img src="<?= ROOT ?>/assets/images/signup/looseWeight.png" alt="Lose Weight" class="choice-image">
                            <span>Lose Weight</span>
                        </label>
                    </div>
                    <div class="achieve-choice">
                        <input type="radio" id="build-muscle" name="achieveChoice" value="Build Muscle">
                        <label for="build-muscle">
                            <img src="<?= ROOT ?>/assets/images/signup/buildMuscle.png" alt="Build Muscle" class="choice-image">
                            <span>Build Muscle</span>
                        </label>
                    </div>
                </div>
            
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
    <script src="<?= ROOT ?>/assets/js/signup/signup.js"></script>

</body>
</html>