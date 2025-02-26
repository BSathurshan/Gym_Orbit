<div class="in-content">

<div class="header">
        <div>

        <h2>Owners</h2>


        </div>
        </div>

<div class="in-in-content">

                <div class="search-container">
                        <input type="text" id="searchQuery2" name="search" placeholder="Search by gym name, gym username, or email">
                    </div>

                    <div id="ownerResults">
                        <!-- This is using gymRendered.php ( auto load ) -->
                </div>

                <button type="button" class="add" onclick="addOwner()">Add</button>


                 <!-- Hidden Add Form (Modal) -->
                 <div id="addOwnerFormModal" class="modal" style="display: none;">
                         <div class="modal-content">
                            <h3>Add Owner</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/admin/addOwner" enctype="multipart/form-data">
                            
                            <input type="hidden" name="type" id="type" value="owner" >
                            <input type="hidden" name="access" id="" value="admin" >

                                <label for="">Username:</label>
                                <input type="text" name="username" id="" required><br>

                                <label for="">Owner Name:</label>
                                <input type="text" name="owner_name" id="" required><br>

                                <label for="">Gym Name:</label>
                                <input type="text" name="gym_name" id="" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="" required><br>

                                <label for="">Password:</label>
                                <input type="password" name="" required><br>

                                <label for="">Gym Logo:</label><br>
                                <input type="file" name="file" id=""><br><br>

                                <label for="">Website link:</label><br>
                                <input type="url" name="web" id="" >

                                <label for="">Social links:</label><br>
                                <input type="url" name="social" id="" >

                                <label for="">Age:</label>
                                <input type="text" name="age" id="" required><br>

                                <label for="">Address:</label>
                                <input type="text" name="location" id="" required><br>

                                <label for="gender">Gender:</label>
                                <select name="gender" id="" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer Not to Say</option>
                                </select>

                                <label for="owner_contact">Gym Phone :</label>
                                <input type="number" name="owner_contact" required>

                                <label for="gym_contact">Your Phone *:</label>
                                <input type="number" name="gym_contact" >

                                
                                <label for="start_year">Start year :</label>
                                <input type="date" name="start_year" required>

                                <label for="age">Experience (Years):</label>
                                <input type="text" name="experience"  required>

                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                         </div>
                       </div> 
</div>
</div>
                       
            <div id="editOwnerFormModal" class="modal" style="display: none;">
                <div class="modal-content">
                    <h3>Edit Owner</h3>
                    <form id="editForm" method="POST" action="<?= ROOT ?>/admin/editOwner" enctype="multipart/form-data">
                        <input type="hidden" name="old_email" id="old_gym_email">
                        <input type="hidden" name="old_username" id="old_gym_username">

                        <label for="gym_username">Gym_username:</label>
                        <input type="text" name="gym_username" id="gym_username" required><br>

                        <label for="gym_name">Gym_name:</label>
                        <input type="text" name="gym_name" id="gym_name" required><br>

                        <input type="hidden" name="password" id="password"><br>

                        <label for="owner_name">Owner_name:</label>
                        <input type="text" name="owner_name" id="owner_name" required><br>

                        <label for="email">Email :</label>
                        <input type="text" name="email" id="gym_email" required><br>

                        <label for="age">Age :</label>
                        <input type="text" name="age" id="age" required><br>

                        <label for="gym_contact">Gym Contact:</label>
                        <input type="text" name="gym_contact" id="gym_contact" required><br>

                        <label for="owner_contact">Owner Contact:</label>
                        <input type="text" name="owner_contact" id="owner_contact" required><br>

                        <label for="location">Address:</label>
                        <input type="text" name="location" id="gym_location" required><br>

                        <label for="gender">Gender:</label>
                        <select name="gender" id="owner_gender" required>
                            <option value="" disabled selected>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="prefer not to say">Prefer Not to Say</option>
                        </select>

                        <label for="experience">Experience:</label>
                        <input type="text" name="experience" id="experience" required><br>

                        <label for="start_year">Start year:</label>
                        <input type="date" name="start_year" id="start_year" required><br>

                        <label for="web">Web:</label>
                        <input type="text" name="web" id="web" required><br>
                    
                        <label for="social">Social:</label>
                        <input type="text" name="social" id="social" required><br>

                        <input type="submit" value="Save">
                        <button type="button" onclick="closeEditModal()">Cancel</button>
                    </form>
                </div>
            </div>
