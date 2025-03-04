<div class="in-content">

<div class="header">
        <div>

        <h2>OtherAdmins</h2>


        </div>
        </div>

<div class="in-in-content">

    <div class="search-container">
        <input type="text" id="searchQuery4" name="search" placeholder="Search by admin name, admin username, or email">
    </div>

    <div id="adminResults">
        <!-- admin data will be displayed here -->
    </div>

    <button type="button" class="add" onclick="addAdmin()">Add</button>

    <!-- Hidden Add Form (Modal) -->
    <div id="addAdminFormModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h3>Add Admin</h3>
            <form id="addForm" method="POST" action="<?= ROOT ?>/admin/addAdmin" enctype="multipart/form-data">
                <input type="hidden" name="type" id="type" value="owner">
                <input type="hidden" name="access" id="" value="admin">

                <label for="type">Type:</label>
                <select name="type" id="" required>
                    <option value="super">Super</option>
                    <option value="normal">Normal</option>
                </select><br>

                <label for="">Admin Username:</label>
                <input type="text" name="admin_username" id="" required><br>

                <label for="">Admin Name:</label>
                <input type="text" name="admin_name" id="" required><br>

                <label for="">Email:</label>
                <input type="email" name="email" id="" required><br>

                <label for="">Password:</label>
                <input type="password" name="password" required><br>

                <label for="">Profile picture:</label><br>
                <input type="file" name="file" id=""><br><br>

                <label for="">Age:</label>
                <input type="text" name="age" id="" required><br>

                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="prefer not to say">Prefer Not to Say</option>
                </select><br>

                <label for="">Address:</label>
                <input type="text" name="location" id="" required><br>

                <label for="">Contact:</label>
                <input type="number" name="contact" id="contact" required><br>

                <button type="submit">Submit</button>
                <button type="button" onclick="closeEditModal()">Cancel</button>
            </form>
        </div>
    </div>
</div>
</div>