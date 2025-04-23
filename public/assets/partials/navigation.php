<!-- Navbar Wrapper -->
<div class="navbar-wrapper">
<!-- Navbar for Desktop and Mobile -->
<div class="navbar">
        <!-- Logo -->
    <div class="logo-container">
        <img src="<?= ROOT ?>/assets/images/home/GymOrbitLogo.png" alt="FasterUI">
        <i class="fas fa-bolt"></i>
        <span class="logo-text">FasterUI</span>
    </div>

        <!-- Desktop Navigation Menu -->
        <ul class="nav-pages desktop-menu">
            <li><a href="#home">Home</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#support">Support</a></li>
        </ul>

        <!-- Desktop Buttons -->
        <div class="auth-buttons desktop-menu">
            <a href="<?= ROOT ?>/login/login" class="join-btn">Login</a>
            <a href="<?= ROOT ?>/signup/signup" class="login-btn">Join Us</a>
        </div>

        <!-- Mobile Menu Toggle Button -->
    <div id="menuBar" class="mobile-menu-btn" onclick="toggleMobileMenu()">
        <i class="fas fa-bars"></i>
    </div>
    </div>

    <!-- Mobile Navigation Menu -->
<div id="mobileBar" class="mobile-dropdown">
    <ul class="mobile-nav-list">
        <li><a href="#home">Home</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#support">Support</a></li>
    </ul>

</div>



