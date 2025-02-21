<h2>Reminders</h2>
                <hr>
                 <?php
                 $instructor = new Instructor(); 
                 $reminder = $instructor->getReminders($username); 
    
                    if ($reminder['found']=='yes') {
                        while ($result = $reminder['result']->fetch_assoc()) {
    
                            echo "<table>";
                            echo "<tr><td><p>".$result['message']."</p></td></tr>";
                            echo "<tr><td><p>".$result['time']."</p></td></tr>";
                            echo "</table>";
                            echo "<br>";    
                        
                        }
                        }
                        elseif($reminder['found']=='no') 
                        {
                            echo "<p>".$reminder['message']."</p>";
                            
                        }
                    ?>