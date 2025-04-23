<div class="in-content">

<div class="header">
        <div>

        <h2>Messages</h2>


        </div>
        </div>

<div class="in-in-content"> 
                    
                    <?php

                        $type = $_SESSION["userDetails"]["type"] ?? null;

                        $admin = new Admin(); 
                        $messages = $admin->get_messages(); 

                        if (isset($messages['found'])&&$messages['found']=='yes') {
                            echo "<div class='message-wrapper'>";
                            while ($rowRequested = $messages['result']->fetch_assoc()) {

                                $status=$rowRequested['status'];

                                echo "<div class='message-card'>";
                                echo "<span class='child mid'>" . htmlspecialchars($rowRequested['email']) . "</span>";
                                echo "<span class='child bottom'>" . htmlspecialchars($rowRequested['time']) . "</span>";
                                echo "<span class='child username' style='display: none;'>" . htmlspecialchars($rowRequested['username']) . "</span>";
                                echo "<span class='child issue' style='display: none;'>" . htmlspecialchars($rowRequested['issue']) . "</span>";
                                echo "<span class='child message' style='display: none;'>" . htmlspecialchars($rowRequested['message']) . "</span>";
                                echo "<span class='child message' id='reply-status' style='display: none;'>" . htmlspecialchars($rowRequested['status']) . "</span>";

                                if($status == 'solved') {
                                    echo "<div class='status-icons'>";
                                    echo "<span >✅</span>";
                                    if($type == 'super') {
                                        echo "<span class='support-closed' 
                                        onclick=\"confirmCloseSupport('" . htmlspecialchars($rowRequested['username']) . "',
                                                                      '" . htmlspecialchars($rowRequested['time']) . "')\">❌</span>";
                                    }
                                    echo "</div>";
                                }
                                

                                echo "</div>";
                                

                            // echo "<div class='reply-card' style='display: none;'>";
                            // echo "<span class='child'>" . htmlspecialchars($rowRequested['username']) . "</span>";
                            // echo "<span class='child'>" . htmlspecialchars($rowRequested['email']) . "</span>";
                            // echo "<span class='child'>" . htmlspecialchars($rowRequested['issue']) . "</span>";
                            // echo "<span class='child'>" . htmlspecialchars($rowRequested['message']) . "</span>";
                            // echo "<span class='child'>" . htmlspecialchars($rowRequested['time']) . "</span>";
                            
                            // echo "<button class='editBtn' onclick='replyMessage(\"{$rowRequested['username']}\",\"{$rowRequested['issue']}\",\"{$rowRequested['message']}\",\"{$rowRequested['time']}\",\"{$rowRequested['email']}\")'> Reply </button>";
                            // echo "</div>";
                                                            }
                            echo "</div>";
                            }
                            elseif (isset($messages['found'])&&$messages['found']=='no') 
                            {
                                echo "<p>No Reminders!</p>";
                            }
                        ?>

                </div>
                </div>

                <!-- <div id="replyMessageFormModal" class="modal" style="display: none;">
                <div class="modal-content">
                    <h3>Reply</h3>
                    <form method="POST" action="<?= ROOT ?>/admin/replyMessage" enctype="multipart/form-data">
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
            </div>  -->


            <div class='reply-card' id='reply-card' style='display: none;'>
                <form id="editForm" method="POST" action="<?= ROOT ?>/admin/replyMessage" enctype="multipart/form-data">
                    <!-- Hidden field for the username -->
                    <input type="hidden" name="username" id="reply-username">
                    
                    <!-- Editable fields for reply -->
                    <label for="reply-email">Email:</label>
                    <input type="text" id="reply-email" name="email" readonly>
                    
                    <label for="reply-issue">Issue:</label>
                    <input type="text" id="reply-issue" name="issue" readonly>

                    <label for="reply-message">Message:</label>
                    <textarea id="reply-message" name="message" rows="4" cols="50" readonly></textarea>

                    <label for="reply-replyMessage">Reply:</label>
                    <textarea id="reply-replyMessage" name="replyMessage" rows="4" cols="50" required></textarea>

                    <button class='editBtn' type="submit">Reply</button>
                    <button type="button" onclick="replyClose()">Cancel</button>
                </form>
            </div>
