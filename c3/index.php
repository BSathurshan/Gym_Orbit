<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dynamic Calendar JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="schedule.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="schedule_script.js" defer></script>
  </head>
  <body>
    
    <div class="wrapper">
      
      <header>
        <p class="current-date"></p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
      </header>

      <div class="calendar">
        
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days"></ul>
      
      </div>
    </div>
    
    <div class="details">
          <div class="indicators">
              <button class="color-button" style="background-color: blue;" data-text="Opening soon" data-color="blue"></button>
              <button class="color-button" style="background-color: green;" data-text="Available" data-color="green"></button>
              <button class="color-button" style="background-color: yellow;" data-text="Crowded" data-color="yellow"></button>
              <button class="color-button" style="background-color: red;" data-text="Full" data-color="red"></button>
              <button class="color-button" style="background-color: black;" data-text="Holiday" data-color="black"></button>
      </div>


      <div class="machines">
        <h3>Available Machines</h3>
        <form action="" method="POST">
                <?php
                // echo'';
                $conn = new mysqli("localhost", "root", "", "gym_orbit");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM machines where gym_username	= 01 ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo '<div class="machine-row">';
                      echo '<label class="label">' . $row["name"] . ':</label>';
                      echo '<div class="value"><input type="number" name="'. $row["name"] .'" min="0" max="' . $row["total"] . '" value="' . $row["available"] . '"></div>';
                      echo '</div>';
                  }
              }
              else {
                    echo "<p>No machines available</p>";
                }

                $conn->close();
                ?>
                <button type="submit">Update Availability</button>
            </form>
      </div>

      <div class="bookings">
      </div>
    </div>

  </body>
</html>