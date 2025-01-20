<?php 
    if (!defined('PATH')) {
        define('PATH', $_SERVER['DOCUMENT_ROOT'] . '/mvc/public/assets/partials/');
    }
    include_once PATH . 'header.php';
    include_once PATH . 'navigation.php';
    
?>

<!-- Support Section -->
<section class="support">
<h1>Support & Contact</h1>
<p>If you need assistance, we are here to help. Choose one of the options below to get the support you need.</p>

<!-- Contact Form -->
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

<!-- FAQs -->
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
<?php include_once PATH . 'navigation.php'; ?> 
    