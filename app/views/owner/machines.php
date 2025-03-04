<div class="in-content">

    <div class="header">
        <div>

         <h2>Machines</h2>

        </div>

    </div>

    <div class="in-in-content">
                        <?php        
                        
                            $owner = new Owner(); 
                            $machines = $owner->get_machines($username); 

                            if (isset( $machines['found'])&& $machines['found']=='yes') {
                                while ($rowRequested = $machines ['result']->fetch_assoc()) {

                                echo "<table>";
                                echo "<tr><td><h6>{$rowRequested['name']}</h6></td></tr>";
                                echo '<tr><td><img src="' . ROOT . '/assets/images/machines/' . $rowRequested["file"] . '" width="200" title="' . $rowRequested['file'] . '"></td>';

                                // Add hidden input for the machine ID
                                echo "<input type='hidden' name='file' value='{$rowRequested['file']}'>";
                                echo "<input type='hidden' name='username' value='{$rowRequested['gym_username']}'>";
                                
                                echo "<td><button class='editBtn' onclick='machineEdit(\"{$rowRequested['name']}\", \"{$rowRequested['file']}\", \"{$rowRequested['gym_username']}\")'>Edit</button>";

                                echo "<button class='deleteBtn' onclick='machineDelete(\"{$rowRequested['name']}\", \"{$rowRequested['file']}\", \"{$rowRequested['gym_username']}\")'>Delete</button></td>";

                                
                                echo "</table>";
                                echo "<br>";    
                
                            }
                            }
                            elseif (isset( $machines['found'])&& $machines['found']=='no') {
                                echo "<p>No Machines found , add one!</p>";
                                }
                        
                            echo "<button class='addBtn' onclick='machineAdd()'> Add </button>";

                        ?>   

                        <!-- Hidden Edit Form (Modal) -->
                            <div id="editFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Machine</h3>
                                    <form id="editForm" method="POST" action="<?= ROOT ?>/owner/editMachine" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="editGymUsername">
                                        <input type="hidden" name="old_name" id="editOldName">
                                        <input type="hidden" name="old_file" id="editOldfile">

                                        <label for="name">Machine Name:</label>
                                        <input type="text" name="name" id="editName" required><br>

                                        <label for="file">Upload Image:</label>
                                        <input type="file" name="file" id="editFile"><br>

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>


                        <!-- Hidden Add Form (Modal) -->
                        <div id="addFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Add Machine</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/addMachine" enctype="multipart/form-data">
                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                            
                                <label for="name">Machine Name:</label>
                                <input type="text" name="name" id="addName" required><br>

                                <label for="file">Upload Image:</label>
                                <input type="file" name="file" id="addFile"><br>

                                <input type="submit" value="Add">
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>    

                            </div>
                            </div>