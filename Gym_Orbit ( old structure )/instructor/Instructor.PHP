<?php 

session_start();

require_once '../connection.php';

if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $trainer_username= $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];
    $email=$userDetails["email"];
    $gym_username=$userDetails["gym_username"]; 

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" type="text/css" href="./css/i-custom.css">
    <link rel="stylesheet" type="text/css" href="./css/buttons.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/1c1508aefb.js" crossorigin="anonymous"></script>
    <script src="1.js" defer></script>
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
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li>
                    <li class="tabs" value="3"><a><i class="bi bi-person-lines-fill"></i>Contacts</a></li>
                    <li class="tabs" value="4"><a><i class="bi bi-alarm-fill"></i>Reminder</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-chat-heart-fill"></i>Support</a></li>
                    <li class="tabs" value="7"><a><i class="bi bi-gear-fill"></i>Settings</a></li>
                </ul>
            </div> <!-- End of Menu -->
            </div>
        </div> <!-- End of Sidebar Menu -->
      </div>

        <!-- Main Content --> 
        <div class="content">
                        
        
            <h1>Welcome, <?php echo $trainer_username; ?>!</h1>

                     <?php
                        $queryRequested = "SELECT * FROM instructors 
                        WHERE trainer_username = '$trainer_username' 
                        AND gym_username = '$gym_username' 
                        AND email = '$email'";
                        $resultRequested = $conn->query($queryRequested);

                        if ($resultRequested->num_rows > 0) {

                            $row = $resultRequested->fetch_assoc();
                            $trainer_name=$row["trainer_name"];
                            $email=$row["email"];
                            $social=$row["social"];
                            $experience=$row["experience"];
                            $contact=$row["contact"];
                            $location=$row["location"];
                            $age=$row["age"];
                            $gender=$row["gender"];
                            $availiblity=$row["availiblity"];
                            $qualify=$row["qualify"];
                            $special=$row["special"];
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
                
                // Step 1: Fetch connected gyms
                $sql = "SELECT * FROM connects_instructors WHERE trainer_username= ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $trainer_username);
                $stmt->execute();
                $resultRequested = $stmt->get_result();

                $Usernames = [];
                while ($row = $resultRequested->fetch_assoc()) {
                    $Usernames[] = $row['user_name'];
                }
                $stmt->close();

                // Step 2: Fetch posts if connected to gyms
                if (!empty($Usernames)) {
                    $placeholders = implode(',', array_fill(0, count($Usernames), '?'));
                    $query2 = "SELECT * FROM user WHERE username IN ($placeholders)";
                    $stmt2 = $conn->prepare($query2);

                    $types = str_repeat('s', count($Usernames));
                    $stmt2->bind_param($types, ...$Usernames);

                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    // Step 3: Display posts
                    while ($userResults = $result->fetch_assoc()) {
                    
                        echo "<h4> <u>" . htmlspecialchars($userResults['name']) . "</u> </h5>";
                        echo "<img src='../User/profile/images/" . htmlspecialchars($userResults["file"]) . "' width='200' title='" . htmlspecialchars($userResults['file']) . "'>";
                        echo "<h5>" . htmlspecialchars($userResults['email']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($userResults['contact']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($userResults['age']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($userResults['gender']) . "</h5>";
                        echo "<hr>";
                    }
                    $stmt2->close();
                } else {
                    echo "There are no trainees.";
                }
                ?>


                </div>
            </div> 


            <div class="descriptor" value="4">
                <h2>Reminders</h2>
                <hr>
                 <?php

                    $queryRequested = "SELECT * FROM instructors_reminders
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


             <div class="descriptor" value="5">
                <h2>Materials</h2>
                <hr>
                <?php
      
                $sql = "SELECT * FROM materials WHERE gym_username= ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $gym_username );
                $stmt->execute();
                $result=$stmt->get_result();          

                if ($result->num_rows > 0) {
                    

                    // Step 3: Display posts
                    while ($materials = $result->fetch_assoc()) {
                    
                        
                        echo "<h4> <u>" . htmlspecialchars($materials['gym_name']) . "</u> </h5>";
                        echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";
                        echo "<img src='../Owner/materials/images/" . htmlspecialchars($materials["file"]) . "' width='200' title='" . htmlspecialchars($materials['file']) . "'>";
                        echo "<p>" . htmlspecialchars($materials['details']) . "</p>";
                        echo "<hr>";
                    }
                    $stmt->close();
                } else {
                    echo "You are not connected to any gyms.";
                }
                ?>


            </div> 


             <div class="descriptor" value="6">
                <h2>Support</h2>
                <hr>
            </div> 


             <div class="descriptor" value="7">
                <h2>Settings</h2>
                <hr>
            </div>




        </div> <!-- End of Main Content -->
    </div> <!-- End of Container -->
</body>
</html>
