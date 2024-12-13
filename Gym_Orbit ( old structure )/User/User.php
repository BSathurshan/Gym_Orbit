<?php 

session_start();

require_once '../connection.php';

if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $username = $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];
    $email=$userDetails["email"];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" type="text/css" href="./css/u-custom.css">
    <link rel="stylesheet" type="text/css" href="./css/buttons.css">
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
                    <li class="tabs activetab" value="1"><a><i class="bi bi-person-circle"></i>Profile</a></li>
                    <li class="tabs" value="2"><a><i class="bi bi-stars"></i>Gym</a></li>
                    <li class="tabs" value="3"><a><i class="bi-person-arms-up"></i>Instructors</a></li>
                    <li class="tabs" value="4"><a><i class="bi bi-calendar2-check-fill"></i>Schedule</a></li>
                    <li class="tabs" value="5"><a><i class="bi bi-credit-card-fill"></i>Payments</a></li>
                    <li class="tabs" value="6"><a><i class="bi bi-book-fill"></i>Report</a></li>
                    <li class="tabs" value="7"><a><i class="bi bi-alarm-fill"></i>Reminder</a></li>
                    <li class="tabs" value="8"><a><i class="bi bi-stack-overflow"></i>Materials</a></li>
                    <li class="tabs" value="9"><a><i class="bi bi-chat-heart-fill"></i>Support</a></li>
                    <li class="tabs" value="10"><a><i class="bi bi-gear-fill"></i>Search Gyms</a></li>
                    <li class="tabs" value="11"><a><i class="bi bi-chat-left-heart-fill"></i>Posts</a></li>

                </ul>
            </div> <!-- End of Menu -->
            </div>
        </div> <!-- End of Sidebar Menu -->
      </div>

        <!-- Main Content -->
        <div class="content">
            <h1>Welcome, <?php echo $username; ?>!</h1>

            <?php
             $queryRequested = "SELECT * FROM user
             WHERE username = '$username' AND email ='$email'" ;
             $resultRequested = $conn->query($queryRequested);

             if ($resultRequested->num_rows > 0) {

                $row = $resultRequested->fetch_assoc();
                $name=$row["name"];
                $contact=$row["contact"];
                $age=$row["age"];
                $gender=$row["gender"];
                $goals=$row["goals"];
                $password=$row["password"];

             }
            ?>

           
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

                $queryRequested = "SELECT * FROM connects_gym 
                WHERE username = '$username'";
                $resultRequested = $conn->query($queryRequested);

                if ($resultRequested->num_rows > 0) {
                    while ($rowRequested = $resultRequested->fetch_assoc()) {

                        echo "<table>";
                        echo "<tr><td><input type='text' value='{$rowRequested['gym_Name']}' readonly></td></tr>";
                        echo "<td><button onclick='leaveGym(\"{$rowRequested['gym_username']}\", \"$username\")'>Leave</button></td></tr>";
                        echo "</table>";
                        echo "<br>";    
                    
                    }
                    }
                    else {
                        echo "<p>You are not in any gyms, Join one !</p>";
                        }


                ?>
                </div> <!-- End of Job Request Container -->
            </div>


           
            <div class="descriptor" value="3">
                <h2>Instructors</h2>
                <hr>
                <div class="fav">
                <?php
                        $queryRequested = "SELECT * FROM connects_instructors WHERE user_name = ?";
                        $queryRequested2 = "SELECT * FROM connects_gym WHERE username = ?";

                        // Using prepared statements for both queries
                        $stmt1 = $conn->prepare($queryRequested);
                        $stmt1->bind_param("s", $username);
                        $stmt1->execute();
                        $resultRequested = $stmt1->get_result();

                        $stmt2 = $conn->prepare($queryRequested2);
                        $stmt2->bind_param("s", $username);
                        $stmt2->execute();
                        $resultRequested2 = $stmt2->get_result();

                        // Display instructors
                        if ($resultRequested->num_rows > 0) {
                            while ($rowRequested = $resultRequested->fetch_assoc()) {
                                echo "<table>";
                                echo "<tr><td><input type='text' value='" . htmlspecialchars($rowRequested['trainer_name']) . "' readonly></td></tr>";
                                echo "</table>";
                                echo "<br>";
                            }
                        }

                        // Display gym instructors
                        if ($resultRequested2->num_rows > 0) {
                            $gymUsernames = [];
                            while ($row = $resultRequested2->fetch_assoc()) {
                                $gymUsernames[] = $row['gym_username'];
                            }

                            if (!empty($gymUsernames)) {
                                $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
                                $query2 = "SELECT * FROM instructors WHERE gym_username IN ($placeholders)";
                                $stmt3 = $conn->prepare($query2);

                                $types = str_repeat('s', count($gymUsernames));
                                $stmt3->bind_param($types, ...$gymUsernames);

                                $stmt3->execute();
                                $result = $stmt3->get_result();

                                while ($instructor = $result->fetch_assoc()) {
                                    echo "<h5>" . htmlspecialchars($instructor['trainer_name']) . "</h5>";
                                    echo "<img src='../instructor/profile/images/" . htmlspecialchars($instructor['file']) . "' width='200' title='" . htmlspecialchars($instructor['file']) . "'>";
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
                                $stmt3->close();
                            }
                        } else {
                            echo "<p>Nothing found!</p>";
                        }

                        $stmt1->close();
                        $stmt2->close();
                        ?>

                </div> <!-- End of Job Accepted Container -->
            </div>

            <div class="descriptor" value="4">
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

                $queryRequested = "SELECT * FROM user_reminders
                WHERE username = '$username'";
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

            <div class="descriptor" value="8">
                <h2>Materials</h2>
                <hr>

                <?php
                
                // Step 1: Fetch connected gyms
                $sql = "SELECT * FROM connects_gym WHERE username= ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $resultRequested = $stmt->get_result();

                $gymUsernames = [];
                while ($row = $resultRequested->fetch_assoc()) {
                    $gymUsernames[] = $row['gym_username'];
                }
                $stmt->close();

                // Step 2: Fetch posts if connected to gyms
                if (!empty($gymUsernames)) {
                    $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
                    $query2 = "SELECT * FROM materials WHERE gym_username IN ($placeholders)";
                    $stmt2 = $conn->prepare($query2);

                    $types = str_repeat('s', count($gymUsernames));
                    $stmt2->bind_param($types, ...$gymUsernames);

                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    // Step 3: Display posts
                    while ($materials = $result->fetch_assoc()) {
                    
                        echo "<h4> <u>" . htmlspecialchars($materials['gym_name']) . "</u> </h5>";
                        echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";
                        echo "<img src='../Owner/materials/images/" . htmlspecialchars($materials["file"]) . "' width='200' title='" . htmlspecialchars($materials['file']) . "'>";
                        echo "<p>" . htmlspecialchars($materials['details']) . "</p>";
                        echo "<hr>";
                    }
                    $stmt2->close();
                } else {
                    echo "You are not connected to any gyms.";
                }
                ?>

            </div> 
         

            <div class="descriptor" value="9">
                <h2>Support</h2>
                <hr>
            </div> 


            <div class="descriptor" value="11">
                <h2>Posts</h2>
                <hr>               
                <?php
                
                // Step 1: Fetch connected gyms
                $sql = "SELECT * FROM connects_gym WHERE username= ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $resultRequested = $stmt->get_result();

                $gymUsernames = [];
                while ($row = $resultRequested->fetch_assoc()) {
                    $gymUsernames[] = $row['gym_username'];
                }
                $stmt->close();

                // Step 2: Fetch posts if connected to gyms
                if (!empty($gymUsernames)) {
                    $placeholders = implode(',', array_fill(0, count($gymUsernames), '?'));
                    $query2 = "SELECT * FROM posts WHERE gym_username IN ($placeholders)";
                    $stmt2 = $conn->prepare($query2);

                    $types = str_repeat('s', count($gymUsernames));
                    $stmt2->bind_param($types, ...$gymUsernames);

                    $stmt2->execute();
                    $result = $stmt2->get_result();

                    // Step 3: Display posts
                    while ($post = $result->fetch_assoc()) {
                    
                        echo "<h4> <u>" . htmlspecialchars($post['gym_name']) . "</u> </h5>";
                        echo "<h5>" . htmlspecialchars($post['title']) . "</h5>";
                        echo "<img src='../Owner/posts/images/" . htmlspecialchars($post["file"]) . "' width='200' title='" . htmlspecialchars($post['file']) . "'>";
                        echo "<p>" . htmlspecialchars($post['details']) . "</p>";
                        echo "<hr>";
                    }
                    $stmt2->close();
                } else {
                    echo "You are not connected to any gyms.";
                }
                ?>
            </div>

            <div class="descriptor" value="10">
                <h2>Search Gyms</h2>
                <hr>
                <div class="search-container">
                    <input type="text" id="searchQuery2" name="search" placeholder="Search by gym name, gym username, or email">
                    <input type="hidden" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>">
                    <input type="hidden" id="name" name="name" value="<?php echo htmlspecialchars($userDetails['name']); ?>">
                </div>

                
                <div id="gymResults">
                        <!-- Gyms data will be displayed here -->
                </div>
            </div> 
       
        </div> <!-- End of Main Content --> 
    </div> <!-- End of Container -->
</body>
</html>
