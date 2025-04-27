<?php 
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $trainer_username= $_SESSION["username"];
    $username= $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];

    $gym_username=$userDetails["gym_username"]; 
    $profile_images=$userDetails["file"];
    $profile_image=$userDetails["file"];

        $trainer_name = $userDetails["trainer_name"];
        $email = $userDetails["email"];
        $social = $userDetails["social"];
        $experience = $userDetails["experience"];
        $contact = $userDetails["contact"];
        $location = $userDetails["location"];
        $age = $userDetails["age"];
        $gender = $userDetails["gender"];
        $availiblity = $userDetails["availiblity"];
        $qualify = $userDetails["qualify"];
        $special = $userDetails["special"];
        $password = $userDetails["password"];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <title>| Instructor |</title>  
      <!-- Favicon -->
      <link rel="icon" type="image/ico" href="<?= ROOT ?>/favicon.ico">
        
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/main.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/edit.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css">
    
    -->
    
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/common/dashboard.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/common/sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/common/modals.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/tables.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/buttons.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/calendar.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/workoutplan.css"> 




    <script src="<?= ROOT ?>/assets/js/instructor/instructor_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/instructor/instructor_2.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/instructor/calendar.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/instructor/workoutPlan.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/common/alert.js" defer></script>




</head> 
<body>

<?php if (!empty($data['message'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        showAlert("<?php echo $data['message']; ?>", "<?php echo $data['status']; ?>");
    });
</script>
<?php endif; ?>


<div id="customAlert" style="display:none; position:fixed; top:-100px; left:50%; transform:translateX(-50%); background:#333; color:white; padding:15px 30px; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.2); z-index:10000; font-size:16px; transition: top 0.5s ease, opacity 0.5s ease;">
    <span id="customAlertMessage"></span>
</div>

<div class="main-container">


<!-- Sidebar Menu -->
<div class="sidebar">
    <br>

        <header>
            <img src="<?= ROOT ?>/assets/images/instructor/profile/images/<?php echo $profile_image; ?>" alt="logo" class="logo">
        </header>

            <div class="nav-links">
                <ul>
                    <div class="grps">
                        <li class="tabs activetab" value="1"><a><i class="fa fa-home"></i>Home</a></li>
                        <li class="tabs " value="2"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                        <li class="tabs" value="3"><a><i class="bi bi-stars"></i>Gym</a></li>
                       
                        <li class="tabs" value="4"><a><i class="bi-person-arms-up"></i>Member Profiles</a></li>
                        <li class="tabs" value="20"><a><i class="bi bi-calendar2-check-fill"></i>Work-Out Plans</a></li>

                        <li class="tabs" value="9"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li>
                        
                        
                        <li class="tabs" value="8"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                        <li class="tabs" value="7"><a><i class="bi bi-chat-heart-fill"></i>Support</a></li>


                    </div>

                   
                    

                    
                    
                    <!-- <li class="tabs" value="10"><a><i class="bi bi-gear-fill"></i>Search Gyms</a></li> -->
                    <!-- <li class="tabs" value="4"><a><i class="bi bi-stack-overflow"></i>Materials</a></li> -->
                    <!-- <li class="tabs" value="11"><a><i class="bi bi-chat-left-heart-fill"></i>Posts</a></li>-->
                    <!-- <li class="tabs" value="6"><a><i class="bi bi-book-fill"></i>Reports</a></li> -->
                    <!-- <li class="tabs" value="7"><a><i class="bi bi-alarm-fill"></i>Reminders</a></li> -->

                    
                   
                    <div class="grps">
                        
                                <a href="<?= ROOT ?>/login/logout" class="logout-btn">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </a>
                    </div>

                </ul>
            </div> <!-- End of navlink-->
</div> <!-- End of Sidebar Menu -->


<!-- Main Content -->
  
<div class="descriptor active" value="1">
    <?php
                require 'home.php';
    ?>
    </div> 

    <div class="descriptor " value="2">
    <?php
                require 'profile.php';
    ?>  
    </div> 


   
    <div class="descriptor" value="3">
    <?php
                require 'gyms.php';
               

    ?>
    </div>


   
    <div class="descriptor" value="4">
       <?php
                require 'members.php';
       ?>
    </div>

    <div class="descriptor" value="5">
    <?php
                require 'appointments.php';
    ?>
    </div>

    

    <div class="descriptor" value="7">
    <?php
                require 'support.php';
    ?>
    </div>

    <div class="descriptor" value="8">
    <?php
                require 'materials.php';
    ?>
    </div>

    <div class="descriptor" value="9">
    <?php
                require 'schedule.php';
    ?>
    </div>
    

    <div class="descriptor" value="20">
    <?php
                require 'user_mealPlans.php';
    ?>
    </div>

   
</div>       
</body>
</html>
