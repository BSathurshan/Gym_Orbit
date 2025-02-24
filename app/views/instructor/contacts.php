<div class="in-content">


      <div class="header">
        <div>
        <h2>Contacts</h2>
        </div>
        </div>

        <div class="in-in-content">

                <?php 
                                 $instructor = new Instructor(); 
                                 $contacts = $instructor->getContacts($username); 

                                 if($contacts['found']=='yes')
                                 {
                                    while ($Results = $contacts['result']->fetch_assoc()) {
                                        
                                    echo "<h4> <u>" . htmlspecialchars($Results['name']) . "</u> </h5>";
                                    echo "<img src='" . ROOT . "/assets/images/user/profile/images/"  . htmlspecialchars($Results["file"]) . "' width='200' title='" . htmlspecialchars($Results['file']) . "'>";
                                    echo "<h5>" . htmlspecialchars($Results['email']) . "</h5>";
                                    echo "<h5>" . htmlspecialchars($Results['contact']) . "</h5>";
                                    echo "<h5>" . htmlspecialchars($Results['age']) . "</h5>";
                                    echo "<h5>" . htmlspecialchars($Results['gender']) . "</h5>";
                                    echo "<hr>";
                                    }

                                 }
                                 elseif($contacts['found']=='no')
                                 {
                                    echo "<h4> <p>" . htmlspecialchars($contacts['message']) . "</p> </h5>";

                                 }

                ?>


</div>
</div>

