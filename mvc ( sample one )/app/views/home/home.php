<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home/style.css">
</head>
<body>
    <div class="main">
        <div class = "navbar">
            
            <img src="<?= ROOT ?>/assets/images/home/GymOrbitLogo.png" class="icon">

                <ul class="nav-pages">
                        <li><a href="<?= ROOT ?>/home/index">Home</a></li>
                        <li><a href="<?= ROOT ?>/home/features">Features</a></li>
                        <li><a href="<?= ROOT ?>/home/services">Services</a></li>
                        <li><a href="<?= ROOT ?>/home/about">About Us</a></li>
                        <li><a href="<?= ROOT ?>/home/support">Support</a></li>
                    </ul>
               
             <a href="<?= ROOT ?>/login" class="join-btn">Login</a>         
            <a href="../signup/signup.html" class="join-btn">Join Us</a>  
        </div>

            <!-- Social media icons -->
            <div class="social-media">
                <a href="https://facebook.com/yourprofile" target="_blank">
                    <img src="<?= ROOT ?>/assets/images/home/facebook-icon.png" alt="Facebook">
                </a>
                <a href="https://instagram.com/yourprofile" target="_blank">
                    <img src="<?= ROOT ?>/assets/images/home/instagram-icon.png" alt="Instagram">
                </a>
                <a href="https://twitter.com/yourprofile" target="_blank">
                    <img src="<?= ROOT ?>/assets/images/home/twitter-icon.png" alt="Twitter">
                </a>
            </div>

             <!-- Main content section -->
        <section class="hero">
            <h1>Welcome to Gym Orbit!</h1>
            <p>Your ultimate destination for fitness and well-being.</p>
            <img src="<?= ROOT ?>/assets/images/home/GymOrbitLogo 3.png" alt="Fitness Training" class="hero-image">
        </section>

    </div>
    <!-- Footer section with email address -->

    
</body>
</html>
