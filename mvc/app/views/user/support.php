<div class="in-content">

<div class="header">
        <div>

        <h2>Support</h2>


        </div>
        </div>
<div class="in-in-content">
        <button class='editBtn' onclick="createTicket('<?php echo $username; ?>')">Create Ticket</button>
        <!-- Hidden Edit Form (Modal) -->
        <div id="SupportFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                        <h3>Support</h3>
                        <form id="editForm" method="POST" action="<?= ROOT ?>/user/getSupport" enctype="multipart/form-data">
                            <input type="hidden" name="username" id="USER_NAME">
                            <input type="hidden" name="access" value="instructor">
                            <input type="hidden" id="email" name="email" value='<?php echo $email; ?>' required>


                            <label for="title">Issue:</label>
                            <input type="text" name="issue" id="issue" required><br>

                            <label for="details">Details:</label>
                            <textarea name="details" id="details" rows="4" cols="50" required></textarea><br>

                            <input type="submit" value="Send">
                            <button type="button" onclick="closeEditModal()">Cancel</button>
                </form>
                </div>
        </div>
    </div>
</div>        