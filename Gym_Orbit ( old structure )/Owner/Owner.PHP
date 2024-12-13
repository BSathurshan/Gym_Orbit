
<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" type="text/css" href="./css/o-custom.css">
    <link rel="stylesheet" type="text/css" href="./css/buttons.css">
    <link rel="stylesheet" type="text/css" href="./machines/edit.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <script src="1.js" defer></script>
    <script src="loader.js" defer></script>
</head>
<body>
    <!-- Header Section -->
    <header class="header">

        <i class="bi bi-house btn btn-primary"></i>

        <a href="../../index.html">
            <img src="./source/logo.svg" alt="logo" class="logo">
        </a>

        <nav class="navbar">
        <a href="../login/login.php" class="logout-btn">
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
            <div class="menu">
                <ul>
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-check"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-briefcase"></i>Posts</a></li>
                    <li class="tabs" value="3"><a><i class="bi-person-arms-up"></i>Instructors</a></li>
                    <li class="tabs" value="4"><a><i class="bi bi-calendar2-check"></i>Schedule</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-book"></i>Report</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-alarm"></i>Reminder</a></li>
                    <li class="tabs" value="7"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="8"><a><i class="bi bi-chat-heart"></i>Support</a></li>
                    <li class="tabs" value="9"><a><i class="bi bi-sliders"></i>Requests</a></li>
                    <li class="tabs" value="10"><a><i class="fa-solid fa-dumbbell"></i>Machines</a></li>
                </ul>
            </div> <!-- End of Menu -->
            </div>
          </div> 
        <!-- End of Sidebar Menu -->
       </div>

        <!-- Main Content -->
        <?php $gym_username=0; 
              $username=0;  
              $email='aa@' ?>

        <div class="content">
            <h1>Welcome, <?php echo $gym_username; ?>!</h1>

            <?php
             $queryRequested = "SELECT * FROM gym
             WHERE gym_username = '$gym_username' AND email ='$email'" ;
             $resultRequested = $conn->query($queryRequested);

             if ($resultRequested->num_rows > 0) {

                $row = $resultRequested->fetch_assoc();

                $owner_name=$row["owner_name"];
                $gym_name=$row["gym_name"];
                $owner_contact=$row["owner_contact"];
                $gym_contact=$row["gym_contact"];
                $age=$row["age"];
                $gender=$row["gender"];
                $location=$row["location"];
                $start_year=$row["start_year"];
                $joined=$row["joined"];
                $experience=$row["experience"];
                $web=$row["web"];
                $social =$row["social"];
                $password=$row["password"];

             }
            ?>

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

                    $queryRequested = "SELECT * FROM posts
                    WHERE gym_username = '$username'";
                    $resultRequested = $conn->query($queryRequested);

                    

                if ($resultRequested->num_rows > 0) {
                    
                    while ($rowRequested = $resultRequested->fetch_assoc()) {

                        echo "<table>";
                        echo "<tr><td><input type='text' value='{$rowRequested["title"]}' readonly></td></tr>";
                        echo "<tr><td><img src='posts/images/" . $rowRequested["file"] . "' width='200' 
                        title='" . $rowRequested['file'] . "'></td></tr>";
                        echo "<tr><td><input type='text' readonly style='resize: none; width: 100%;' 
                        value='{$rowRequested['details']}'></td></tr>";
                        

                        // Add hidden input for the machine ID
                        echo "<input type='hidden' name='file' value='{$rowRequested['file']}'>";
                        echo "<input type='hidden' name='username' value='{$rowRequested['gym_username']}'>";
                        
                        echo "<td><button class='editBtn' onclick='postEdit(\"{$rowRequested['title']}\",
                        \"{$rowRequested['file']}\",\"{$rowRequested['details']}\",\"{$rowRequested['gym_username']}\",
                        \"{$rowRequested['id']}\")'> Edit </button>";
                        
                        echo "<button class='deleteBtn' onclick='postDelete(\"{$rowRequested['id']}\", 
                        \"{$rowRequested['gym_username']}\",\"{$rowRequested['file']}\")'>Delete</button> </td>";

                        
                        echo "</table>";
                        echo "<br>";    
                        

                    }
                    }
                    else {
                        echo "<p>No Posts found , add one!</p>";
                        }
                
                    echo "<button class='addBtn' onclick='postAdd()'> Add </button>";

                    ?>   

                            <!-- Hidden Edit Form (Modal) -->
                            <div id="editPostFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Post</h3>
                                    <form id="editForm" method="POST" action="./posts/edit.php" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="gymUsername">
                                        <input type="hidden" name="id" id="id">
                                        <input type="hidden" name="old_file_name" id="oldFilename">

                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="editNewTitle" required><br>

                                        <label for="file">Upload File:</label>
                                        <input type="file" name="file" id="editFile"><br>

                                        <label for="details">Details:</label>
                                        <textarea name="details" id="editNewDetails" rows="4" cols="50" required></textarea><br>

                                        <input type="submit" value="Save Changes">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>

                        <!-- Hidden Add Form (Modal) -->
                        <div id="addPostFormModal" class="modal" style="display: none;">
                         <div class="modal-content">
                            <h3>Add Post</h3>
                            <form id="addForm" method="POST" action="./posts/add.php" enctype="multipart/form-data">
                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                                <input type="hidden" name="gym_name" id="gymName" value="<?= htmlspecialchars($gym_name) ?>">
                            
                                <label for="name">Title:</label>
                                <input type="text" name="title" id="addTitle" required><br>

                                <label for="file">Upload File:</label>
                                <input type="file" name="file" id="addFile"><br>

                                <label for="details">Details:</label>
                                <textarea name="details" id="addDetails" rows="4" cols="50" required></textarea><br>

                                <input type="submit" value="Add machine">
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

                    $queryRequested = "SELECT * FROM instructors
                    WHERE gym_username = '$username'";
                    $resultRequested = $conn->query($queryRequested);
    
                    if ($resultRequested->num_rows > 0) {
                        while ($rowRequested = $resultRequested->fetch_assoc()) {
    
                            echo "<table>";

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

                            echo "<button class='deleteBtn' onclick='instructorDelete(\"{$rowRequested['trainer_username']}\",\"{$rowRequested['email']}\",\"{$rowRequested['file']}\")'>Delete</button>";

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

                            echo "</table>";
                            echo "<br>";    
                        
                        }
                        }
                        else {
                            echo "<p>nothing found , add someone !</p>";
                            }
                    ?>


                    <!-- Hidden Add Form (Modal) -->
                    <div id="addInstructorFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Add Instructor</h3>
                            <form id="addForm" method="POST" action="./instructor/add.php" enctype="multipart/form-data">
                                <input type="hidden" name="type" id="type" value="owner">
                                <input type="hidden" name="access" id="" value="admin">

                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">

                                <label for="">Trainer Username:</label>
                                <input type="text" name="trainer_username" id="" required><br>

                                <label for="">Trainer Name:</label>
                                <input type="text" name="trainer_name" id="" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="" required><br>

                                <label for="">Password:</label>
                                <input type="password" name="" required><br>

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
                            <form id="addForm" method="POST" action="./instructor/edit.php" enctype="multipart/form-data">
                                <input type="hidden" name="type" id="type" value="owner">
                                <input type="hidden" name="access" id="" value="admin">

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

                $queryRequested = "SELECT * FROM owner_reminders
                WHERE id = '$username'";
                $resultRequested = $conn->query($queryRequested);

                if ($resultRequested->num_rows > 0) {
                    while ($rowRequested = $resultRequested->fetch_assoc()) {

                        echo "<table>";
                        echo "<tr><td><input type='text' value='{$rowRequested['message']}' readonly></td></tr>";
                        echo "<tr><td><input type='text' value='{$rowRequested['time']}' readonly></td></tr>";
                        echo "</table>";
                        echo "<br>";    
                    
                    }
                    }
                    else {
                        echo "<p>No Reminders!</p>";
                        }
                ?>
            </div> 

            <div class="descriptor" value="7">
                <h2>Materials</h2>
                

                <?php          

                        $queryRequested = "SELECT * FROM materials
                        WHERE gym_username = '$username'";
                        $resultRequested = $conn->query($queryRequested);



                        if ($resultRequested->num_rows > 0) {

                        while ($rowRequested = $resultRequested->fetch_assoc()) {

                            echo "<table>";

                                    echo "<tr><td><input type='text' value='{$rowRequested["type"]}' readonly></td></tr>";
                                    echo "<tr><td><input type='text' value='{$rowRequested["title"]}' readonly></td></tr>";
                                    echo "<tr><td><img src='materials/images/" . $rowRequested["file"] . "' width='200' title='" . $rowRequested['file'] . "'></td></tr>";
                                    echo "<tr><td><div style='width: 100%; white-space: pre-wrap; word-wrap: break-word;'>{$rowRequested['details']}</div></td></tr>";

                                    
                                    
                                    echo "<td><button class='editBtn' onclick='materialEdit(\"{$rowRequested['type']}\",\"{$rowRequested['title']}\",\"{$rowRequested['file']}\",\"{$rowRequested['details']}\",\"{$rowRequested['gym_username']}\",\"{$rowRequested['id']}\")'> Edit </button>";
                                    echo "<button class='deleteBtn' onclick='materialDelete(\"{$rowRequested['id']}\", \"{$rowRequested['gym_username']}\",\"{$rowRequested['file']}\")'>Delete</button> </td>";

                                    echo "<hr>";

                                    echo "</table>";
                                    echo "<br>";    

                        }
                        }
                        else {
                            echo "<p>No Machines found , add one!</p>";
                            }

                        echo "<button class='addBtn' onclick='materialAdd()'> Add </button>";

                    ?>   


                                <!-- Hidden Edit Form (Modal) -->
                                <div id="editMaterialFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <h3>Edit Materials</h3>
                                <form id="editForm" method="POST" action="./materials/edit.php" enctype="multipart/form-data">
                                    <input type="hidden" name="gym_username" id="gym_Username">
                                    <input type="hidden" name="id" id="_id">
                                    <input type="hidden" name="old_file_name" id="old_FileName">

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

                                    <input type="submit" value="Save Changes">
                                    <button type="button" onclick="closeEditModal()">Cancel</button>
                                </form>
                                </div>
                                </div>

                                    <!-- Hidden Add Form (Modal) -->
                                    <div id="addMaterialFormModal" class="modal" style="display: none;">
                                        <div class="modal-content">
                                        <h3>Add Materials</h3>
                                            <form id="addForm" method="POST" action="./materials/add.php" enctype="multipart/form-data">
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

                                            <input type="submit" value="Add machine">
                                            <button type="button" onclick="closeEditModal()">Cancel</button>
                                            </form>
                                        </div>
                                    </div>    


                
            </div> 

            <div class="descriptor" value="8">
                <h2>Support</h2>
                <hr>
            </div> 

            <div class="descriptor" value="9">
                <h2>Requests</h2>            
                <hr>

                <?php          

                    $queryRequested = "SELECT * FROM instructor_request
                    WHERE gym_username = '$username'";
                    $resultRequested = $conn->query($queryRequested);

                    

                            if ($resultRequested->num_rows > 0) {
                                
                                while ($rowRequested = $resultRequested->fetch_assoc()) {

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
                                else {
                                    echo "<p>No Machines found , add one!</p>";
                                    }

                    ?>   

            </div> 

            <div class="descriptor" value="10">
                <h2>Machines</h2>
                <hr>
                        <?php          

                            $queryRequested = "SELECT * FROM machines
                            WHERE gym_username = '$username'";
                            $resultRequested = $conn->query($queryRequested);

                             

                                    if ($resultRequested->num_rows > 0) {
                                        
                                        while ($rowRequested = $resultRequested->fetch_assoc()) {

                                            echo "<table>";
                                            echo "<tr><td><input type='text' value='{$rowRequested['name']}' readonly></td></tr>";
                                            echo '<tr><td><img src="machines/images/' . $rowRequested["file"] . '" width="200" title="' . $rowRequested['file'] . '"></td>';

                                            // Add hidden input for the machine ID
                                            echo "<input type='hidden' name='file' value='{$rowRequested['file']}'>";
                                            echo "<input type='hidden' name='username' value='{$rowRequested['gym_username']}'>";
                                            
                                            echo "<td><button class='editBtn' onclick='machineEdit(\"{$rowRequested['name']}\", \"{$rowRequested['file']}\", \"{$rowRequested['gym_username']}\")'>Edit</button>";

                                            echo "<button class='deleteBtn' onclick='machineDelete(\"{$rowRequested['name']}\", \"{$rowRequested['file']}\", \"{$rowRequested['gym_username']}\")'>Delete</button></td>";

                                            
                                            echo "</table>";
                                            echo "<br>";    
                            
                                        }
                                        }
                                        else {
                                            echo "<p>No Machines found , add one!</p>";
                                            }
                                    
                                        echo "<button class='addBtn' onclick='machineAdd()'> Add </button>";

                        ?>   

                        <!-- Hidden Edit Form (Modal) -->
                            <div id="editFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Machine</h3>
                                    <form id="editForm" method="POST" action="./machines/edit.php" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="editGymUsername">
                                        <input type="hidden" name="old_name" id="editOldName">
                                        <input type="hidden" name="old_file" id="editOldfile">

                                        <label for="name">Machine Name:</label>
                                        <input type="text" name="name" id="editName" required><br>

                                        <label for="file">Upload Image:</label>
                                        <input type="file" name="file" id="editFile"><br>

                                        <input type="submit" value="Save Changes">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>


                        <!-- Hidden Add Form (Modal) -->
                        <div id="addFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Machine</h3>
                            <form id="addForm" method="POST" action="./machines/add.php" enctype="multipart/form-data">
                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                            
                                <label for="name">Machine Name:</label>
                                <input type="text" name="name" id="addName" required><br>

                                <label for="file">Upload Image:</label>
                                <input type="file" name="file" id="addFile"><br>

                                <input type="submit" value="Add machine">
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>    

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
