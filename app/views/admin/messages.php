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