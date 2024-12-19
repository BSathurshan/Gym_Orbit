<?php 
    if (!defined('PATH')) {
        define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/public/assets/partials/');
    }
    include_once PATH . 'header.php';
    include_once PATH . 'navigation.php';
    
?>

<!-- Hero Section -->
<section class="hero">

    <img src="<?= ROOT ?>/assets/images/home/GymOrbitLogo.png" alt="Gym Orbit Logo">
    <h1>WHERE <span>WINNING</span><br>IS THE ONLY OPTION</h1>
   <!-- <a href="/our-mission" class="mission-btn">OUR MISSION</a> -->
</section>



<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-content">
        <h2><i class="fas fa-trophy"></i> OUR MISSION IS TO WIN, AND ONLY WIN.</h2>
        <p>THAT'S WHAT WE DO.</p>
        <div class="stats">
            <div class="stat">
                <i class="fas fa-award"></i>
                <span class="stat-number">20+</span>
                <p>GYM REGISTARTIONS</p>
            </div>
            <div class="stat">
                <i class="fas fa-clock"></i>
                <span class="stat-number">24/7</span>
                <p>ACCESS</p>
            </div>
        </div>
    </div>
    <div class="stats-image" style="background-image: url('<?= ROOT ?>/assets/images/home/stats-bg.jpg')"></div>
</section>



<!-- Merchandise Section -->

<section style="text-align: center; padding: 20px;">
    <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 15px;">Follow Us On Social Media</h2>
    <div style="display: flex; justify-content: center; gap: 20px;">
        <a href="https://facebook.com/yourprofile" target="_blank">
            <img src="<?= ROOT ?>/assets/images/home/facebook-icon.png" alt="Facebook" style="width: 40px; height: 40px;">
        </a>
        <a href="https://instagram.com/yourprofile" target="_blank">
            <img src="<?= ROOT ?>/assets/images/home/instagram-icon.png" alt="Instagram" style="width: 40px; height: 40px;">
        </a>
        <a href="https://twitter.com/yourprofile" target="_blank">
            <img src="<?= ROOT ?>/assets/images/home/twitter-icon.png" alt="Twitter" style="width: 40px; height: 40px;">
        </a>
    </div>
</section>



<!-- Testimonials Section -->
<section class="testimonials">
    <h2 style="text-align: center; padding: 20px;">WHAT OUR USERS SAY</h2>
    <div class="testimonials-grid">
        <div class="testimonial-card animate-fade-up">
            <p>"The best Gym Management System,with excellent features and good staff!"</p>
            <h4>Gym Members</h4>
        </div>
        <div class="testimonial-card animate-fade-up">
            <p>"Incredible community and top-notch services. This made my work fast and efficient."</p>
            <h4>Gym Owners</h4>
        </div>
        <div class="testimonial-card animate-fade-up">
            <p>"Very easy too work with clients through this website."</p>
            <h4>Gym Instructers</h4>
        </div>
    </div>
</section>





<?php include_once PATH . 'navigation.php'; ?> 