<?php 
if (!isset($_SESSION["username"])) {
    header("Location: ../../../login/login.php");
    exit();
}
else{

        $username = $_SESSION["username"];
        $gym_username= $_SESSION["username"];
        $userDetails = $_SESSION["userDetails"];

        $email = $userDetails["email"];        
        $owner_name = $userDetails["owner_name"];
        $gym_name = $userDetails["gym_name"];
        $owner_contact = $userDetails["owner_contact"];
        $gym_contact = $userDetails["gym_contact"];
        $age = $userDetails["age"];
        $gender = $userDetails["gender"];
        $location = $userDetails["location"];
        $start_year = $userDetails["start_year"];
        $joined = $userDetails["joined"];
        $experience = $userDetails["experience"];
        $web = $userDetails["web"];
        $social = $userDetails["social"];
        $password = $userDetails["password"];
        $profile_image = $userDetails["file"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>|Gym|</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/owner/main.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/owner/o-custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/owner/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/owner/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/owner/edit.css">

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <script src="<?= ROOT ?>/assets/js/owner/1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/owner/loader.js" defer></script>

    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/owner/schedule.css">
    <script src="<?= ROOT ?>/assets/js/owner/schedule.js" defer></script>
</head>
<body>

<?php if (!empty($errorMessage)): ?>
    <script>
        alert('<?php echo addslashes($errorMessage); ?>');
        $errorMessage = ""; 
    </script>
<?php endif; ?>

     <!-- Header Section -->
     <header class="header">

    <i class="bi bi-house btn btn-primary"></i>

    <nav class="navbar">
    <a href="<?= ROOT ?>/login/logout" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>Logout
        </a>
    </nav>
    </header> 
    <!-- End of Header -->

    <!-- Container -->
    <div class="container">

        <!-- Sidebar Menu -->
        <div class="m-lg-0" >
         <div class="sidemenu">
            <br>
            <img src="<?= ROOT ?>/assets/images/owner/profile/images/<?php echo $profile_image; ?>" alt="logo" class="logo">
            <div class="container-fluid">
            <div class="menu">
                <ul>
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-check"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-briefcase"></i>Posts</a></li>
                    <li class="tabs" value="10"><a><i class="fa-solid fa-dumbbell"></i>Machines</a></li>
                    <li class="tabs" value="7"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="3"><a><i class="bi-person-arms-up"></i>Instructors</a></li>
                    <li class="tabs" value="11"><a><i class="fas fa-users"></i>Members</a></li>
                    <li class="tabs" value="9"><a><i class="bi bi-sliders"></i>Requests</a></li>

                    <li class="tabs" value="4"><a><i class="bi bi-calendar2-check"></i>Schedule</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-book"></i>Report</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-alarm"></i>Reminder</a></li>
                    
                    <li class="tabs" value="8"><a><i class="bi bi-chat-heart"></i>Support</a></li>
                   
                    
                    
                </ul>
            </div> <!-- End of Menu -->
            </div>
          </div> 
        <!-- End of Sidebar Menu -->
       </div>

        <!-- Main Content -->

        <div class="content">
            <h1>Welcome, <?php echo $gym_username; ?>!</h1>


            <div class="descriptor active" value="1">
            <?php
                        require 'profile.php';
            ?> 
            </div>


            <!-- Job Requested Section -->
            <div class="descriptor" value="2">
            <?php
                        require 'posts.php';
            ?> 
            </div> 

            
            <div class="descriptor" value="3">
            <?php
                        require 'instructors.php';
            ?> 
            </div> 

            <div class="descriptor" value="4">
                <h2>Schedule</h2>
                <hr>
            </div>

            <div class="descriptor" value="5">
                <h2>Reports</h2>
                <hr>
            </div> 

            <div class="descriptor" value="6">
            <?php
                        require 'reminders.php';
            ?> 
            </div> 

            <div class="descriptor" value="7">
            <?php
                        require 'materials.php';
            ?> 
            </div> 

            <div class="descriptor" value="8">
            <?php
                        require 'support.php';
            ?> 
            </div> 

            <div class="descriptor" value="9">
            <?php
                        require 'requests.php';
            ?> 
            </div> 

            <div class="descriptor" value="10">
            <?php
                        require 'machines.php';
            ?> 
            </div> 


            <div class="descriptor" value="11">
            <?php
                        require 'members.php';
            ?> 
            </div> 
           

        </div> <!-- End of Main Content -->
    </div> <!-- End of Container -->

    <?php
        if (isset($_GET['alert'])) {
            $message = htmlspecialchars($_GET['alert']); // Sanitize the message
            echo "<script>alert('$message');</script>";
        }
        ?>
   
    <script src="loader.js" defer></script>    
</body>
</html>
