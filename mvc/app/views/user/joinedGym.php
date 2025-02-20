<div class="in-content">

        <div class="header">
        <div>

        <h2>Joined Gyms</h2>

        </div>
        </div>

    <div class="in-in-content">

    <?php 
            $user = new User(); 
            $gymDetails = $user->joinedGyms($username); 

            echo "<div class='gym-table'>"; 
            if ($gymDetails['found'] == 'yes') {
                while ($rowRequested = $gymDetails['result']->fetch_assoc()) {
                    echo "<div class='row'>"; 
                    echo "<div class='cell'>
                    <div class='image'>
                        <img src='" . ROOT . "/assets/images/owner/profile/images/" . htmlspecialchars($rowRequested['file'], ENT_QUOTES, 'UTF-8') . "' alt='Profile Image'>
                    </div>
                </div>";
                            echo "<div class='cell'><p>" . $rowRequested['gym_name'] . "</p></div>";
                    echo "<div class='cell'><button onclick='leaveGym(\"{$rowRequested['gym_username']}\", \"$username\")'>Leave</button></div>";
                    echo "</div>";
                }
            } elseif ($gymDetails['found'] == 'no') {
                echo "<p>" . $gymDetails['message'] . "!</p>";
            }
            echo "</div>"; // Close the container
            ?>

        </div>
    </div>
    <br>
