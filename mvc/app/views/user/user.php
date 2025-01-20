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
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <title>| User |</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/main.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/edit.css">
    
    <script src="<?= ROOT ?>/assets/js/user/user_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/user/user_2.js" defer></script>

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
    </header> 
    <!-- End of Header -->

    <!-- Container -->
    <div class="container">
        <!-- Sidebar Menu -->
        <div class="m-lg-0" >
        <div class="sidemenu">
            <br>
            <div class="container-fluid">
                    <img src="<?= ROOT ?>/assets/images/user/profile/images/<?php echo $profile_image; ?>" alt="logo" class="logo">
            <div class="menu">
                <ul>
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-stars"></i>Gym</a></li>
                    <li class="tabs" value="3"><a><i class="bi-person-arms-up"></i>Instructors</a></li>

                    <li class="tabs" value="4"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="9"><a><i class="bi bi-chat-heart-fill"></i>Support</a></li>
                    <li class="tabs" value="10"><a><i class="bi bi-gear-fill"></i>Search Gyms</a></li>
                    <li class="tabs" value="11"><a><i class="bi bi-chat-left-heart-fill"></i>Posts</a></li>

                    <li class="tabs" value="8"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-credit-card-fill"></i>Payments</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-book-fill"></i>Report</a></li>
                    <li class="tabs" value="7"><a><i class="bi bi-alarm-fill"></i>Reminder</a></li>

                </ul>
            </div> <!-- End of Menu -->
            </div>
        </div> <!-- End of Sidebar Menu -->
      </div>

        <!-- Main Content -->
        <div class="content">
            <h1>Welcome, <?php echo $username; ?>!</h1>       
            <div class="descriptor active" value="1">
                <h2>Profile</h2>
                <hr>
                <form id="profileForm" method="POST" action="./customize/update_profile.php">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?php echo $name; ?>" readonly></td>
                        </tr>
                        <tr></tr>
                            <td>User Name</td>
                            <td><input type="text" name="name" value="<?php echo $username; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?php echo $email; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" value="<?php echo $contact; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td><input type="text" name="age" value="<?php echo $age; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td><input type="email" name="gender" value="<?php echo $gender; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Goals</td>
                            <td><input type="text" name="goals" value="<?php echo $goals; ?>" readonly></td>
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
                <h2>Joined Gym</h2>
                <hr>
                <div class="jobreq">
                                <?php 
                                 $user = new User(); 
                                 $gymDetails = $user->joinedGyms($username); 

                                if (isset($gymDetails['found'])) {
                                    while ($rowRequested = $gymDetails['result']->fetch_assoc()) {
                                
                                        echo "<table>";
                                        echo "<tr><td><p>".$rowRequested['gym_Name']."</p></td></tr>";
                                        echo "<td><button onclick='leaveGym(\"{$rowRequested['gym_username']}\", \"$username\")'>Leave</button></td></tr>";
                                        echo "</table>";
                                        echo "<br>";    
                                    
                                    }
                                    }
                                    else {
                                        echo "<p>" . $gymDetails['message'] . "!</p>";
                                        }
                                ?>
                </div> 
            </div>


           
            <div class="descriptor" value="3">
                <h2>Instructors</h2>
                <hr>
                <div class="fav">

                <?php 
                                 $user = new User(); 
                                 $instructorDetails = $user->instructor_Check($username);
                                 if ( $instructorDetails['found']=='yes') {
                                    while ($rowRequested = $instructorDetails['result']->fetch_assoc()) {
                                        echo "<table>";
                                        echo "<tr><td><input type='text' value='" . htmlspecialchars($rowRequested['trainer_name']) . "' readonly></td></tr>";
                                        echo "</table>";
                                        echo "<br>";
                                    }
                                 }else{
                                    $user = new User(); 
                                    $instructorDetails2 = $user->request_Instructor($username);

                                    if ($instructorDetails2['found']=='yes') {
                                        while ( $instructor = $instructorDetails2['result']->fetch_assoc()) {

                                        echo "<h5>" . htmlspecialchars($instructor['trainer_name']) . "</h5>";

                                        echo "<img src='" . ROOT . "/assets/images/instructor/profile/images/" . 
                                            htmlspecialchars($instructor['file'], ENT_QUOTES, 'UTF-8') . 
                                             "' width='200' title='" . 
                                             htmlspecialchars($instructor['file'], ENT_QUOTES, 'UTF-8') . 
                                             "'>";

                                        
                                        echo "<h5>" . htmlspecialchars($instructor['age']) . "</h5>";
                                        echo "<h5>" . htmlspecialchars($instructor['gender']) . "</h5>";
                                        echo "<h5>" . htmlspecialchars($instructor['contact']) . "</h5>";
                                        echo "<h5>" . htmlspecialchars($instructor['experience']) . "</h5>";
                                        echo "<h5>" . htmlspecialchars($instructor['availiblity']) . "</h5>";
                                        echo "<h5>" . htmlspecialchars($instructor['special']) . "</h5>";
    
                                        echo "<button type='button' 
                                        onclick='requestInstructor(   \"" . htmlspecialchars($username, ENT_QUOTES) . "\", 
                                                                     \"" . htmlspecialchars($userDetails['name'], ENT_QUOTES) . "\", 
                                                                    \"" . htmlspecialchars($instructor['gym_username'], ENT_QUOTES) . "\", 
                                                                   \"" . htmlspecialchars($instructor['trainer_username'], ENT_QUOTES) . "\", 
                                                                   \"" . htmlspecialchars($instructor['trainer_name'], ENT_QUOTES) . "\")'>
                                        Request
                                      </button>";
                            
                                      
                                        echo "<hr>";
                                        }
                                    }else{
                                        echo "<p>" . $instructorDetails2['message'] . "!</p>";
                                    }



                                 }
                ?>                 
               

                </div>
            </div>


            <div class="descriptor" value="4">
                <h2>Materials</h2>
                <hr>

                <?php                
                $user = new User(); 
                $result3 = $user->get_materials($username);
    

                        if($result3['found']=='yes'){
                            while ($materials = $result3['result']->fetch_assoc()) {
                    
                                echo "<h4> <u>" . htmlspecialchars($materials['gym_name']) . "</u> </h5>";
                                echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";
                                echo "<img src='" . ROOT . "/assets/images/materials/images/" . htmlspecialchars($materials['file']) . "' width='200' title='" . htmlspecialchars($materials['file']) . "'>";
                                echo "<p>" . htmlspecialchars($materials['details']) . "</p>";
                                echo "<hr>";
                            }

                        }
                        elseif($result3['found']=='no'){
                            echo "<p>There are no materials available </p>";

                        }elseif($result3['found']=='alert'){
                            echo "<p>Please join a gym to view materials  </p>";

                        }

                ?>

            </div> 

            
            <div class="descriptor" value="8">
                <h2>Schedule</h2>
                <hr>
            </div>
       
      
            <div class="descriptor" value="5">
                <h2>Payments</h2>
                <hr>
            </div>
       
            <div class="descriptor" value="6">
                <h2>Reports</h2>
                <hr>
            </div>


            <div class="descriptor" value="7">
                <h2>Reminders</h2>
                <hr>
                <?php

                $user = new User(); 
                $reminders = $user->get_reminders($username); 

                if ($reminders['found']=='yes') {


                    while ($result = $reminders['result']->fetch_assoc()) {

                        echo "<table>";
                        echo "<tr><td><p>". htmlspecialchars($result['message']) ."</p></td></tr>";
                        echo "<tr><td><p>". htmlspecialchars($result['time']) ."<p></td></tr>";
                        echo "</table>";
                        echo "<br>";    
                    
                    }
                    }
                    elseif($reminders['found']=='no') {
                        echo "<p>No Reminders ! </p>";
                        }
                ?>
            </div>


            <div class="descriptor" value="9">
                <h2>Support</h2>
                <hr>
                <button class='editBtn' onclick="createTicket('<?php echo $username; ?>')">Create Ticket</button>
                <!-- Hidden Edit Form (Modal) -->
                <div id="SupportFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <h3>Support</h3>
                                <form id="editForm" method="POST" action="<?= ROOT ?>/user/getSupport" enctype="multipart/form-data">
                                    <input type="hidden" name="username" id="USER_NAME">
                                    <input type="hidden" name="access" value="instructor">
                                    <input type="email" id="email" name="email" value='<?php echo $email; ?>' required>


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


            <div class="descriptor" value="11">
                <h2>Posts</h2>
                <hr>               
                <?php

                $user = new User(); 
                $post = $user->get_posts($username); 

                if(isset($post['found'])&&$post['found']=='yes'){
                    while ($posts=$post['result']->fetch_assoc()) {
                    
                        echo "<h4> <u>" . htmlspecialchars($posts['gym_name']) . "</u> </h5>";
                        echo "<h5>" . htmlspecialchars($posts['title']) . "</h5>";
                        echo "<img src='". ROOT . "/assets/images/posts/images/" . htmlspecialchars($posts["file"]) . "' width='200' title='" . htmlspecialchars($posts['file']) . "'>";
                        echo "<p>" . htmlspecialchars($posts['details']) . "</p>";
                        echo "<hr>";
                    }

                }elseif(isset($post['found'])&&$post['found']=='no'){
                    echo "<p>There are no posts  </p>";

                }elseif(isset($post['found'])&&$post['found']=='alert'){
                    echo "<p>Please join a gym to view posts  </p>";   
                }
                


                ?>
            </div>

            <div class="descriptor" value="10">
                <h2>Search Gyms</h2>
                <hr>
                <div class="search-container">
                <?php
                    echo '<input type="text" id="searchQuery2" name="search" placeholder="Search by gym name, gym username, or email">';
                    echo '<input type="hidden" id="username" name="username" value="' . htmlspecialchars($username) . '">';
                    echo '<input type="hidden" id="name" name="name" value="' . htmlspecialchars($userDetails['name']) . '">';
                    ?>

                </div>

                
                <div id="searchGymResults">
                        
                </div>
            </div> 
       
        </div> <!-- End of Main Content --> 
    </div> <!-- End of Container -->
</body>
</html>
