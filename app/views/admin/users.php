<div class="in-content">

<div class="header">
        <div>

        <h2>Users</h2>


        </div>
        <button type="button" class="add" onclick="addUser()">Add</button>
        </div>

<div class="in-in-content">

            <div class="search-container">
                <input type="text" id="searchQuery" name="search" placeholder="Search by name, username, or email">
            </div>

        <div id="userResults" class="userResults-container">
                <!-- This is using userRenderer.php ( aduto load ) -->
        </div>


                            <!-- Hidden Edit Form (Modal) -->
                            <div id="editUserFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit User</h3>
                                    <form id="editForm" method="POST" action="<?= ROOT ?>/admin/editUser" enctype="multipart/form-data">
                                        <input type="hidden" name="old_email" id="old_email">
                                        <input type="hidden" name="old_username" id="old_username">

                                        <label for="username">Username:</label>
                                        <input type="text" name="username" id="username" required><br>

                                        <label for="email">Email:</label>
                                        <input type="text" name="email" id="email" required><br>

                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" required><br>

                                        <label for="contact">Contact:</label>
                                        <input type="text" name="contact" id="contact" required><br>

                                        <label for="address">Addres:</label>
                                        <input type="text" name="location" id="location" required><br>
                                        

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>
</div>
</div>



                        <!-- Hidden Add Form (Modal) -->
                        <div id="addUserFormModal" class="modal" style="display: none;">
                         <div class="modal-content">
                            <h3>Add User</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/admin/addUser" enctype="multipart/form-data">
                            
                            <input type="hidden" name="type" id="type" value="user" >
                            <input type="hidden" name="access" id="" value="admin" >

                                <label for="">Username:</label>
                                <input type="text" name="username" id="" required><br>

                                <label for="">Name:</label>
                                <input type="text" name="name" id="" required><br>

                                <label for="">Email:</label>
                                <input type="email" name="email" id="" required><br>

                                <label for="">Password:</label>
                                <input type="password" name="password" required><br>

                                <label for="">Profile image:</label><br>
                                <input type="file" name="file" id=""><br><br>

                                <label for="">Age:</label>
                                <input type="text" name="age" id="" required><br>

                                <label for="">Gender:</label>
                                <select name="gender" id="gender" required>
                                    <option value="" disabled selected>Select your gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer not to say">Prefer Not to Say</option>
                                </select>

                                <label for="">Contact:</label>
                                <input type="text" name="contact" id="" required><br>

                                <label for="">Address:</label>
                                <input type="text" name="location" id="" required><br>

                                <label for="">Goals:</label>
                                <select name="goalChoice" id="" required>
                                    <option value="" disabled selected>Select main goal</option>
                                    <option value="strength">Strength </option>
                                    <option value="physic">Physic</option>
                                    <option value="endurance">Endurance</option>
                                </select>
                                <br>

                                <label for="">Achieve :</label>
                                <select name="achieveChoice" id="" required>
                                    <option value="" disabled selected>Select  achieve</option>
                                    <option value="loose weight">Loose weight </option>
                                    <option value="build muscle">Build muscle</option>
                                </select>
                                <br>

                                <label for="">Active mode:</label>
                                <select name="activeMode" id="activeMode" required>
                                    <option value="" disabled selected>Select your active mode</option>
                                    <option value="full">Full Time </option>
                                    <option value="part">Part Time</option>
                                    <option value="temporary">Temporary</option>
                                    <option value="not sure">Not sure</option>
                                </select>
                                <br>

                                <label for="health">Any health concerns *:</label>
                                <input type="text" name="health" id="health" >


                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>

                            </form>
                         </div>
                       </div>   