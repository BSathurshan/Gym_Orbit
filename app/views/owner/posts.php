<div class="in-content">

<div class="header">
<div>

<h2>Posts</h2>

</div>
     <button class='addBtn' onclick='postAdd()'> Add </button>
</div>


<div class="in-in-content">


<?php
    echo "<div class='posts-container'>";

    $owner = new Owner(); 
    $post = $owner->get_posts($username); 

    if (isset($post['found']) && $post['found'] == 'yes') {
        while ($rowRequested = $post['result']->fetch_assoc()) {
            echo "<div class='posts'>";

            echo "<h5><u>" . htmlspecialchars($rowRequested['title']) . "</u></h5>";

            echo "<div class='postimage'>";
            echo "<img src='" . ROOT . "/assets/images/posts/images/" . htmlspecialchars($rowRequested["file"]) . "'>";
            echo "</div>";

            echo "<p>" . htmlspecialchars($rowRequested['details']) . "</p>";

            echo "<input type='hidden' name='file' value='" . htmlspecialchars($rowRequested['file']) . "'>";
            echo "<input type='hidden' name='username' value='" . htmlspecialchars($rowRequested['gym_username']) . "'>";
           
            echo "<button class='editBtn' onclick='postEditing("
            . json_encode($rowRequested['file']) . ", "
            . json_encode($rowRequested['gym_username']) . ", "
            . json_encode($rowRequested['id'])
            . ")'>Edit</button>";
        
            
        
            echo "<button class='deleteBtn' onclick='postDelete(\"" 
                . htmlspecialchars($rowRequested['id'], ENT_QUOTES) . "\", \"" 
                . htmlspecialchars($rowRequested['gym_username'], ENT_QUOTES) . "\", \"" 
                . htmlspecialchars($rowRequested['file'], ENT_QUOTES) . "\", \"owner\")'>Delete</button>";

            echo "</div>"; // close posts div
        }
    } elseif (isset($post['found']) && $post['found'] == 'no') {
        echo "<p>No Posts found, add one!</p>";
    }

    echo "</div>"; // close posts-container div
?>

 
 </div>
</div>                          
<!-- Hidden Edit Form (Modal) -->
<div id="post-edit-modal" class="modal" style="display: none;">
    <div class="modal-content">
        <h3>Edit Post</h3>
        <form id="post-edit-form" method="POST" action="<?= ROOT ?>/owner/editPost" enctype="multipart/form-data">
            <input type="hidden" name="gym_username" id="post-edit-gym-username">
            <input type="hidden" name="id" id="post-edit-id">
            <input type="hidden" name="old_file_name" id="post-edit-old-filename">
            <input type="hidden" name="access" id="post-edit-access" value="owner">

            <label for="post-edit-title">Title:</label>
            <input type="text" name="title" id="post-edit-title" required><br>

            <label for="post-edit-file">Upload File:</label>
            <input type="file" name="file" id="post-edit-file"><br>

            <label for="post-edit-details">Details:</label>
            <textarea name="details" id="post-edit-details" rows="4" cols="50" required></textarea><br>

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

