<?php 
if (!defined('PATH')) {
    define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/public/assets/partials/');
}
include_once PATH . 'header.php';
include_once PATH . 'navigation.php';
?>


<!-- HOME SECTION -->
<section id="home" class="hero">
    <img src="<?= ROOT ?>/assets/images/home/GymOrbitLogo.png" alt="Gym Orbit Logo">
    <h1>WHERE <span>WINNING</span><br>IS THE ONLY OPTION</h1>
</section>

<section class="stats-section">
    <div class="stats-content">
        <h2><i class="fas fa-trophy"></i> OUR MISSION IS TO WIN, AND ONLY WIN.</h2>
        <p>THAT'S WHAT WE DO.</p>
        <div class="stats">
            <div class="stat">
                <i class="fas fa-award"></i>
                <span class="stat-number">20+</span>
                <p>GYM REGISTRATIONS</p>
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

<section class="testimonials">
    <h2 style="text-align: center; padding: 20px;">WHAT OUR USERS SAY</h2>
    <div class="testimonials-grid">
        <div class="testimonial-card animate-fade-up">
            <p>"The best Gym Management System, with excellent features and good staff!"</p>
            <h4>Gym Members</h4>
        </div>
        <div class="testimonial-card animate-fade-up">
            <p>"Incredible community and top-notch services. This made my work fast and efficient."</p>
            <h4>Gym Owners</h4>
        </div>
        <div class="testimonial-card animate-fade-up">
            <p>"Very easy to work with clients through this website."</p>
            <h4>Gym Instructors</h4>
        </div>
    </div>
</section>

<!-- FEATURES SECTION -->
<section id="features" class="features">
    <h1>Our Features</h1>
    <p>Discover the unique features that make our gym stand out. We offer a variety of amenities and services to enhance your fitness journey.</p>

    <div class="feature-item">
        <img src="<?= ROOT ?>/assets/images/home/24_7Access.png" alt="24/7 Access" class="feature-image">
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
        <img src="<?= ROOT ?>/assets/images/home/trackProgress.png" alt="Track Progress" class="feature-image">
        <div class="feature-text">
            <h2>Track Progress</h2>
            <p>Track your progress with our progress tracking tools. Our tools are 80% accurate and trustable.</p>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section id="services" class="services">
    <h1>Our Services</h1>
    <p>At Gym Orbit, we offer a range of fitness services designed to help you reach your goals. Whether you are looking for personal training, group classes, or specialized programs, we have something for everyone.</p>

    <div class="services-item">
        <img class="service-image" src="<?= ROOT ?>/assets/images/home/ourServices.jpg" alt="our Services">
        <div class="service">
            <ul type="circle">
                <li>Provide Personal Training</li>
                <li>Customized Meal Plans</li>
                <li>Customized Workout Plans</li>
                <li>Progress Tracking</li>
                <li>Reminders</li>
                <li>Gym Updates</li>
                <li>Online Payment Facility</li>
            </ul>
        </div>
    </div>
</section>

<!-- ABOUT US SECTION -->
<section id="about" class="about-us">
    <h1>About Us</h1>
    <p>Welcome to Gym Orbit! We are dedicated to providing the best fitness solutions for our community. Our mission is to help you achieve your fitness goals through personalized training and exceptional support.</p>

    <h2>Meet Our Team</h2>
    <div class="team">
        <div class="team-member">
            <img src="<?= ROOT ?>/assets/images/home/member.png" alt="Team Member 1">
            <h3>Saneesha</h3>
            <p>Designer and developer</p>
        </div>
        <div class="team-member">
            <img src="<?= ROOT ?>/assets/images/home/member.png" alt="Team Member 2">
            <h3>Sathurshan</h3>
            <p>Designer and developer</p>
        </div>
        <div class="team-member">
            <img src="<?= ROOT ?>/assets/images/home/member.png" alt="Team Member 3">
            <h3>Teshini</h3>
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

<!-- SUPPORT SECTION -->
<section id="support" class="support">
    <h1>Support & Contact</h1>
    <p>If you need assistance, we are here to help. Choose one of the options below to get the support you need.</p>

    <div class="contact-form">
        <form action="<?= ROOT ?>/home/getSupport" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="title">Issue:</label>
            <input type="text" name="issue" id="issue" required><br>

            <label for="message">Message:</label>
            <textarea id="details" name="details" rows="4" required></textarea>

            <button type="submit">Submit</button>
        </form>

        <div class="contact-mail">
            <p>Contact Us:</p>
            <p style="color: dimgray;">gymorbit@gmail.com</p>
        </div>
    </div>

    <br>

    <div class="faqs">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <h3>How do I reset my password?</h3>
            <p>To reset your password, go to the login page and click on "Forgot Password". Follow the instructions sent to your email to reset your password.</p>
        </div>
        <div class="faq-item">
            <h3>What are your gym hours?</h3>
            <p>We are open 24/7 for all members. You can access the gym at any time that suits you.</p>
        </div>
        <div class="faq-item">
            <h3>How can I cancel my membership?</h3>
            <p>To cancel your membership, please contact our support team via email or phone, and we will assist you with the cancellation process.</p>
        </div>
    </div>
</section>

<?php include_once PATH . 'footer.php'; ?>
