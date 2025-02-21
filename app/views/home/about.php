<?php 
    if (!defined('PATH')) {
        define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/public/assets/partials/');
    }
    include_once PATH . 'header.php';
    include_once PATH . 'navigation.php';
    
?>

        <!-- Main content section -->
    <section class="about-us">
        <h1>About Us</h1>
        <p>Welcome to Gym Orbit! We are dedicated to providing the best fitness solutions for our community. Our mission is to help you achieve your fitness goals through personalized training and exceptional support.</p>
        <h2>Meet Our Team</h2>
        <div class="team">
            
            <div class="team-member">
                <img src="<?= ROOT ?>/assets/images/home/member.png" alt="Team Member 1">
                <h3>Saneesha Tharindi</h3>
                <p>Designer and developer</p>
            </div>
            <div class="team-member">
                <img src="<?= ROOT ?>/assets/images/home/member.png" alt="Team Member 2">
                <h3>Sathurshan</h3>
                <p>Designer and developer</p>
            </div>
            <div class="team-member">
                <img src="<?= ROOT ?>/assets/images/home/member.png" alt="Team Member 3">
                <h3>Teshini 123</h3>
                <p>Designer and developer</p>
            </div>
            <div class="team-member">
                <img src="<?= ROOT ?>/assets/images/home/member.png" alt="Team Member 4">
                <h3>Mathulan</h3>
                <p>Designer and developer</p>
            </div>
        </div>

        <div class="history">
            <h2>Our History</h2>
            
            <p>Founded in 2024, Gym Orbit has been a leader in fitness and wellness. Our state-of-the-art facilities and dedicated trainers have helped thousands of individuals transform their lives.</p>
        </div>
    </section>

    <?php include_once PATH . 'footer.php'; ?> 
    