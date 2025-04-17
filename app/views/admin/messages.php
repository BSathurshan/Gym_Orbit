<div class="in-content">

<div class="header">
        <div>

        <h2>Messages</h2>


        </div>
        </div>

<div class="in-in-content"> 
                    
                    <?php

                        $admin = new Admin(); 
                        $messages = $admin->get_messages(); 

                        if (isset($messages['found'])&&$messages['found']=='yes') {
                            while ($rowRequested = $messages['result']->fetch_assoc()) {

                                echo "<table>";
                                echo "<tr><td><input type='text' value='{$rowRequested['username']}' readonly></td></tr>";
                                echo "<tr><td><input type='text' value='{$rowRequested['issue']}' readonly></td></tr>";
                                echo "<tr><td><input type='text' value='{$rowRequested['message']}' readonly></td></tr>";
                                echo "<tr><td><input type='text' value='{$rowRequested['time']}' readonly></td></tr>";
                                echo "</table>"; 
                                echo "<button class='editBtn' onclick='replyMessage(\"{$rowRequested['username']}\",\"{$rowRequested['issue']}\",\"{$rowRequested['message']}\",\"{$rowRequested['time']}\",\"{$rowRequested['email']}\")'> Reply </button>";
                                echo "<button class='deleteBtn' onclick='messageDelete(\"{$rowRequested['username']}\",\"{$rowRequested['issue']}\",\"{$rowRequested['message']}\",\"{$rowRequested['time']}\")'>Delete</button>";
                                

                                echo "<br>";
                                echo "<br>";
                                echo "<br>";


                            
                            }
                            }
                            elseif (isset($messages['found'])&&$messages['found']=='no') 
                            {
                                echo "<p>No Reminders!</p>";
                            }
                        ?>

                </div>
                </div>

                <div id="replyMessageFormModal" class="modal" style="display: none;">
                <div class="modal-content">
                    <h3>Reply</h3>
                    <form id="editForm" method="POST" action="<?= ROOT ?>/admin/replyMessage" enctype="multipart/form-data">
                        <input type="hidden" name="username" id="gymUsername">
                        <input type="hidden" name="email" id="gymEmail">

                        <label for="issue">Issue:</label>
                        <input type="text" name="issue" id="editIssue" required><br><br>

                        <label for="message">Message:</label>
                        <input type="text" name="message" id="editMessage" required><br><br>

                        <button type="submit">Send</button>
                        <button type="button" onclick="closeReplyMessageModal()">Cancel</button>
                    </form>
                </div>
            </div>