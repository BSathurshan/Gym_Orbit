<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Page</title>
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
                  
            <a href="join.html" class="join-btn">Join Us</a>  
        </div>

        <!-- Main content section -->
        <section class="services">
            <h1>Our Services</h1>
            <p>At Gym Orbit, we offer a range of fitness services designed to help you reach your goals. Whether you are looking for personal training, group classes, or specialized programs, we have something for everyone.</p>
            
            <div class="service">
                <img src="<?= ROOT ?>/assets/images/home/personal-training.jpg" alt="Personal Training">
                <h2>Personal Training</h2>
                <p>Our certified personal trainers will work with you one-on-one to create a customized workout plan tailored to your fitness goals and needs.</p>
            </div>

            <div class="service">
                <img src="<?= ROOT ?>/assets/images/home/group-classes.jpg" alt="Group Classes">
                <h2>Group Classes</h2>
                <p>Join our group fitness classes for a fun and motivating workout experience. From yoga to high-intensity interval training, we have a variety of classes to choose from.</p>
            </div>

            <div class="service">
                <img src="<?= ROOT ?>/assets/images/home/nutrition-counseling.jpg" alt="Nutrition Counseling">
                <h2>Nutrition Counseling</h2>
                <p>Get expert advice on nutrition and healthy eating habits. Our nutritionists will help you develop a meal plan that complements your fitness regimen.</p>
            </div>

            <div class="service">
                <img src="<?= ROOT ?>/assets/images/home/spa-services.jpg" alt="Spa Services">
                <h2>Spa Services</h2>
                <p>Relax and recover with our spa services, including massages and wellness treatments. Perfect for post-workout relaxation and stress relief.</p>
            </div>
        </section>
    </div>
     <!-- Footer section with email address -->

</body>
</html>