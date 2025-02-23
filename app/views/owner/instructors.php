<div class="in-content">

        <div class="header">
        <div>

        <h2>Instructors</h2>

        </div>
        </div>

        <div class="in-in-content">
                <!-- <div class="fav"> -->

                <!-- <button type="button" onclick="addInstructor()">Add</button>  -->


                    <?php


                    $owner = new Owner(); 
                    $instructor = $owner->get_instructors($username); 
    
                    if (isset($instructor['found'])&&$instructor['found']=='yes') {
                        while ($rowRequested = $instructor['result']->fetch_assoc()) {
    
                            echo "<table>";
                            echo "<tr><td><img src='". ROOT . "/assets/images/instructor/profile/images/{$rowRequested['file']}' alt='Trainer Image' style='width:100px; height:auto;'></tr></td>";
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
                            echo "</table>";
                            
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


                            echo "<br>";    
                        
                        }
                        }
                        elseif(isset($instructor['found'])&&$instructor['found']=='no')  {
                            echo "<p>nothing found , add someone !</p>";
                            }
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

                        <!-- Hidden Schedule Form (Modal) -->
                        <div id="instructorScheduleFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Schedule</h3>
                            <form id="timeForm" action="<?= ROOT ?>/owner/editInstructorSchedule" method="POST">
                            
                            <input type="hidden" name="gym_username" id="GYM_username" >
                            <input type="hidden" name="trainer_username" id="TRAINER_username" >
                            <input type="hidden" name="email" id="Email">
                            <input type="hidden" name="trainer_name" id="TRAINER_name" >
                                
                                <div id="daysContainer2">
                                    <!-- Days will be dynamically generated here -->
                                </div>
                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>

                </div>

                        </div>