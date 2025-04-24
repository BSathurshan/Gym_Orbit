<div class="in-content">

<div class="header">
        <div>

        <h2>Posts</h2>


        </div>
        </div>

<div class="in-in-content">

        <?php          

            $admin = new Admin(); 
            $posts = $admin->get_posts();
            
            echo "<div class='posts-container'>";

            if (isset($posts['found'])&&$posts['found']=='yes') {
                while ($post = $posts['result']->fetch_assoc()) {
                    echo "<div class='posts'>";
                    echo "<table>";
                    echo "<h4> <u>" . htmlspecialchars($post['gym_name']) . "</u> </h5>";
                    echo "<h5>" . htmlspecialchars($post['title']) . "</h5>";
                    
                    echo "<div class='postimage'>";
                    echo "<img src='" . htmlspecialchars(ROOT . "/assets/images/posts/images/" . $post["file"]) . "' width='200' title='" . htmlspecialchars($post["file"]) . "'>";
                    echo "</div>";

                    echo "<p>" . htmlspecialchars($post['details']) . "</p>";
                    
                    echo "<div class='postBtn'>";
                    echo "<td><button class='editBtn' onclick='postEdit(\"{$post['title']}\",\"{$post['file']}\",\"{$post['details']}\",\"{$post['gym_username']}\", \"{$post['id']}\")'> Edit </button>";
                    echo "<button class='deleteBtn' onclick='postDelete(\"{$post['id']}\",\"{$post['gym_username']}\",\"{$post['file']}\", \"admin\")'>Delete</button> </td>";
                    echo "</div>";

                    echo "</table>";
                    echo "<br>"; 
                    echo "</div>";   
                    
                }
                }
                elseif (isset($posts['found'])&&$posts['found']=='no') 
                {
                    echo "<p>No Posts found , add one!</p>";
                }

                echo "</div>";
                ?>   

</div>
</div>   
                          <!-- Hidden Edit Form (Modal) -->
                          <div id="editPostFormModal" class="modal" style="display: none;">
                                <div class="modal-content">
                                    <h3>Edit Post</h3>
                                    <form id="editForm" method="POST" action="<?= ROOT ?>/admin/editPost" enctype="multipart/form-data">
                                        <input type="hidden" name="gym_username" id="post_gymUsername">
                                        <input type="hidden" name="id" id="post_id">
                                        <input type="hidden" name="old_file_name" id="post_oldFilename">
                                        <input type="hidden" name="access" id="post_access" value="admin">

                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="post_editNewTitle" required><br>

                                        <label for="file">Upload File:</label>
                                        <input type="file" name="file" id="post_editFile"><br>

                                        <label for="details">Details:</label>
                                        <textarea name="details" id="post_editNewDetails" rows="4" cols="50" required></textarea><br>

                                        <input type="submit" value="Save">
                                        <button type="button" onclick="closeEditModal()">Cancel</button>
                                    </form>
                                </div>
                            </div>
