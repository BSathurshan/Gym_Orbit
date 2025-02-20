<h2>Members</h2>
                <hr>

                <?php
                    $owner = new Owner(); 
                    $members = $owner->get_members($gym_username); 

                    if (isset( $members['found'])&& $members['found']=='yes') {
                        while ($user = $members ['result']->fetch_assoc()) {
                    
                        echo "<h4> <u>" . htmlspecialchars($user['name']) . "</u> </h5>";
                        echo "<h5>" . htmlspecialchars($user['age']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($user['gender']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($user['contact']) . "</h5>";
                        echo "<h5>" . htmlspecialchars($user['location']) . "</h5>";
                        echo "<img src='". ROOT ."/assets/images//User/profile/images/" . htmlspecialchars($user["file"]) . "' width='200' title='" . htmlspecialchars($user['file']) . "'>";
        
                        echo "<br><button class='removeBtn' onclick='removeMember(\"$gym_username\",\"{$user['username']}\")'>Remove</button>";

                        echo "<hr>";
                    }

                } elseif (isset( $members['found'])&& $members['found']=='no') {
                    echo "There are no active members.";
                }
                ?>
