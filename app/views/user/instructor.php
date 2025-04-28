<div class="in-content">
    <div class="header">
        <div>
            <h2>Instructors</h2>
        </div>
    </div>

    <div class="in-in-content">
        <?php 
            $user = new User(); 
            $instructorRequested = $user->instructor_Check($username); // My instructor
            echo "<div class='instructor-table'>"; 
            $myInstructorUsername = null;
            
            $instructorAvailable = $user->request_Instructor($username);

            if ($instructorAvailable['found'] == 'yes') {
                while ($instructor = $instructorAvailable['result']->fetch_assoc()) {

                    // Skip if this is the already requested instructor
                    if ($instructor['trainer_username'] === $myInstructorUsername) {
                        continue; // Skip the requested instructor
                    }

                    // Display full profile (image, name, gender, contact, email)
                    echo "<div class='row2'>"; 
                    echo "<div class='cell2'>
                            <div class='image'>
                                <img src='" . ROOT . "/assets/images/instructor/profile/images/" . 
                                htmlspecialchars($instructor['file'], ENT_QUOTES, 'UTF-8') . 
                                "'>
                            </div>
                            <div class='details'>
                                <div class='cell2'><h5>" . htmlspecialchars($instructor['trainer_name']) . "</h5></div>
                                <div class='cell2'><h5>" . htmlspecialchars($instructor['gender']) . "</h5></div>
                                <div class='cell2'><h5>" . htmlspecialchars($instructor['contact']) . "</h5></div>
                                <div class='cell2'><h5>" . htmlspecialchars($instructor['email']) . "</h5></div>
                            </div>
                          </div>";

                    echo "<div class='cell2'>
                            <div class='ratings'><h5>Ratings</h5></div>
                            <div>
                                <button type='button' 
                                    onclick='requestInstructor(   \"" . htmlspecialchars($username, ENT_QUOTES) . "\", 
                                                                \"" . htmlspecialchars($userDetails['name'], ENT_QUOTES) . "\", 
                                                                \"" . htmlspecialchars($instructor['gym_username'], ENT_QUOTES) . "\", 
                                                                \"" . htmlspecialchars($instructor['trainer_username'], ENT_QUOTES) . "\", 
                                                                \"" . htmlspecialchars($instructor['trainer_name'], ENT_QUOTES) . "\")'>
                                    Request
                                </button>
                            </div>
                          </div>";
                    echo "</div>"; 
                }
            } else {
                echo "<p>" . $instructorAvailable['message'] . "!</p>";
            }

            echo "</div>"; // End instructor-table
        ?>
    </div>
</div>





