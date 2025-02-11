<?php 
if (!isset($_SESSION["username"])) {
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $username = $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];
    $email=$userDetails["email"];
    $name=$userDetails["name"];
    $contact=$userDetails["contact"];
    $age=$userDetails["age"];
    $gender=$userDetails["gender"];
    $goals=$userDetails["goals"];
    $password=$userDetails["password"];
    $profile_image=$userDetails["file"];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/sidebar.css">
    <!-- <script src="<?= ROOT ?>/assets/js/user/user_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/user/user_2.js" defer></script> -->
    <style>
       
    </style>
</head>
<body>
<div class="container">
<div class="sidebar">
    <header>
        <img src="<?= ROOT ?>/assets/images/user/profile/images/logo_light.png<?php echo $profile_image; ?>" alt="logo" class="logo" height="100px">
    </header>
    <ul class="nav-links">
        <li><a onclick="loadPage('dashboard')"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a onclick="loadPage('profile')"><i class="fa-solid fa-user"></i> Profile</a></li>
        <li><a onclick="loadPage('gym')"><i class="fa-solid fa-dumbbell"></i> Gym</a></li>
        <li><a onclick="loadPage('instructor')"><i class="fa-solid fa-medal"></i> Instructors</a></li>
        <li><a onclick="loadPage('workout')"><i class="fa-solid fa-person-running"></i> Workout Plan</a></li>
        <li><a onclick="loadPage('meal')"><i class="fa-solid fa-utensils"></i> Meal Plan</a></li>
        <li><a onclick="loadPage('progress')"><i class="fa-solid fa-chart-column"></i> Progress Tracker</a></li>
        <li><a onclick="loadPage('appoinments')"><i class="fa-solid fa-calendar-check"></i> Appointments</a></li>
        <li><a onclick="loadPage('reminders')"><i class="fa-solid fa-bell"></i> Reminders</a></li>
        <li><a onclick="loadPage('notices')"><i class="fa-solid fa-comment"></i> Important Notices</a></li>
        <li><a onclick="loadPage('payment')"><i class="fa-solid fa-credit-card"></i> Payment</a></li>
        <li><a onclick="loadPage('support')"><i class="fa-solid fa-handshake-angle"></i> Support</a></li>

        <a href="<?= ROOT ?>/login/logout" class="logout-btn">
            <li class="tabs" value=""> 
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </li>
        </a>
    </ul>
</div>

<div  id="content">
    <h1>Welcome</h1>
    <p>Click on the menu to load content.</p>
   
</div>
</div>

<script>
    function loadPage(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                document.getElementById("content").innerHTML = data;
            })
            .catch(error => console.error('Error loading page:', error));
    }

    // Load the dashboard by default when the page is loaded
    document.addEventListener("DOMContentLoaded", function() {
        loadPage('dashboard');
    });

    
</script>



</body>
</html>