<?php 
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $admin_username = $_SESSION["username"];
    $username= $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];
    $email=$userDetails["email"];
    $type=$userDetails["type"];
    $img=$userDetails["file"];

    $admin_name=$userDetails["admin_name"];
    $age=$userDetails["age"];
    $gender=$userDetails["gender"];
    $location=$userDetails["location"];
    $contact=$userDetails["contact"];
    $password=$userDetails["password"];


    $admin = new Admin();
    $dashboardData = $admin->get_report_data();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> |Admin| </title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/common/dashboard.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/common/sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/modals.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/tables.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/adminDashboard.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/messages.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/reminders.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/report.css">



    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?= ROOT ?>/assets/js/admin/1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/admin/loader.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/admin/message.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/admin/reminder.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/common/alert.js" defer></script>


    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>


    <script>
        const reportData = <?php echo json_encode($dashboardData); ?>;
    </script>


</head>
<body>

     <!-- Header Section -->
   <!--  <header class="header"> -->

    <!-- <i class="bi bi-house btn btn-primary"></i> -->

   <!-- <nav class="navbar">
    <a href="<?= ROOT ?>/login/logout" class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>Logout
        </a>
    </nav>
    </header> -->
    <!-- End of Header -->

<?php if (!empty($errorMessage)): ?>
<script>
    alert('<?php echo addslashes($errorMessage); ?>');
    $errorMessage = ""; 
</script>
<?php endif; ?>

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
                        

    <!-- Container -->
    <div class="main-container">

        <div class="sidebar">
            <br>

            <header>
            <img src="<?= ROOT ?>/assets/images/admin/profile/images/<?php echo $img; ?>" alt="logo" class="logo">
            </header>

            <div class="nav-links">
                <ul>
                    <div class="grps">
                    <li class="tabs activetab" value="1"><a><i class="fa fa-home"></i>Home</a></li>
                    <li class="tabs" value="3"><a><i class="bi bi-chat-left-quote-fill"></i>Messages</a></li>        
                    <li class="tabs" value="4"><a><i class="bi bi-alarm-fill"></i>Reminder</a></li>
                    <li class="tabs" value="11"><a><i class="bi bi-book-fill"></i>Reports</a></li>
                    <!-- <li class="tabs" value="5"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li> -->
                    <!-- <li class="tabs" value="6"><a><i class="bi bi-stack-overflow"></i>Materials</a></li> -->
                    <!-- <li class="tabs" value="7"><a><i class="bi bi-chat-heart-fill"></i>Posts</a></li> -->
                    <li class="tabs" value="8"><a><i class="fas fa-users"></i>Users</a></li>
                    <li class="tabs" value="9"><a><i class="fas fa-users"></i>Owners</a></li>
                    <li class="tabs" value="10"><a><i class="fas fa-users"></i>Instructors</a></li>
                    <li class="tabs" value="12"><a><i class="fas fa-users"></i>otherAdmins</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-person-circle"></i>Profile</a></li>

                   
                    </div>

                    <div class="grps">
                                
                                        <a href="<?= ROOT ?>/login/logout" class="logout-btn">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </a>
                            </div>

                </ul>
            </div>
        </div> <!-- End of Sidebar Menu -->



            <!-- Profile Section -->
            <div class="descriptor active" value="1">
            <?php
                      require 'adminDashboard.php';
                    //    require 'home.php';
            ?> 
            </div> 

            <div class="descriptor" value="2">
            <?php
                        require 'profile.php';
            ?> 
            </div> 


            <div class="descriptor" value="3">
            <?php
                        require 'messages.php';
            ?> 
            </div> 


            <div class="descriptor" value="4">
            <?php
                        require 'reminders.php';
            ?> 

            </div> 

            
            <!-- <div class="descriptor" value="5">
                        // require 'schedule.php';
            </div>  -->


            <div class="descriptor" value="6">
            <?php
                        require 'materials.php';
            ?> 
               

            </div> 

            <div class="descriptor" value="7">
            <?php
                        require 'posts.php';
            ?> 
               
                
            </div> 

            
            <div class="descriptor" value="8">
            <?php
                        require 'users.php';
            ?> 
            </div>


            <div class="descriptor" value="9">
            <?php
                        require 'owners.php';
            ?> 
            </div>


            
            <div class="descriptor" value="10">
            <?php
                        require 'instructors.php';
            ?> 
            </div>


            <div class="descriptor" value="11">
            <?php
                require 'report.php';
            ?> 
            </div>

            <div class="descriptor" value="12">
            <?php
                require 'otherAdmins.php';
            ?> 
            </div>

    </div>
</body>
</html>
