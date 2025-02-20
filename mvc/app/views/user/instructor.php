<div class="in-content">

        <div class="header">
        <div>

        <h2>Instructors</h2>

        </div>
        </div>

<div class="in-in-content">
    
    <?php 
        $user = new User(); 
        $instructorDetails = $user->instructor_Check($username);

        echo "<div class='instructor-table'>"; 

        if ($instructorDetails['found'] == 'yes') {
            while ($rowRequested = $instructorDetails['result']->fetch_assoc()) {
                    echo "<div class='row2'>"; 
                    echo "<div class='cell'><input type='text' value='" . htmlspecialchars($rowRequested['trainer_name']) . "' readonly></div>";
                    echo "</div>";
            }
        } else {
            $user = new User(); 
            $instructorDetails2 = $user->request_Instructor($username);

            if ($instructorDetails2['found'] == 'yes') {
                while ($instructor = $instructorDetails2['result']->fetch_assoc()) {
                    echo "<div class='row2'>"; 
                    echo "<div class='cell2'>
                    <div class='image'>
                        <img src='" . ROOT . "/assets/images/instructor/profile/images/" . 
                        htmlspecialchars($instructor['file'], ENT_QUOTES, 'UTF-8') . 
                        "'>
                    </div>
                  </div>";            
                    echo "<div class='cell2'><h5>" . htmlspecialchars($instructor['trainer_name']) . "</h5></div>";
                    echo "<div class='cell2'><h5>" . htmlspecialchars($instructor['age']) . "</h5></div>";
                    echo "<div class='cell2'><h5>" . htmlspecialchars($instructor['gender']) . "</h5></div>";
                    echo "<div class='cell2'><h5>" . htmlspecialchars($instructor['contact']) . "</h5></div>";
                    echo "<div class='cell2'><h5>" . htmlspecialchars($instructor['experience']) . "</h5></div>";
                    echo "<div class='cell2'><h5>" . htmlspecialchars($instructor['availiblity']) . "</h5></div>";
                    echo "<div class='cell2'><h5>" . htmlspecialchars($instructor['special']) . "</h5></div>";
                    echo "<div class='cell2'>
                        <button type='button' 
                        onclick='requestInstructor(   \"" . htmlspecialchars($username, ENT_QUOTES) . "\", 
                                                    \"" . htmlspecialchars($userDetails['name'], ENT_QUOTES) . "\", 
                                                    \"" . htmlspecialchars($instructor['gym_username'], ENT_QUOTES) . "\", 
                                                    \"" . htmlspecialchars($instructor['trainer_username'], ENT_QUOTES) . "\", 
                                                    \"" . htmlspecialchars($instructor['trainer_name'], ENT_QUOTES) . "\")'>
                        Request
                        </button>
                    </div>";
                    echo "</div>"; 
                }
            } else {
                echo "<p>" . $instructorDetails2['message'] . "!</p>";
            }
        }

        echo "</div>"; 
    ?>
</div>
</div>