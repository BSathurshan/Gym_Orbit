<?php 
    if (!defined('PATH')) {
        define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/public/assets/partials/');
    }
    include_once PATH . 'header.php';
    include_once PATH . 'navigation.php';
    
?>


        <!-- Main content section -->
        <section class="services">
            <h1>Our Services</h1>
            <p>At Gym Orbit, we offer a range of fitness services designed to help you reach your goals. Whether you are looking for personal training, group classes, or specialized programs, we have something for everyone.</p>
            <div class="services-item">
                <img class="service-image" src="<?= ROOT ?>/assets/images/home/ourServices.jpg" alt="our Services">
                <div class="service">
                    <h3><ul type="circle">
                        <li>Provide Personal Training</li>
                        <li>Customized Meal Plans</li>
                        <li>Customized Workout Plans</li>
                        <li>Progress Trcking</li>
                        <li>Reminders</li>
                        <li>Gym Updates</li>
                        <li>Online Payment Facility</li>
                    </ul></h3>
                </div>   
            </div>
        </section>

        <?php include_once PATH . 'footer.php'; ?> 
    