<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="./css/login.css"> -->

    <title>Signup</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup/signup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup/login_slide.css">
    
</head>
<body>
    <form id="signupForm" action="signup.php" method="POST" enctype="multipart/form-data">
        <!-- Member Type -->
        <div class="signup-container">
            <h1>SIGN UP</h1><br>
            <h2>Who are you?</h2>
            <div class="member-choices">
                <!-- User Choice -->
                <div class="member-choice">
                    <input type="radio" name="memberType" id="user" value="user" hidden>
                    <label for="user" onclick="window.location.href='<?=ROOT ?>/signup/user'" class="choice-label">
                        <img src="<?= ROOT ?>/assets/images/signup/user.png" alt="User" class="choice-image">
                        <span class="choice-text">User</span>
                    </label>
                </div>
    
                <!-- Owner Choice -->
                <div class="member-choice">
                    <input type="radio" name="memberType" id="owner" value="owner" hidden>
                    <label for="owner" onclick="window.location.href='<?= ROOT ?>/signup/owner'"  class="choice-label">
                        <img src="<?= ROOT ?>/assets/images/signup/owner.png" alt="Gym Owner" class="choice-image">
                        <span class="choice-text">Owner</span>
                    </label>
                </div>
            </div>
        </div>
    </form>

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
    
</body>
</html>