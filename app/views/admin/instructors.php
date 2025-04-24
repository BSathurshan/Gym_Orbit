<div class="in-content">

<div class="header">
        <div>

        <h2>Instructors</h2>


        </div>
        <button type="button" class="add" onclick="addInstructor()">Add</button>
        </div>

<div class="in-in-content">

                <div class="search-container">
                        <input type="text" id="searchQuery3" name="search" placeholder="Search by instructor name, instructor username, or email">
                    </div>

                    <div id="instructorResults" class="instructorResults-container">
                        <!-- This is using instructorRenderer.php (auto load ) -->
                </div>

                    <!-- Hidden Add Form (Modal) -->
                    <div id="addInstructorFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Add Instructor</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/admin/addInstructor" enctype="multipart/form-data">
                                <input type="hidden" name="type" id="type" value="owner">
                                <input type="hidden" name="access" id="" value="admin">

                                <label for="">Gym Username:</label>
                                <input type="text" name="gym_username" id="" required><br>

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
</div>
</div>

                      <!-- Hidden Edit Form (Modal) -->
                      <div id="editInstructorFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Instructor</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/admin/editInstructor" enctype="multipart/form-data">

                                <input type="hidden" name="gym_username" id="Gym_Username" >
                                <input type="hidden" name="old_trainer_username" id="old_trainer_username" >
                                <input type="hidden" name="old_email" id="old_Email" >
                                <input type="hidden" name="old_file" id="old_File" >
                                <input type="hidden" name="access" id="" value="admin">

                                <label for="">Trainer Username:</label>
                                <input type="text" name="trainer_username" id="trainerUsername" required><br>

                                <label for="">Trainer Name:</label>
                                <input type="text" name="trainer_name" id="trainerName" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="_email" required><br>

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