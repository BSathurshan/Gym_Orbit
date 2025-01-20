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

            <!-- Profile Section -->
            <div class="descriptor active" value="1">
                <h2>Profile</h2>
                <hr>
                <form id="profileForm" method="POST" action="./customize/update_profile.php">
                    <table>
                        
                        <tr>
                            <td>Owner Name</td>
                            <td><input type="text" name="name" value="<?php echo $owner_name; ?>" readonly></td>
                        </tr>
                        <tr></tr>
                            <td>Gym Name</td>
                            <td><input type="text" name="name" value="<?php echo $gym_name; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?php echo $email; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" value="<?php echo $owner_contact; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Gym Contact</td>
                            <td><input type="text" name="gym_phone" value="<?php echo $gym_contact; ?>" readonly></td>
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
                            <td>Address</td>
                            <td><input type="text" name="location" value="<?php echo $location; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Since</td>
                            <td><input type="text" name="start_year" value="<?php echo $start_year; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Joined</td>
                            <td><input type="text" name="joined" value="<?php echo $joined	; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Experience</td>
                            <td><input type="text" name="experience" value="<?php echo $experience ; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Website</td>
                            <td><input type="text" name="web" value="<?php echo $web ; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Social</td>
                            <td><input type="text" name="social" value="<?php echo $social ; ?>" readonly></td>
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
            </div> <!-- End of Profile Section -->


            <!-- Job Requested Section -->
            <div class="descriptor" value="2">
                <h2>Posts</h2>
                <hr>
                <div class="jobreq">


                <?php          

                    $owner = new Owner(); 
                    $post = $owner->get_posts($username); 

                    if (isset($post['found'])&&$post['found']=='yes') {
                    
                    while ($rowRequested = $post['result']->fetch_assoc()) {

                        echo "<table>";
                        echo "<tr><td><input type='text' value='{$rowRequested["title"]}' readonly></td></tr>";
                        echo "<img src='". ROOT . "/assets/images/posts/images/" . htmlspecialchars($rowRequested ["file"]) . "' width='200' title='" . htmlspecialchars($rowRequested ['file']) . "'>";

                        echo "<tr><td><p>{$rowRequested['details']}</p></td></tr>";
                        

                        // Add hidden input for the machine ID
                        echo "<input type='hidden' name='file' value='{$rowRequested['file']}'>";
                        echo "<input type='hidden' name='username' value='{$rowRequested['gym_username']}'>";
                        
                        echo "<td><button class='editBtn' onclick='postEdit(\"{$rowRequested['title']}\",
                        \"{$rowRequested['file']}\",\"{$rowRequested['details']}\",\"{$rowRequested['gym_username']}\",
                        \"{$rowRequested['id']}\")'> Edit </button>";
                        
                        echo "<button class='deleteBtn' onclick='postDelete(\"{$rowRequested['id']}\", 
                        \"{$rowRequested['gym_username']}\",\"{$rowRequested['file']}\", \"owner\")'>Delete</button> </td>";

                        
                        echo "</table>";
                        echo "<br>";    
                        

                    }
                    }
                    elseif(isset($post['found'])&&$post['found']=='no') {
                        echo "<p>No Posts found , add one!</p>";
                        }
                
                    echo "<button class='addBtn' onclick='postAdd()'> Add </button>";

                    ?>   

                            <!-- Hidden Edit Form (Modal) -->
                            <div id="editPostFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Post</h3>
                                    <form id="editForm" method="POST" action="<?= ROOT ?>/owner/editPost" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="gymUsernameE">
                                        <input type="hidden" name="id" id="idE">
                                        <input type="hidden" name="old_file_name" id="oldFilenameE">
                                        <input type="hidden" name="access" id="access" value="owner">

                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="editNewTitleE" required><br>

                                        <label for="file">Upload File:</label>
                                        <input type="file" name="file" id="editFile"><br>

                                        <label for="details">Details:</label>
                                        <textarea name="details" id="editNewDetailsE" rows="4" cols="50" required></textarea><br>

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>

                        <!-- Hidden Add Form (Modal) -->
                        <div id="addPostFormModal" class="modal" style="display: none;">
                         <div class="modal-content">
                            <h3>Add Post</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/addPost" enctype="multipart/form-data">
                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                                <input type="hidden" name="gym_name" id="gymName" value="<?= htmlspecialchars($gym_name) ?>">
                            
                                <label for="name">Title:</label>
                                <input type="text" name="title" id="addTitle" required><br>

                                <label for="file">Upload File:</label>
                                <input type="file" name="file" id="addFile"><br>

                                <label for="details">Details:</label>
                                <textarea name="details" id="addDetails" rows="4" cols="50" required></textarea><br>

                                <input type="submit" value="Add post">
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                         </div>
                       </div>    


                </div> 
            </div> 

            
            <div class="descriptor" value="3">
                <h2>Instructors</h2>
                <hr>
                <div class="fav">

                <button type="button" onclick="addInstructor()">Add</button>


                    <?php


                    $owner = new Owner(); 
                    $instructor = $owner->get_instructors($username); 
    
                    if (isset($instructor['found'])&&$instructor['found']=='yes') {
                        while ($rowRequested = $instructor['result']->fetch_assoc()) {
    
                            echo "<table>";
                            echo "<tr><td><img src='". ROOT . "/assets/images/instructor/profile/images/{$rowRequested['file']}' alt='Trainer Image' style='width:100px; height:auto;'></tr></td>";
                            echo "<tr><td>Name<td><input type='text' value='{$rowRequested['trainer_name']}' readonly></td></td></tr>";
                            echo "<tr><td>User Name<td><input type='text' value='{$rowRequested['trainer_username']}' readonly></td></td></tr>";
                            echo "<tr><td>Email<td><input type='text' value='{$rowRequested['email']}' readonly></td></td></tr>";
                            echo "<tr><td>Age<td><input type='text' value='{$rowRequested['age']}' readonly></td></td></tr>";
                            echo "<tr><td>Gender<td><input type='text' value='{$rowRequested['gender']}' readonly></td></td></tr>";
                            echo "<tr><td>Contact<td><input type='text' value='{$rowRequested['contact']}' readonly></td></td></tr>";
                            echo "<tr><td>Experience<td><input type='text' value='{$rowRequested['experience']}' readonly></td></td></tr>";
                            echo "<tr><td>Social<td><input type='text' value='{$rowRequested['social']}' readonly></td></td></tr>";
                            echo "<tr><td>Address<td><input type='text' value='{$rowRequested['location']}' readonly></td></td></tr>";
                            echo "<tr><td>Availibility<td><input type='text' value='{$rowRequested['availiblity']}' readonly></td></td></tr>";
                            echo "<tr><td>Qualifications<td><input type='text' value='{$rowRequested['qualify']}' readonly></td></td></tr>";
                            echo "<tr><td>Specialities<td><input type='text' value='{$rowRequested['special']}' readonly></td></td></tr>";
                            echo "</table>";
                            
                            echo "<button class='deleteBtn' onclick='instructorDelete(\"{$rowRequested['trainer_username']}\",\"{$rowRequested['email']}\",\"{$rowRequested['file']}\",\"owner\")'>Delete</button>";

                            echo "<button class='editBtn' onclick='instructorEdit
                            (\"{$rowRequested['trainer_username']}\",
                            \"{$rowRequested['trainer_name']}\",
                            \"{$rowRequested['email']}\",
                            \"{$rowRequested['age']}\",
                            \"{$rowRequested['gender']}\",
                            \"{$rowRequested['contact']}\",
                            \"{$rowRequested['experience']}\",
                            \"{$rowRequested['social']}\",
                            \"{$rowRequested['location']}\",
                            \"{$rowRequested['availiblity']}\",
                            \"{$rowRequested['qualify']}\",
                            \"{$rowRequested['special']}\",
                            \"{$rowRequested['file']}\")'>Edit</button>";


                            echo "<br>";    
                        
                        }
                        }
                        elseif(isset($instructor['found'])&&$instructor['found']=='no')  {
                            echo "<p>nothing found , add someone !</p>";
                            }
                    ?>


                    <!-- Hidden Add Form (Modal) -->
                    <div id="addInstructorFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Add Instructor</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/addInstructor" enctype="multipart/form-data">
                                <input type="hidden" name="type" id="type" value="owner">
                                <input type="hidden" name="access" id="" value="owner">

                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">

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
                                <select name="gender" id="" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer Not to Say</option>
                                </select><br>

                                <label for="">Address:</label>
                                <input type="text" name="location" id="" required><br>

                                <label for="">Social:</label>
                                <input type="url" name="social" id="" required><br>

                                <label for="">Contact:</label>
                                <input type="number" name="contact" id="" required><br>

                                <label for="">Availability:</label>
                                <input type="text" name="availability" id="" required><br>

                                <label for="">Qualification:</label>
                                <input type="text" name="qualify" id="" required><br>

                                <label for="">Experience (Years):</label>
                                <input type="text" name="experience" id="" required><br>

                                
                                <label for="">Special:</label>
                                <input type="text" name="special" id="" required><br>

                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>
                    


                       <!-- Hidden Edit Form (Modal) -->
                         <div id="editInstructorFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Instructor</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/editInstructor" enctype="multipart/form-data">
                                <input type="hidden" name="type" id="type" value="owner">
                                <input type="hidden" name="access" id="" value="owner">

                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                                <input type="hidden" name="old_trainer_username" id="old_trainer_username" >
                                <input type="hidden" name="old_email" id="old_email" >
                                <input type="hidden" name="old_file" id="old_file" >

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
                    

                </div> <!-- End of Job Accepted Container -->
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
                <h2>Reminders</h2>
                <hr>
                <?php

                    $owner = new Owner(); 
                    $reminders = $owner->get_reminders($username); 


                    if (isset($reminders['found'])&&$reminders['found']=='yes') {
                        while ($rowRequested = $reminders['result']->fetch_assoc()) {

                        echo "<table>";
                        echo "<tr><td><input type='text' value='{$rowRequested['message']}' readonly></td></tr>";
                        echo "<tr><td><input type='text' value='{$rowRequested['time']}' readonly></td></tr>";
                        echo "</table>";
                        echo "<br>";    
                    
                    }
                    }
                    elseif (isset($reminders['found'])&&$reminders['found']=='no') {
                        echo "<p>No Reminders!</p>";
                        }
                ?>
            </div> 

            <div class="descriptor" value="7">
                <h2>Materials</h2>
                <?php          

                    $owner = new Owner(); 
                    $materials = $owner->get_materials($username); 

                    if (isset($materials['found'])&&$materials['found']=='yes') {
                        while ($rowRequested = $materials['result']->fetch_assoc()) {

                            echo "<table>";

                              
                                    echo "<tr><td><h6>{$rowRequested['type']}</h6></td></tr>";

                                    
                                    echo "<tr><td><h6>{$rowRequested["title"]}</h6></td></tr>";

                                    echo "<tr><td><img src='" . ROOT . "/assets/images/materials/images/" . $rowRequested["file"] . "' width='200' title='" . $rowRequested['file'] . "'></td></tr>";
                                    echo "<tr><td><div style='width: 100%; white-space: pre-wrap; word-wrap: break-word;'>{$rowRequested['details']}</div></td></tr>";
                        

                                    
                                    
                                    echo "<td><button class='editBtn' onclick='materialEdit(\"{$rowRequested['type']}\",\"{$rowRequested['title']}\",\"{$rowRequested['file']}\",\"{$rowRequested['details']}\",\"{$rowRequested['gym_username']}\",\"{$rowRequested['id']}\")'> Edit </button>";
                                    echo "<button class='deleteBtn' onclick='materialDelete(\"{$rowRequested['id']}\", \"{$rowRequested['gym_username']}\",\"{$rowRequested['file']}\",\"owner\")'>Delete</button> </td>";

                                    echo "<hr>";

                                    echo "</table>";
                                    echo "<br>";    

                        }
                        }
                         elseif (isset($materials['found'])&&$materials['found']=='no') {
                            echo "<p>No Materials found , add one!</p>";
                            }

                        echo "<button class='addBtn' onclick='materialAdd()'> Add </button>";

                    ?>   


                                <!-- Hidden Edit Form (Modal) -->
                                <div id="editMaterialFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <h3>Edit Materials</h3>
                                <form id="editForm" method="POST" action="<?= ROOT ?>/owner/editMaterial" enctype="multipart/form-data">
                                    <input type="hidden" name="gym_username" id="gym_Username">
                                    <input type="hidden" name="id" id="_id">
                                    <input type="hidden" name="old_file_name" id="old_FileName">
                                    <input type="hidden" name="access" id="access" value="owner">


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

                                    <!-- Hidden Add Form (Modal) -->
                                    <div id="addMaterialFormModal" class="modal" style="display: none;">
                                        <div class="modal-content">
                                        <h3>Add Materials</h3>
                                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/addMaterials" enctype="multipart/form-data">
                                            <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                                            <input type="hidden" name="gym_name" id="gymName" value="<?= htmlspecialchars($gym_name) ?>">

                                            <label for="type">Type:</label>
                                            <select name="type" id="editType" required>
                                                <option value="Free">Free</option>
                                                <option value="Premium">Premium</option>
                                            </select><br>

                                            <label for="name">Title:</label>
                                            <input type="text" name="title" id="addTitle" required><br>

                                            <label for="file">Upload File:</label>
                                            <input type="file" name="file" id="addFile"><br>

                                            <label for="details">Details:</label>
                                            <textarea name="details" id="addDetails" rows="4" cols="50" required></textarea><br>

                                            <input type="submit" value="Add">
                                            <button type="button" onclick="closeEditModal()">Cancel</button>
                                            </form>
                                        </div>
                                    </div>    


                
            </div> 

            <div class="descriptor" value="8">
                <h2>Support</h2>
                <hr>

                <button class='editBtn' onclick="createTicket('<?php echo $gym_username; ?>')">Create Ticket</button>
                <!-- Hidden Edit Form (Modal) -->
                <div id="SupportFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <h3>Support</h3>
                                <form id="editForm" method="POST" action="<?= ROOT ?>/owner/getSupport" enctype="multipart/form-data">
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

            <div class="descriptor" value="9">
                <h2>Requests</h2>            
                <hr>

                <?php          

                    $owner = new Owner(); 
                    $requests = $owner->get_requests($username); 

                    if (isset( $requests['found'])&& $requests['found']=='yes') {
                        while ($rowRequested = $requests ['result']->fetch_assoc()) {

                                    echo "<table>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['name']}' readonly></td></tr>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['username']}' readonly></td></tr>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['trainer_name']}' readonly></td></tr>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['trainer_username']}' readonly></td></tr>";


                                    
                                    echo "<td><button class='editBtn' onclick='accept(\"$username\",\"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\",\"accept\")'> Accept </button>";

                                    echo "<button class='deleteBtn' onclick='reject(\"$username\",\"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\",\"reject\")'> Reject </button></td>";

                                    
                                    echo "</table>";
                                    echo "<br>";    

                                }
                                }
                                elseif (isset($requests['found'])&&$requests['found']=='no') {
                                    echo "<p>No instructors were requested </p>";
                                    }

                    ?>   

            </div> 

            <div class="descriptor" value="10">
                <h2>Machines</h2>
                <hr>
                        <?php        
                        
                            $owner = new Owner(); 
                            $machines = $owner->get_machines($username); 

                            if (isset( $machines['found'])&& $machines['found']=='yes') {
                                while ($rowRequested = $machines ['result']->fetch_assoc()) {

                                echo "<table>";
                                echo "<tr><td><h6>{$rowRequested['name']}</h6></td></tr>";
                                echo '<tr><td><img src="' . ROOT . '/assets/images/machines/' . $rowRequested["file"] . '" width="200" title="' . $rowRequested['file'] . '"></td>';

                                // Add hidden input for the machine ID
                                echo "<input type='hidden' name='file' value='{$rowRequested['file']}'>";
                                echo "<input type='hidden' name='username' value='{$rowRequested['gym_username']}'>";
                                
                                echo "<td><button class='editBtn' onclick='machineEdit(\"{$rowRequested['name']}\", \"{$rowRequested['file']}\", \"{$rowRequested['gym_username']}\")'>Edit</button>";

                                echo "<button class='deleteBtn' onclick='machineDelete(\"{$rowRequested['name']}\", \"{$rowRequested['file']}\", \"{$rowRequested['gym_username']}\")'>Delete</button></td>";

                                
                                echo "</table>";
                                echo "<br>";    
                
                            }
                            }
                            elseif (isset( $machines['found'])&& $machines['found']=='no') {
                                echo "<p>No Machines found , add one!</p>";
                                }
                        
                            echo "<button class='addBtn' onclick='machineAdd()'> Add </button>";

                        ?>   

                        <!-- Hidden Edit Form (Modal) -->
                            <div id="editFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Machine</h3>
                                    <form id="editForm" method="POST" action="<?= ROOT ?>/owner/editMachine" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="editGymUsername">
                                        <input type="hidden" name="old_name" id="editOldName">
                                        <input type="hidden" name="old_file" id="editOldfile">

                                        <label for="name">Machine Name:</label>
                                        <input type="text" name="name" id="editName" required><br>

                                        <label for="file">Upload Image:</label>
                                        <input type="file" name="file" id="editFile"><br>

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>


                        <!-- Hidden Add Form (Modal) -->
                        <div id="addFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Add Machine</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/addMachine" enctype="multipart/form-data">
                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                            
                                <label for="name">Machine Name:</label>
                                <input type="text" name="name" id="addName" required><br>

                                <label for="file">Upload Image:</label>
                                <input type="file" name="file" id="addFile"><br>

                                <input type="submit" value="Add">
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>    

            </div> 


            <div class="descriptor" value="11">
                <h2>Members</h2>
                <hr>

                <?php
                    $owner = new Owner(); 
                    $members = $owner->get_members($gym_username); 

                    if (isset( $members['found'])&& $members['found']=='yes') {
                        while ($user = $members ['result']->fetch_assoc()) {
                    
                        echo "<h4> <u>" . htmlspecialchars($user['name']) . "</u> </h5>";
                        echo "<h5>" . htmlspecialchars($user['age']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($user['gender']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($user['contact']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($user['location']) . "</h5>";
                        echo "<img src='". ROOT ."/assets/images//User/profile/images/" . htmlspecialchars($user["file"]) . "' width='200' title='" . htmlspecialchars($user['file']) . "'>";
        
                        echo "<br><button class='removeBtn' onclick='removeMember(\"$gym_username\",\"{$user['username']}\")'>Remove</button>";

                        echo "<hr>";
                    }

                } elseif (isset( $members['found'])&& $members['found']=='no') {
                    echo "There are no active members.";
                }
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
