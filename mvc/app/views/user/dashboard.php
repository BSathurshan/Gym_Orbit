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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Dashboard</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/main.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/buttons.css">-->
    <!--<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/edit.css">-->
    
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/userDashboard.css"> 
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/progressTracker.css">
    <script src="<?= ROOT ?>/assets/js/user/user_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/user/user_2.js" defer></script>

    <style>
    
        

        @media (max-width: 768px) {
            #main-div {
                flex-direction: column;
            }
            #sidebar-div {
                width: 100%;
                height: 100px;
            }
            #bodyarea-div {
                flex: 1;
            }
        }
    </style>
</head>

<body>

    

    
    

    <!-- Main contetnt-->

    <div class="content">
        <!-- Dashboard -->
    <div class="descriptor active" value="1">
      <div class="header">
        <div>
          <h1>Dashboard</h1>
          <p><?php
            echo date("l, F j, Y"); // Outputs: Wednesday, December 18, 2024
            ?></p>
        </div>
      </div>

      <div class="top-section">
        <div class="card" style="background-color: transparent; color: #fff">
          <h2>Hello, <br> <?php echo $username; ?>!</h2>
        </div>
        <div class="card">
          <h2>Important Notices</h2>
        </div>
        <div class="card">
          <h2>Reminders</h2>
        </div>
      </div>
      <div class="main-content">
        <div class="card">
          <h2>Weekly Schedule</h2>
          <ul class="schedule">
            <li>
              <span> Monday </span>
              <span>
                <input type="checkbox" id="monday" />
                <label class="highlight" for="monday">
                  Leg day
                </label>
              </span>
            </li>
            <li>
              <span> Tuesday </span>
              <span>
                <input type="checkbox" id="tuesday" />
                <label class="highlight" for="tuesday"> Back day </label>
              </span>
            </li>
            <li>
              <span> Wednesday </span>
              <span>
                <input type="checkbox" id="wednesday" />
                <label class="highlight" for="wednesday"> Rest day </label>
              </span>
            </li>
            <li>
              <span> Thursday </span>
              <span>
                <input type="checkbox" id="thursday" />
                <label class="highlight" for="thursday"> Leg day </label>
              </span>
            </li>
            <li>
              <span> Friday </span>
              <span>
                <input type="checkbox" id="friday" />
                <label class="highlight" for="friday"> Arm day </label>
              </span>
            </li>
            <li>
              <span> Saturday </span>
              <span>
                <input type="checkbox" id="saturday" />
                <label class="highlight" for="saturday"> Rest day </label>
              </span>
            </li>
            <li>
              <span> Sunday </span>
              <span>
                <input type="checkbox" id="sunday" />
                <label class="highlight" for="sunday"> Leg day </label>
              </span>
            </li>
          </ul>
          <button class="edit-button">Edit Schedule</button>
        </div>
        <div class="card">
          <h2>Daily Nutrition</h2>
          <ul class="nutrition">
            <li>
              <span>
                <input type="checkbox" id="protein" />
                <label class="highlight" for="protein">
                  Protein
                </label>
              </span>
            </li>
            <li>
              <span>
                <input type="checkbox" id="carbs" />
                <label class="highlight" for="carbs"> Carbs </label>
              </span>
            </li>
            <li>
              <span>
                <input type="checkbox" id="healthy-fat" />
                <label class="highlight" for="healthy-fat"> Healthy Fat </label>
              </span>
            </li>
            <li>
              <span>
                <input type="checkbox" id="hydration" />
                <label class="highlight" for="hydration"> Hydration </label>
              </span>
            </li>
            <li>
              <span>
                <input type="checkbox" id="vitamins" />
                <label class="highlight" for="vitamins"> Vitamins </label>
              </span>
            </li>
            <li>
              <span>
                <input type="checkbox" id="medicine" />
                <label class="highlight" for="medicine"> Medicine </label>
              </span>
            </li>
            <li>
              <span>
                <input type="checkbox" id="sleep" />
                <label class="highlight" for="sleep"> Sleep </label>
              </span>
            </li>
          </ul>
          <button class="edit-button">Edit Schedule</button>
        </div>
        <div class="card">
          <h2>Progress</h2>
          <div class="progress-circle">
            <span> 70% </span>
          </div>
          <p>This Week</p>
        </div>
      </div>
    </div>

    


</body>
</html>
