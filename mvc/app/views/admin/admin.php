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


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> |Admin| </title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/main.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/i-custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/edit.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/custom.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/buttons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <script src="<?= ROOT ?>/assets/js/admin/1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/admin/loader.js" defer></script>
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
            <img src="<?= ROOT ?>/assets/images/admin/profile/images/<?php echo $img; ?>" alt="logo" class="logo">
            <div class="menu">
                <ul>
                    
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-chat-left-quote-fill"></i>Messages</a></li>        
                    <li class="tabs" value="3"><a><i class="bi bi-alarm-fill"></i>Reminder</a></li>
                    <li class="tabs" value="4"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-chat-heart-fill"></i>Posts</a></li>
                    <li class="tabs" value="7"><a><i class="fas fa-users"></i>Users</a></li>
                    <li class="tabs" value="8"><a><i class="fas fa-users"></i>Owners</a></li>
                    <li class="tabs" value="9"><a><i class="fas fa-users"></i>Instructors</a></li>

                    <?php
                    if ($type == 'super') {
                        echo '<li class="tabs" value="10"><a><i class="fas fa-users"></i>Admins</a></li>';
                    }
                    ?>

                </ul>
            </div> <!-- End of Menu -->
            </div>
        </div> <!-- End of Sidebar Menu -->
      </div>

        <!-- Main Content -->      
        <div class="content">                       
            <h1>Welcome, <?php echo $admin_username; ?>!</h1>

            <!-- Profile Section -->
            <div class="descriptor active" value="1">
                <h2>Profile</h2>
                <hr>
                <form id="profileForm" method="POST" action="./customize/update_profile.php">
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="trainer_name" value="<?php echo $admin_name; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" value="<?php echo $email; ?>" readonly></td>
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
                <h2>Messages</h2>
                <hr>
                <div class="jobreq">    
                    
                    <?php

                        $admin = new Admin(); 
                        $messages = $admin->get_messages(); 

                        if (isset($messages['found'])&&$messages['found']=='yes') {
                            while ($rowRequested = $messages['result']->fetch_assoc()) {

                                echo "<table>";
                                echo "<tr><td><input type='text' value='{$rowRequested['username']}' readonly></td></tr>";
                                echo "<tr><td><input type='text' value='{$rowRequested['issue']}' readonly></td></tr>";
                                echo "<tr><td><input type='text' value='{$rowRequested['message']}' readonly></td></tr>";
                                echo "<tr><td><input type='text' value='{$rowRequested['time']}' readonly></td></tr>";
                                echo "</table>";
                                echo "<br>";    
                            
                            }
                            }
                            elseif (isset($messages['found'])&&$messages['found']=='no') 
                            {
                                echo "<p>No Reminders!</p>";
                            }
                        ?>

                </div>
            </div> 


            <div class="descriptor" value="3">
                <h2>Reminders</h2>
                <hr>
                 <?php
    
                        $admin = new Admin(); 
                        $reminders = $admin->get_reminders($username); 

                        if (isset($reminders['found'])&&$reminders['found']=='yes') {
                            while ($rowRequested = $reminders['result']->fetch_assoc()) {
                        
                            echo "<table>";
                            echo "<tr><td><input type='text' value='{$rowRequested['message']}' readonly></td></tr>";
                            echo "<tr><td><input type='text' value='{$rowRequested['time']}' readonly></td></tr>";
                            echo "</table>";
                            echo "<br>";    
                        
                        }
                        }
                        elseif (isset($reminders['found'])&&$reminders['found']=='no') 
                        {
                            echo "<p>No Reminders!</p>";
                        }
                    ?>
            </div> 

            
            <div class="descriptor" value="4">
                <h2>Schedule</h2>
                <hr>
                <div class="fav"></div> 
            </div> 


            <div class="descriptor" value="5">
                <h2>Materials</h2>
                <hr>
                <?php

                $admin = new Admin(); 
                $material = $admin->get_materials($username); 

                if (isset($material['found'])&&$material['found']=='yes') {
                    while ($materials = $material['result']->fetch_assoc()) {
                    
                        
                        echo "<h4> <u>" . htmlspecialchars($materials['gym_name']) . "</u> </h5>";
                        echo "<tr><td><input type='text' value='{$materials["type"]}' readonly></td></tr>";
                        echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";
                        echo "<img src='" . ROOT . "/assets/images/materials/images/" . $materials["file"] . "' width='200' title='" . $materials['file'] . "'>";
                        echo "<p>" . htmlspecialchars($materials['details']) . "</p>";

                        echo "<td><button class='editBtn' onclick='materialEdit(\"{$materials['type']}\",\"{$materials['title']}\",\"{$materials['file']}\",\"{$materials['details']}\",\"{$materials['gym_username']}\",\"{$materials['id']}\")'> Edit </button>";
                        echo "<button class='deleteBtn' onclick='materialDelete(\"{$materials['id']}\", \"{$materials['gym_username']}\", \"{$materials['file']}\", \"admin\")'>Delete</button> </td>";

                        echo "<hr>";

                       
                    }
                } 
                elseif (isset($material['found'])&&$material['found']=='no') 
                {
                    echo "There are no Posts.";
                }
                ?>


                                <!-- Hidden Edit Form (Modal) -->
                                <div id="editMaterialFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <h3>Edit Materials</h3>
                                <form id="editForm" method="POST" action="../Owner/materials/edit.php" enctype="multipart/form-data">
                                    <input type="hidden" name="gym_username" id="gym_Username">
                                    <input type="hidden" name="id" id="_id">
                                    <input type="hidden" name="old_file_name" id="old_FileName">
                                    <input type="hidden" name="access" id="access" value="admin">

                                    <label for="type">Type:</label>
                                    <select name="type" id="editType" required>
                                        <option value="Free">Free</option>
                                        <option value="Premium">Premium</option>
                                    </select><br>

                                    <label for="title">Title:</label>
                                    <input type="text" name="title" id="editTitle" required><br>

                                    <label for="file">Upload File:</label>
                                    <input type="file" name="file" id="editFile"><br>

                                    <label for="details">Details:</label>
                                    <textarea name="details" id="editDetails" rows="4" cols="50" required></textarea><br>

                                    <input type="submit" value="Save">
                                    <button type="button" onclick="closeEditModal()">Cancel</button>
                                </form>
                                </div>
                                </div>

            </div> 

            <div class="descriptor" value="6">
                <h2>Posts</h2>
                <hr>

                <?php          

                    $admin = new Admin(); 
                    $posts = $admin->get_posts(); 

                    if (isset($posts['found'])&&$posts['found']=='yes') {
                        while ($post = $posts['result']->fetch_assoc()) {

                            echo "<table>";
                            echo "<h4> <u>" . htmlspecialchars($post['gym_name']) . "</u> </h5>";
                            echo "<h5>" . htmlspecialchars($post['title']) . "</h5>";
                            echo "<img src='" . htmlspecialchars(ROOT . "/assets/images/posts/images/" . $post["file"]) . "' 
                            width='200' 
                            title='" . htmlspecialchars($post["file"]) . "'>";
                                           echo "<p>" . htmlspecialchars($post['details']) . "</p>";
                            echo "<hr>";
                            
                             echo "<td><button class='editBtn' onclick='postEdit(\"{$post['title']}\",
                             \"{$post['file']}\",\"{$post['details']}\",\"{$post['gym_username']}\",
                             \"{$post['id']}\")'> Edit </button>";
                            
                             echo "<button class='deleteBtn' onclick='postDelete(\"{$post['id']}\",\"{$post['gym_username']}\",\"{$post['file']}\", \"admin\")'>Delete</button> </td>";
                            
                            echo "</table>";
                            echo "<br>";    
                            
                        }
                        }
                        elseif (isset($posts['found'])&&$posts['found']=='no') 
                        {
                            echo "<p>No Posts found , add one!</p>";
                        }
                        ?>   
                          <!-- Hidden Edit Form (Modal) -->
                          <div id="editPostFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Post</h3>
                                    <form id="editForm" method="POST" action="../Owner/posts/edit.php" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="gymUsername">
                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="old_file_name" id="oldFilename">
                                        <input type="hidden" name="access" id="access" value="admin">

                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="editNewTitle" required><br>

                                        <label for="file">Upload File:</label>
                                        <input type="file" name="file" id="editFile"><br>

                                        <label for="details">Details:</label>
                                        <textarea name="details" id="editNewDetails" rows="4" cols="50" required></textarea><br>

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>

                
            </div> 

            
            <div class="descriptor" value="7">
                <h2>users</h2>
                <hr>

                    <div class="search-container">
                        <input type="text" id="searchQuery" name="search" placeholder="Search by name, username, or email">
                    </div>

                <div id="userResults">
                        <!-- User data will be displayed here -->
                </div>

                <button type="button" onclick="addUser()">Add</button>

                            <!-- Hidden Edit Form (Modal) -->
                            <div id="editUserFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit User</h3>
                                    <form id="editForm" method="POST" action="./users/edit.php" enctype="multipart/form-data">
                                        <input type="hidden" name="old_email" id="old_email">
                                        <input type="hidden" name="old_username" id="old_username">

                                        <label for="username">Username:</label>
                                        <input type="text" name="username" id="username" required><br>

                                        <label for="email">Email:</label>
                                        <input type="text" name="email" id="email" required><br>

                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" required><br>

                                        <label for="contact">Contact:</label>
                                        <input type="text" name="contact" id="contact" required><br>

                                        <label for="address">Addres:</label>
                                        <input type="text" name="location" id="location" required><br>
                                        

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>



                        <!-- Hidden Add Form (Modal) -->
                        <div id="addUserFormModal" class="modal" style="display: none;">
                         <div class="modal-content">
                            <h3>Add User</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/admin/addUser" enctype="multipart/form-data">
                            
                            <input type="hidden" name="type" id="type" value="user" >
                            <input type="hidden" name="access" id="" value="admin" >

                                <label for="">Username:</label>
                                <input type="text" name="username" id="" required><br>

                                <label for="">Name:</label>
                                <input type="text" name="name" id="" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="" required><br>

                                <label for="">Password:</label>
                                <input type="password" name="password" required><br>

                                <label for="">Profile image:</label><br>
                                <input type="file" name="file" id=""><br><br>

                                <label for="">Age:</label>
                                <input type="text" name="age" id="" required><br>

                                <label for="">Gender:</label>
                                <select name="gender" id="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer Not to Say</option>
                                </select>

                                <label for="">Contact:</label>
                                <input type="text" name="contact" id="" required><br>

                                <label for="">Address:</label>
                                <input type="text" name="location" id="" required><br>

                                <label for="">Goals:</label>
                                <select name="goalChoice" id="" required>
                                    <option value="" disabled selected>Select main goal</option>
                                    <option value="strength">Strength </option>
                                    <option value="physic">Physic</option>
                                    <option value="endurance">Endurance</option>
                                </select>
                                <br>

                                <label for="">Achieve :</label>
                                <select name="achieveChoice" id="" required>
                                    <option value="" disabled selected>Select  achieve</option>
                                    <option value="loose weight">Loose weight </option>
                                    <option value="build muscle">Build muscle</option>
                                </select>
                                <br>

                                <label for="">Active mode:</label>
                                <select name="activeMode" id="activeMode" required>
                                    <option value="" disabled selected>Select your active mode</option>
                                    <option value="full">Full Time </option>
                                    <option value="part">Part Time</option>
                                    <option value="temporary">Temporary</option>
                                    <option value="not sure">Not sure</option>
                                </select>
                                <br>

                                <label for="health">Any health concerns *:</label>
                                <input type="text" name="health" id="health" >


                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                         </div>
                       </div>   



            </div>


            <div class="descriptor" value="8">
                <h2>Owners</h2>
                <hr>

                <div class="search-container">
                        <input type="text" id="searchQuery2" name="search" placeholder="Search by gym name, gym username, or email">
                    </div>

                    <div id="ownerResults">
                        <!-- Owners data will be displayed here -->
                </div>

                <button type="button" onclick="addOwner()">Add</button>


                 <!-- Hidden Add Form (Modal) -->
                 <div id="addOwnerFormModal" class="modal" style="display: none;">
                         <div class="modal-content">
                            <h3>Add Owner</h3>
                            <form id="addForm" method="POST" action="../signup/signup.php" enctype="multipart/form-data">
                            
                            <input type="hidden" name="type" id="type" value="owner" >
                            <input type="hidden" name="access" id="" value="admin" >

                                <label for="">Username:</label>
                                <input type="text" name="username" id="" required><br>

                                <label for="">Owner Name:</label>
                                <input type="text" name="owner_name" id="" required><br>

                                <label for="">Gym Name:</label>
                                <input type="text" name="gym_name" id="" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="" required><br>

                                <label for="">Password:</label>
                                <input type="password" name="password" required><br>

                                <label for="">Gym Logo:</label><br>
                                <input type="file" name="file" id=""><br><br>

                                <label for="">Website link:</label><br>
                                <input type="url" name="web" id="name" >

                                <label for="">Social links:</label><br>
                                <input type="url" name="social" id="name" >

                                <label for="">Age:</label>
                                <input type="text" name="age" id="" required><br>

                                <label for="">Address:</label>
                                <input type="text" name="location" id="" required><br>

                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer Not to Say</option>
                                </select>

                                <label for="owner_contact">Gym Phone :</label>
                                <input type="number" name="owner_contact" id="owner_contact" required>

                                <label for="gym_contact">Your Phone *:</label>
                                <input type="number" name="gym_contact" id="gym_contact" >

                                
                                <label for="start_year">Start year :</label>
                                <input type="date" name="start_year" id="start_year" required>

                                <label for="age">Experience (Years):</label>
                                <input type="text" name="experience"  required>

                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                         </div>
                       </div> 
                       
            <div id="editOwnerFormModal" class="modal" style="display: none;">
                <div class="modal-content">
                    <h3>Edit Owner</h3>
                    <form id="editForm" method="POST" action="./gym/edit.php" enctype="multipart/form-data">
                        <input type="hidden" name="old_email" id="old_email">
                        <input type="hidden" name="old_username" id="old_username">

                        <label for="gym_username">Gym_username:</label>
                        <input type="text" name="gym_username" id="gym_username" required><br>

                        <label for="gym_name">Gym_name:</label>
                        <input type="text" name="gym_name" id="gym_name" required><br>

                        <input type="hidden" name="password" id="password"><br>

                        <label for="owner_name">Owner_name:</label>
                        <input type="text" name="owner_name" id="owner_name" required><br>

                        <label for="file">Gym Logo:</label><br>
                        <input type="file" name="file" id="file"><br>
                        <span id="fileName"></span><br><br>

                        <label for="email">Email :</label>
                        <input type="text" name="email" id="email" required><br>

                        <label for="age">Age :</label>
                        <input type="text" name="age" id="age" required><br>

                        <label for="gym_contact">Gym Contact:</label>
                        <input type="text" name="gym_contact" id="gym_contact" required><br>

                        <label for="owner_contact">Owner Contact:</label>
                        <input type="text" name="owner_contact" id="owner_contact" required><br>

                        <label for="location">Address:</label>
                        <input type="text" name="location" id="location" required><br>

                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" required>
                            <option value="" disabled selected>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="prefer not to say">Prefer Not to Say</option>
                        </select>

                        <label for="experience">Experience:</label>
                        <input type="text" name="experience" id="experience" required><br>

                        <label for="start_year">Start year:</label>
                        <input type="date" name="start_year" id="start_year" required><br>

                        <label for="web">Web:</label>
                        <input type="text" name="web" id="web" required><br>
                    
                        <label for="social">Social:</label>
                        <input type="text" name="social" id="social" required><br>

                        <input type="submit" value="Save">
                        <button type="button" onclick="closeEditModal()">Cancel</button>
                    </form>
                </div>
            </div>



            </div>


            
            <div class="descriptor" value="9">
                <h2>Instructors</h2>
                <hr>

                <div class="search-container">
                        <input type="text" id="searchQuery3" name="search" placeholder="Search by instructor name, instructor username, or email">
                    </div>

                    <div id="instructorResults">
                        <!-- Owners data will be displayed here -->
                </div>

                <button type="button" onclick="addInstructor()">Add</button>

                    <!-- Hidden Add Form (Modal) -->
                    <div id="addInstructorFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Add Instructor</h3>
                            <form id="addForm" method="POST" action="./instructors/add.php" enctype="multipart/form-data">
                                <input type="hidden" name="type" id="type" value="owner">
                                <input type="hidden" name="access" id="" value="admin">

                                <label for="">Gym Username:</label>
                                <input type="text" name="gym_username" id="" required><br>

                                <label for="">Trainer Username:</label>
                                <input type="text" name="trainer_username" id="" required><br>

                                <label for="">Trainer Name:</label>
                                <input type="text" name="trainer_name" id="" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="" required><br>

                                <label for="">Password:</label>
                                <input type="password" name="password" required><br>

                                <label for="">Profile picture:</label><br>
                                <input type="file" name="file" id=""><br><br>

                                <label for="">Age:</label>
                                <input type="text" name="age" id="" required><br>

                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer Not to Say</option>
                                </select><br>

                                <label for="">Address:</label>
                                <input type="text" name="location" id="" required><br>

                                <label for="">Social:</label>
                                <input type="url" name="social" id="social" required><br>

                                <label for="">Contact:</label>
                                <input type="number" name="contact" id="contact" required><br>

                                <label for="">Availability:</label>
                                <input type="text" name="availability" id="availability" required><br>

                                <label for="">Qualification:</label>
                                <input type="text" name="qualify" id="qualify" required><br>

                                <label for="">Experience (Years):</label>
                                <input type="text" name="experience" id="experience" required><br>

                                
                                <label for="">Special:</label>
                                <input type="text" name="special" id="qualify" required><br>

                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>

                      <!-- Hidden Edit Form (Modal) -->
                      <div id="editInstructorFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Instructor</h3>
                            <form id="addForm" method="POST" action="./instructors/edit.php" enctype="multipart/form-data">

                                <input type="hidden" name="gym_username" id="Gym_Username" >
                                <input type="hidden" name="old_trainer_username" id="old_trainer_username" >
                                <input type="hidden" name="old_email" id="old_Email" >
                                <input type="hidden" name="old_file" id="old_File" >

                                <label for="">Trainer Username:</label>
                                <input type="text" name="trainer_username" id="trainerUsername" required><br>

                                <label for="">Trainer Name:</label>
                                <input type="text" name="trainer_name" id="trainerName" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="_email" required><br>

                                <label for="">Password:</label>
                                <input type="password" name="_password" required ><br>

                                <label for="">Profile picture:</label><br>
                                <input type="file" name="file" id="_file"><br><br>

                                <label for="">Age:</label>
                                <input type="text" name="age" id="_age" required><br>

                                <label for="gender">Gender:</label>
                                <select name="gender" id="_gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer Not to Say</option>
                                </select><br>

                                <label for="">Address:</label>
                                <input type="text" name="location" id="_location" required><br>

                                <label for="">Social:</label>
                                <input type="url" name="social" id="_social" required><br>

                                <label for="">Contact:</label>
                                <input type="number" name="contact" id="_contact" required><br>

                                <label for="">Availability:</label>
                                <input type="text" name="availability" id="Availiblity" required><br>

                                <label for="">Qualification:</label>
                                <input type="text" name="qualify" id="Qualify" required><br>

                                <label for="">Experience (Years):</label>
                                <input type="text" name="experience" id="_experience" required><br>

                                
                                <label for="">Special:</label>
                                <input type="text" name="special" id="Special" required><br>

                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>
                    

            </div>




              
                    <div class="descriptor" value="10">
                        <h2>Admins</h2>
                        <hr>

                        <div class="search-container">
                            <input type="text" id="searchQuery4" name="search" placeholder="Search by admin name, admin username, or email">
                        </div>

                        <div id="adminResults">
                            <!-- admin data will be displayed here -->
                        </div>

                        <button type="button" onclick="addAdmin()">Add</button>

                        <!-- Hidden Add Form (Modal) -->
                        <div id="addAdminFormModal" class="modal" style="display: none;">
                            <div class="modal-content">
                                <h3>Add Admin</h3>
                                <form id="addForm" method="POST" action="./admins/add.php" enctype="multipart/form-data">
                                    <input type="hidden" name="type" id="type" value="owner">
                                    <input type="hidden" name="access" id="" value="admin">

                                    <label for="type">Type:</label>
                                    <select name="type" id="" required>
                                        <option value="super">Super</option>
                                        <option value="normal">Normal</option>
                                    </select><br>

                                    <label for="">Admin Username:</label>
                                    <input type="text" name="admin_username" id="" required><br>

                                    <label for="">Admin Name:</label>
                                    <input type="text" name="admin_name" id="" required><br>

                                    <label for="">Email:</label>
                                    <input type="email" name="email" id="" required><br>

                                    <label for="">Password:</label>
                                    <input type="password" name="password" required><br>

                                    <label for="">Profile picture:</label><br>
                                    <input type="file" name="file" id=""><br><br>

                                    <label for="">Age:</label>
                                    <input type="text" name="age" id="" required><br>

                                    <label for="gender">Gender:</label>
                                    <select name="gender" id="gender" required>
                                        <option value="" disabled selected>Select your gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="prefer not to say">Prefer Not to Say</option>
                                    </select><br>

                                    <label for="">Address:</label>
                                    <input type="text" name="location" id="" required><br>

                                    <label for="">Contact:</label>
                                    <input type="number" name="contact" id="contact" required><br>

                                    <button type="submit">Submit</button>
                                    <button type="button" onclick="closeEditModal()">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
               



        </div>
    </div> 
</body>
</html>
