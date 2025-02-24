<div class="in-content">

<div class="header">
        <div>

        <h2>Reminders</h2>


        </div>
        </div>

<div class="in-in-content">
                 <?php
    
                        $admin = new Admin(); 
                        $reminders = $admin->get_reminders($username); 

                        if (isset($reminders['found'])&&$reminders['found']=='yes') {
                            while ($rowRequested = $reminders['result']->fetch_assoc()) {
                        
                            echo "<table>";
                            echo "<tr><td><input type='text' value='{$rowRequested['message']}' readonly></td></tr>";
                            echo "<tr><td><input type='text' value='{$rowRequested['time']}' readonly></td></tr>";
                            echo "</table>";
                            echo "<br>";    
                        
                        }
                        }
                        elseif (isset($reminders['found'])&&$reminders['found']=='no') 
                        {
                            echo "<p>No Reminders!</p>";
                        }
                    ?>

                </div>
        </div> 