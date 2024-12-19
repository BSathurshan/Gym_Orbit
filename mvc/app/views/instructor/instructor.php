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
    <title>Company Dashboard</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/main.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/edit.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/css/buttons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <script src="<?= ROOT ?>/assets/js/instructor/instructor_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/instructor/instructor_2.js" defer></script>
</head>
<body>
    <!-- Header Section -->
    <header class="header">

        <i class="bi bi-house btn btn-primary"></i>

        <nav class="navbar">
            <a href="<?= ROOT ?>/login/logout" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>Logout
            </a>
        </nav>
    </header> <!-- End of Header -->

    <!-- Container -->
    <div class="container">
        <!-- Sidebar Menu -->
        <div class="m-lg-0" >
        <div class="sidemenu">
            <br>
            <div class="container-fluid">
            <img src="<?= ROOT ?>/assets/images/instructor/profile/images/<?php echo $profile_images; ?>" alt="logo" class="logo">
            <div class="menu">
                <ul>
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li>
                    <li class="tabs" value="3"><a><i class="bi bi-person-lines-fill"></i>Contacts</a></li>
                    <li class="tabs" value="4"><a><i class="bi bi-alarm-fill"></i>Reminder</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-chat-heart-fill"></i>Support</a></li>
        
                </ul>
            </div> <!-- End of Menu -->
            </div>
        </div> <!-- End of Sidebar Menu -->
      </div>

        <!-- Main Content --> 
        <div class="content">
                        
        
            <h1>Welcome, <?php echo $trainer_username; ?>!</h1>


            <!-- Profile Section -->
            <div class="descriptor active" value="1">
                <h2>Profile</h2>
                <hr>
                <form id="profileForm" method="POST" action="./customize/update_profile.php">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="trainer_name" value="<?php echo $trainer_name; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" value="<?php echo $email; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Social</td>
                            <td><input type="text" name="social" value="<?php echo $social; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Experience</td>
                            <td><input type="text" name="experience" value="<?php echo $experience; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><input type="text" name="age" value="<?php echo $age; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><input type="text" name="gender" value="<?php echo $gender; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="contact" value="<?php echo $contact; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="location" value="<?php echo $location; ?>" readonly></td>
                        </tr>                   
                        <tr>
                            <td>Availibility</td>
                            <td><input type="text" name="availiblity" value="<?php echo $availiblity; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Qualifications</td>
                            <td><input type="text" name="qualify" value="<?php echo $qualify; ?>" readonly></td>
                        </tr>

                        <tr>
                            <td>Specialities</td>
                            <td><input type="text" name="special" value="<?php echo $special; ?>" readonly></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="hidden" name="password" value="<?php echo $password; ?>" readonly></td>
                        </tr>
                    </table>



                    <div class="editsave">
                        <button class="save" type="submit">
                            <i class="fa-solid fa-floppy-disk"></i>Save
                        </button>
                    </div> <!-- End of Save Button Container -->
                </form>
                <div class="editsave">
                    <button class="edit activebtn" onclick="editable()">
                        <i class="fa-solid fa-pen-to-square"></i>Edit
                    </button>
                </div> <!-- End of Edit Button Container -->
            </div> 


            <div class="descriptor" value="2">
                <h2>Schedule</h2>
                <hr>
                <div class="jobreq"></div>
            </div> 


            <div class="descriptor" value="3">
                <h2>Contacts</h2>
                <hr>
                <div class="fav">

                <?php 
                                 $instructor = new Instructor(); 
                                 $contacts = $instructor->getContacts($username); 

                                 if($contacts['found']=='yes')
                                 {
                                    while ($Results = $contacts['result']->fetch_assoc()) {
                                        
                                    echo "<h4> <u>" . htmlspecialchars($Results['name']) . "</u> </h5>";
                                    echo "<img src='" . ROOT . "/assets/images/user/profile/images/"  . htmlspecialchars($Results["file"]) . "' width='200' title='" . htmlspecialchars($Results['file']) . "'>";
                                    echo "<h5>" . htmlspecialchars($Results['email']) . "</h5>";
                                    echo "<h5>" . htmlspecialchars($Results['contact']) . "</h5>";
                                    echo "<h5>" . htmlspecialchars($Results['age']) . "</h5>";
                                    echo "<h5>" . htmlspecialchars($Results['gender']) . "</h5>";
                                    echo "<hr>";
                                    }

                                 }
                                 elseif($contacts['found']=='no')
                                 {
                                    echo "<h4> <p>" . htmlspecialchars($contacts['message']) . "</p> </h5>";

                                 }

                ?>


                </div>
            </div> 


            <div class="descriptor" value="4">
                <h2>Reminders</h2>
                <hr>
                 <?php
                 $instructor = new Instructor(); 
                 $reminder = $instructor->getReminders($username); 
    
                    if ($reminder['found']=='yes') {
                        while ($result = $reminder['result']->fetch_assoc()) {
    
                            echo "<table>";
                            echo "<tr><td><p>".$result['message']."</p></td></tr>";
                            echo "<tr><td><p>".$result['time']."</p></td></tr>";
                            echo "</table>";
                            echo "<br>";    
                        
                        }
                        }
                        elseif($reminder['found']=='no') 
                        {
                            echo "<p>".$reminder['message']."</p>";
                            
                        }
                    ?>
            </div> 
        
        
        <div class="descriptor" value="5">
                <h2>Materials</h2>
                <hr>
                <?php
                
                 $instructor = new Instructor(); 
                 $materials = $instructor->getMaterials($gym_username); 

                 if ($materials['found'] == 'yes') {
                    while ($result = $materials['result']->fetch_assoc()) {
                        echo "<h4><u>" . htmlspecialchars($result['gym_name']) . "</u></h4>";
                        echo "<h5>" . htmlspecialchars($result['title']) . "</h5>";
                        echo "<img src='" . ROOT . "/assets/images/materials/images/" . htmlspecialchars($result["file"]) . "' width='200' title='" . htmlspecialchars($result['file']) . "'>";
                        echo "<p>" . htmlspecialchars($result['details']) . "</p>";
                        echo "<hr>";
                    }
                }
                 
                elseif($materials['found']=='no') 
                {
                    echo "<p>" . htmlspecialchars($materials['message']) . "</p>";
                }
      

                ?>
        </div> 


             <div class="descriptor" value="6">
                <h2>Support</h2>
                <hr>

                <button class='editBtn' onclick="createTicket('<?php echo $trainer_username; ?>', '<?php echo $email; ?>')">Create Ticket</button>
                <!-- Hidden Edit Form (Modal) -->
                <div id="SupportFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <label><h3>Support</h3></label>
                                <form id="editForm" method="POST" action="<?= ROOT ?>/instructor/getSupport" enctype="multipart/form-data">
                                    <input type="hidden" name="trainer_username" id="USER_NAME">
                                    <input type="hidden" name="email" id="Email">
                                    <input type="hidden" name="role" value="instructor">


                                    <label for="title">Issue:</label>
                                    <input type="text" name="issue" id="issue" required><br>

                                    <label for="details">Details:</label>
                                    <textarea name="details" id="details" rows="4" cols="50" required></textarea><br>

                                    <input type="submit" value="Send">
                                    <button type="button" onclick="closeEditModal()">Cancel</button>
                                </form>
                                </div>
                                </div>

            </div> 



        </div> <!-- End of Main Content -->
    </div> <!-- End of Container -->
</body>
</html>
