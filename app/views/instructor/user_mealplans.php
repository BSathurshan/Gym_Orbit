<div class="in-content">

        <div class="header">
        <div>

        <h2>Assign Work-Out Plans</h2>

        </div>
        </div>

<div class="in-in-content">

                <?php
                
                echo "<div class='mealplan-container'>";


                 $instructor = new Instructor(); 
                 $workoutplanRequest= $instructor->getMealplanRequests($username); 

                 if ($workoutplanRequest['found'] == 'yes') {
                    while ($result = $workoutplanRequest['result']->fetch_assoc()) {

                        echo "<div class='mealplanRequest'>";

                        echo "<h4><u>" . htmlspecialchars($result['name']) . "</u></h4>";
                        echo "<div class='workoutplan_userimage'>
                        <img src='" . ROOT . "/assets/images/user/profile/images/" . 
                        htmlspecialchars($result['file'], ENT_QUOTES, 'UTF-8') . "'>
                        </div>";
                        echo "<h5>" . htmlspecialchars($result['email']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($result['contact']) . "</h5>";

                        // echo "<button onclick=\"assignWorkoutplan('$username', '{$result['username']}')\">Assign</button>";
                        echo "<button onclick=\"openWorkoutmodal('{$result['username']}')\">Assign</button>";

                        echo "</div>";

                    }

                }
                 
                else 
                {
                    echo "<p> No requests for now !</p>";
                }
      
                echo "</div>";


                ?>

</div>
</div>

<!-- Modal Container -->
<div id="workoutModal" style="display:none; position:fixed; top:10%; left:50%; transform:translateX(-50%); background:white; padding:20px; border:2px solid black; z-index:999;">
  <h2>Assign Workout Plan</h2>

  <form id="workoutForm" action="<?= ROOT ?>/instructor/save_workout" method="POST">

    <!-- Hidden input to hold the assigned user's username -->
    <input type="hidden" name="assigned_user" id="assigned_user">

    <!-- Days List -->
    <div id="daysContainer">
      <!-- Days will be injected by JS -->
    </div>

    <br>
    <button type="submit">Save Workout Plan</button>
    <button type="button" onclick="closeWorkoutmodal()">Cancel</button>
  </form>
</div>

<!-- Background overlay (optional) -->
<div id="overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:998;" onclick="closeWorkoutmodal()"></div>
