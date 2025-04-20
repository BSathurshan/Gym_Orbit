<div class="in-content">

        <div class="header">
        <div>

        <h2>Materials</h2>

        </div>
        </div>

<div class="in-in-content">
                
                <?php

                $admin = new Admin(); 
                $material = $admin->get_materials($username); 

                echo "<div class='materials-container'>";

                if (isset($material['found'])&&$material['found']=='yes') {
                    while ($materials = $material['result']->fetch_assoc()) {
                    
                        echo "<div class='materials'>";
                        echo "<h4> <u>" . htmlspecialchars($materials['gym_name']) . "</u> </h5>";
                        echo "<tr><td>". htmlspecialchars($materials['type']) ." </td></tr>";
                        echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";

                        echo "<div class='matimage'>
                           <img src='" . ROOT . "/assets/images/materials/images/" . $materials["file"] . "' width='200' title='" . $materials['file'] . "'>
                        </div>"; 
                        echo "<p>" . htmlspecialchars($materials['details']) . "</p>";
                               
                
                        echo "<td><button class='editBtn' onclick='materialEdit(\"{$materials['type']}\",\"{$materials['title']}\",\"{$materials['file']}\",\"{$materials['details']}\",\"{$materials['gym_username']}\",\"{$materials['id']}\")'> Edit </button>";
                        echo "<button class='deleteBtn' onclick='materialDelete(\"{$materials['id']}\", \"{$materials['gym_username']}\", \"{$materials['file']}\", \"admin\")'>Delete</button> </td>";

                        echo "</div>";
                       
                    }
                } 
                elseif (isset($material['found'])&&$material['found']=='no') 
                {
                    echo "There are no Posts.";
                }

                echo "</div>";
                ?>

</div>
</div> 


                                <!-- Hidden Edit Form (Modal) -->
                                <div id="editMaterialFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <h3>Edit Materials</h3>
                                <form id="editForm" method="POST" action="<?= ROOT ?>/admin/editMaterial" enctype="multipart/form-data">
                                    <input type="hidden" name="gym_username" id="gym_Username">
                                    <input type="hidden" name="id" id="_id">
                                    <input type="hidden" name="old_file_name" id="old_FileName">
                                    <input type="hidden" name="access" id="access" value="admin">

                                    <label for="type">Type:</label>
                                    <select name="type" id="editType" required>
                                        <option value="Free">Free</option>
                                        <option value="Premium">Premium</option>
                                    </select><br>

                                    <label for="title">Title:</label>
                                    <input type="text" name="title" id="editTitle" required><br>

                                    <label for="file">Upload File:</label>
                                    <input type="file" name="file" id="editFile"><br>

                                    <label for="details">Details:</label>
                                    <textarea name="details" id="editDetails" rows="4" cols="50" required></textarea><br>

                                    <input type="submit" value="Save">
                                    <button type="button" onclick="closeEditModal()">Cancel</button>
                                </form>
                                </div>
                                </div>