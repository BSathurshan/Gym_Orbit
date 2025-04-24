<div class="in-content">

        <div class="header">
        <div>

        <h2>Instructors</h2>

        </div>
        <button class="addBtn" type="button" onclick="addInstructor()">Add</button>
        </div>

        <div class="in-in-content">
                <!-- <div class="fav"> -->  


                    <?php


                    $owner = new Owner(); 
                    $instructor = $owner->get_instructors($username); 

                    echo "<div class='instructor-table'>"; 
    
                    if (isset($instructor['found'])&&$instructor['found']=='yes') {
                        while ($rowRequested = $instructor['result']->fetch_assoc()) {
    
                    echo "<div class='row2'>"; 

                    echo "<div class='cell2'>
                    <div class='image'>
                        <img src='" . ROOT . "/assets/images/instructor/profile/images/" . 
                        htmlspecialchars($rowRequested['file'], ENT_QUOTES, 'UTF-8') . 
                        "'>
                    </div>
                    </div>";   

                    echo "<div class='cell2'><h5>Name: " . htmlspecialchars($rowRequested['trainer_name'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Username: " . htmlspecialchars($rowRequested['trainer_username'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Email: " . htmlspecialchars($rowRequested['email'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Age: " . htmlspecialchars($rowRequested['age'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Gender: " . htmlspecialchars($rowRequested['gender'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Contact: " . htmlspecialchars($rowRequested['contact'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Experience: " . htmlspecialchars($rowRequested['experience'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Social: " . htmlspecialchars($rowRequested['social'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Address: " . htmlspecialchars($rowRequested['location'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Availability: " . htmlspecialchars($rowRequested['availiblity'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Qualifications: " . htmlspecialchars($rowRequested['qualify'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    echo "<div class='cell2'><h5>Specialities: " . htmlspecialchars($rowRequested['special'], ENT_QUOTES, 'UTF-8') . "</h5></div>";
                    
                            
                            echo "<button class='deleteBtn' onclick='instructorDelete(\"{$rowRequested['trainer_username']}\",\"{$rowRequested['email']}\",\"{$rowRequested['file']}\",\"owner\")'>Delete</button>";

                            echo "<button class='deleteBtn' onclick='editInstructorSchedule(\"{$rowRequested['trainer_username']}\",\"{$rowRequested['trainer_name']}\",\"{$rowRequested['email']}\",\"$username\")'>Schedule</button>";


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


                            echo "</div>";    
                        
                        }
                        }
                        elseif(isset($instructor['found'])&&$instructor['found']=='no')  {
                            echo "<p>nothing found , add someone !</p>";
                            }

                            echo "</div>"; 

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

    </div>
</div>
                        <!-- Hidden Schedule Form (Modal) -->
                        <div id="instructorScheduleFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Schedule</h3>
                            <form id="timeForm" action="<?= ROOT ?>/owner/editInstructorSchedule" method="POST">
                            
                            <input type="hidden" name="gym_username" id="GYM_username" >
                            <input type="hidden" name="trainer_username" id="TRAINER_username" >
                            <input type="hidden" name="email" id="Email">
                            <input type="hidden" name="trainer_name" id="TRAINER_name" >
                                
                                <div id="instructor-day-schedule-form">
                                    <!-- Days will be dynamically generated here -->
                                </div>
                              <!-- This holds the schedule as a JSON string -->
                                <input type="hidden" name="instructor-schedule-data" id="instructor-schedule-json">

                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>
