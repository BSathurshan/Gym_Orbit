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
        <form id="signupForm" action="<?= ROOT ?>/signup/addOwner" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="type" id="type" value="owner" >
            <input type="hidden" name="access" id="access" value="normal" >
           
            <!-- Slide 1: Basic Info -->
            
            <div class="form-slide active">
                <p style="color: dimgray;">Sign Up as a Gym Owner</p>
                <h2>Step 1: Basic Information</h2>

                <label for="name">Name:</label>
                <input type="text" name="owner_name" id="name" >

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" >
                
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" >
                
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" >
                
                <button type="button" class="next-btn">Next</button>
            </div>
            
            <!-- Slide 2: Upload Photos (Owner)-->
            
            <div class="form-slide">
                <h2>Step 2:</h2>
                
                <h2>Gym Logo</h2>
                <label for="profilePic"> Upload * </label>
                <input type="file" name="file" id="file" accept=".jpg,.jpeg,.png">
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="button" class="next-btn">Next</button>
                </div>
            </div>

            <!-- Slide 3: Links (Owner)-->
            <div class="form-slide">
                <h2>Step 3: Website link *</h2>
                <input type="url" name="web" id="name" >


                <h2>Social links *</h2>
                <input type="url" name="social" id="name" >
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="button" class="next-btn">Next</button>
                </div>
            </div>
            
            <!-- Slide 4: Other User Info (Owner)-->
            <div class="form-slide ">
                <h2>Step 4: Other Information</h2>

                <label for="owner_contact">Gym Name :</label>
                <input type="text" name="gym_name" id="owner_contact" required>

                <label for="owner_contact">Gym Phone :</label>
                <input type="number" name="owner_contact" id="owner_contact" required>

                <label for="gym_contact">Your Phone *:</label>
                <input type="number" name="gym_contact" id="gym_contact" >

                
                <label for="start_year">Start year :</label>
                <input type="date" name="start_year" id="start_year" required>

                <label for="age">Experience (Years):</label>
                <input type="text" name="experience"  required>

                <label for="location"> Address:</label>
                <input type="text" name="location" id="location" required>

                <label for="age">Age:</label>
                <input type="text" name="age" id="age" required>

                
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer Not to Say</option>
                </select>

                
                <div class="button-grp">
                    <button type="button" class="prev-btn">Back</button>
                    <button type="submit" class="next-btn">Submit</button>
                </div>
            </div>
            

         <!-- <button type="submit">Submit</button>  -->
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