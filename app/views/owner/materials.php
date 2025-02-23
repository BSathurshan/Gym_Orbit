<div class="in-content">

    <div class="header">
        <div>


        <h2>Materials</h2>

</div>

</div>

<div class="in-in-content">
                <?php          

                    $owner = new Owner(); 
                    $materials = $owner->get_materials($username); 

                    if (isset($materials['found'])&&$materials['found']=='yes') {
                        while ($rowRequested = $materials['result']->fetch_assoc()) {

                            echo "<table>";

                              
                                    echo "<tr><td><h6>{$rowRequested['type']}</h6></td></tr>";

                                    
                                    echo "<tr><td><h6>{$rowRequested["title"]}</h6></td></tr>";

                                    echo "<tr><td><img src='" . ROOT . "/assets/images/materials/images/" . $rowRequested["file"] . "' width='200' title='" . $rowRequested['file'] . "'></td></tr>";
                                    echo "<tr><td><div style='width: 100%; white-space: pre-wrap; word-wrap: break-word;'>{$rowRequested['details']}</div></td></tr>";
                        

                                    
                                    
                                    echo "<td><button class='editBtn' onclick='materialEdit(\"{$rowRequested['type']}\",\"{$rowRequested['title']}\",\"{$rowRequested['file']}\",\"{$rowRequested['details']}\",\"{$rowRequested['gym_username']}\",\"{$rowRequested['id']}\")'> Edit </button>";
                                    echo "<button class='deleteBtn' onclick='materialDelete(\"{$rowRequested['id']}\", \"{$rowRequested['gym_username']}\",\"{$rowRequested['file']}\",\"owner\")'>Delete</button> </td>";

                                    echo "<hr>";

                                    echo "</table>";
                                    echo "<br>";    

                        }
                        }
                         elseif (isset($materials['found'])&&$materials['found']=='no') {
                            echo "<p>No Materials found , add one!</p>";
                            }

                        echo "<button class='addBtn' onclick='materialAdd()'> Add </button>";

                    ?>   


                                <!-- Hidden Edit Form (Modal) -->
                                <div id="editMaterialFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                <h3>Edit Materials</h3>
                                <form id="editForm" method="POST" action="<?= ROOT ?>/owner/editMaterial" enctype="multipart/form-data">
                                    <input type="hidden" name="gym_username" id="gym_Username">
                                    <input type="hidden" name="id" id="_id">
                                    <input type="hidden" name="old_file_name" id="old_FileName">
                                    <input type="hidden" name="access" id="access" value="owner">


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

                                    <!-- Hidden Add Form (Modal) -->
                                    <div id="addMaterialFormModal" class="modal" style="display: none;">
                                        <div class="modal-content">
                                        <h3>Add Materials</h3>
                                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/addMaterials" enctype="multipart/form-data">
                                            <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                                            <input type="hidden" name="gym_name" id="gymName" value="<?= htmlspecialchars($gym_name) ?>">

                                            <label for="type">Type:</label>
                                            <select name="type" id="editType" required>
                                                <option value="Free">Free</option>
                                                <option value="Premium">Premium</option>
                                            </select><br>

                                            <label for="name">Title:</label>
                                            <input type="text" name="title" id="addTitle" required><br>

                                            <label for="file">Upload File:</label>
                                            <input type="file" name="file" id="addFile"><br>

                                            <label for="details">Details:</label>
                                            <textarea name="details" id="addDetails" rows="4" cols="50" required></textarea><br>

                                            <input type="submit" value="Add">
                                            <button type="button" onclick="closeEditModal()">Cancel</button>
                                            </form>
                                        </div>
                                    </div>   
                                    
                                    </div>
                        </div>

