<h2>Posts</h2>
                <hr>
                <div class="jobreq">


                <?php          

                    $owner = new Owner(); 
                    $post = $owner->get_posts($username); 

                    if (isset($post['found'])&&$post['found']=='yes') {
                    
                    while ($rowRequested = $post['result']->fetch_assoc()) {

                        echo "<table>";
                        echo "<tr><td><input type='text' value='{$rowRequested["title"]}' readonly></td></tr>";
                        echo "<img src='". ROOT . "/assets/images/posts/images/" . htmlspecialchars($rowRequested ["file"]) . "' width='200' title='" . htmlspecialchars($rowRequested ['file']) . "'>";

                        echo "<tr><td><p>{$rowRequested['details']}</p></td></tr>";
                        

                        // Add hidden input for the machine ID
                        echo "<input type='hidden' name='file' value='{$rowRequested['file']}'>";
                        echo "<input type='hidden' name='username' value='{$rowRequested['gym_username']}'>";
                        
                        echo "<td><button class='editBtn' onclick='postEdit(\"{$rowRequested['title']}\",
                        \"{$rowRequested['file']}\",\"{$rowRequested['details']}\",\"{$rowRequested['gym_username']}\",
                        \"{$rowRequested['id']}\")'> Edit </button>";
                        
                        echo "<button class='deleteBtn' onclick='postDelete(\"{$rowRequested['id']}\", 
                        \"{$rowRequested['gym_username']}\",\"{$rowRequested['file']}\", \"owner\")'>Delete</button> </td>";

                        
                        echo "</table>";
                        echo "<br>";    
                        

                    }
                    }
                    elseif(isset($post['found'])&&$post['found']=='no') {
                        echo "<p>No Posts found , add one!</p>";
                        }
                
                    echo "<button class='addBtn' onclick='postAdd()'> Add </button>";

                    ?>   

                            <!-- Hidden Edit Form (Modal) -->
                            <div id="editPostFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Post</h3>
                                    <form id="editForm" method="POST" action="<?= ROOT ?>/owner/editPost" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="gymUsernameE">
                                        <input type="hidden" name="id" id="idE">
                                        <input type="hidden" name="old_file_name" id="oldFilenameE">
                                        <input type="hidden" name="access" id="access" value="owner">

                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="editNewTitleE" required><br>

                                        <label for="file">Upload File:</label>
                                        <input type="file" name="file" id="editFile"><br>

                                        <label for="details">Details:</label>
                                        <textarea name="details" id="editNewDetailsE" rows="4" cols="50" required></textarea><br>

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>

                        <!-- Hidden Add Form (Modal) -->
                        <div id="addPostFormModal" class="modal" style="display: none;">
                         <div class="modal-content">
                            <h3>Add Post</h3>
                            <form id="addForm" method="POST" action="<?= ROOT ?>/owner/addPost" enctype="multipart/form-data">
                                <input type="hidden" name="gym_username" id="gymUsername" value="<?= htmlspecialchars($username) ?>">
                                <input type="hidden" name="gym_name" id="gymName" value="<?= htmlspecialchars($gym_name) ?>">
                            
                                <label for="name">Title:</label>
                                <input type="text" name="title" id="addTitle" required><br>

                                <label for="file">Upload File:</label>
                                <input type="file" name="file" id="addFile"><br>

                                <label for="details">Details:</label>
                                <textarea name="details" id="addDetails" rows="4" cols="50" required></textarea><br>

                                <input type="submit" value="Add post">
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                         </div>
                       </div>    


                </div> 