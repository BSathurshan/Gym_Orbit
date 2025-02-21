<?php 
    if (!defined('PATH')) {
        define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/public/assets/partials/');
    }
    include_once PATH . 'header.php';
    include_once PATH . 'navigation.php';
    
?>


<section class="features">
    <h1>Our Features</h1>
    <p>Discover the unique features that make our gym stand out. We offer a variety of amenities and services to enhance your fitness journey.</p>
    
    <div class="feature-item">
        <img src="<?= ROOT ?>/assets/images/home/24_7Access.jpg" alt="24/7 Access" class="feature-image">
        <div class="feature-text">
            <h2>24/7 Access</h2>
            <p>Enjoy the flexibility of working out at any time that suits you. Our gym is open 24/7 for all members.</p>
        </div>
    </div>

    

    <div class="feature-item">
        <img src="<?= ROOT ?>/assets/images/home/personalTraining.png" alt="Personal Training" class="feature-image">
        <div class="feature-text">
            <h2>Personal Training</h2>
            <p>Get personalized fitness guidance from our certified trainers. Whether you’re looking to lose weight or build muscle, we’ve got you covered.</p>
        </div>
    </div>

    <div class="feature-item">
        <img src="<?= ROOT ?>/assets/images/home/trackProgress.jpg" alt="Track Progress" class="feature-image">
        <div class="feature-text">
            <h2>Track Progress</h2>
            <p>Track your progress with our progress tracking tools. Our tools are 80% accurate and trustable.</p>
        </div>
    </div>

</section>
        
<?php include_once PATH . 'footer.php'; ?> 