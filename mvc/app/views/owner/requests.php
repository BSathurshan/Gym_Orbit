<h2>Requests</h2>            
                <hr>

                <?php          

                    $owner = new Owner(); 
                    $requests = $owner->get_requests($username); 

                    if (isset( $requests['found'])&& $requests['found']=='yes') {
                        while ($rowRequested = $requests ['result']->fetch_assoc()) {

                                    echo "<table>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['name']}' readonly></td></tr>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['username']}' readonly></td></tr>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['trainer_name']}' readonly></td></tr>";
                                    echo "<tr><td><input type='text' value='{$rowRequested['trainer_username']}' readonly></td></tr>";


                                    
                                    echo "<td><button class='editBtn' onclick='accept(\"$username\",\"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\",\"accept\")'> Accept </button>";

                                    echo "<button class='deleteBtn' onclick='reject(\"$username\",\"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\",\"reject\")'> Reject </button></td>";

                                    
                                    echo "</table>";
                                    echo "<br>";    

                                }
                                }
                                elseif (isset($requests['found'])&&$requests['found']=='no') {
                                    echo "<p>No instructors were requested </p>";
                                    }

                    ?>   