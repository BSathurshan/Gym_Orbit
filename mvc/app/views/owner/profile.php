<h2>Profile</h2>
    <hr>
    <form id="profileForm" method="POST" action="./customize/update_profile.php">
        <table>
            
            <tr>
                <td>Owner Name</td>
                <td><input type="text" name="name" value="<?php echo $owner_name; ?>" readonly></td>
            </tr>
            <tr></tr>
                <td>Gym Name</td>
                <td><input type="text" name="name" value="<?php echo $gym_name; ?>" readonly></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>" readonly></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" value="<?php echo $owner_contact; ?>" readonly></td>
            </tr>
            <tr>
                <td>Gym Contact</td>
                <td><input type="text" name="gym_phone" value="<?php echo $gym_contact; ?>" readonly></td>
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
                <td>Address</td>
                <td><input type="text" name="location" value="<?php echo $location; ?>" readonly></td>
            </tr>
            <tr>
                <td>Since</td>
                <td><input type="text" name="start_year" value="<?php echo $start_year; ?>" readonly></td>
            </tr>
            <tr>
                <td>Joined</td>
                <td><input type="text" name="joined" value="<?php echo $joined	; ?>" readonly></td>
            </tr>
            <tr>
                <td>Experience</td>
                <td><input type="text" name="experience" value="<?php echo $experience ; ?>" readonly></td>
            </tr>
            <tr>
                <td>Website</td>
                <td><input type="text" name="web" value="<?php echo $web ; ?>" readonly></td>
            </tr>
            <tr>
                <td>Social</td>
                <td><input type="text" name="social" value="<?php echo $social ; ?>" readonly></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="hidden" name="password" value="<?php echo $password; ?>" readonly></td>
            </tr>

            <button type="button" onclick="editGymSchedule()">EditSchedule</button>

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

            <!-- Hidden Schedule Form (Modal) -->
            <div id="gymScheduleFormModal" class="modal" style="display: none;">
            <div class="modal-content">
                <h3>Edit Schedule</h3>
                <form id="timeForm" action="<?= ROOT ?>/owner/editGymSchedule" method="POST">
                
                <input type="hidden" name="gym_username" value="<?php echo $gym_username; ?>" >
                    
                    <div id="daysContainer1">
                        <!-- Days will be dynamically generated here -->
                    </div>
                    <button type="submit">Submit</button>
                    <button type="button" onclick="closeEditModal()">Cancel</button>
                </form>
            </div>
        </div>