<h2>Materials</h2>
                <hr>
                <?php
                
                 $instructor = new Instructor(); 
                 $materials = $instructor->getMaterials($gym_username); 

                 if ($materials['found'] == 'yes') {
                    while ($result = $materials['result']->fetch_assoc()) {
                        echo "<h4><u>" . htmlspecialchars($result['gym_name']) . "</u></h4>";
                        echo "<h5>" . htmlspecialchars($result['title']) . "</h5>";
                        echo "<img src='" . ROOT . "/assets/images/materials/images/" . htmlspecialchars($result["file"]) . "' width='200' title='" . htmlspecialchars($result['file']) . "'>";
                        echo "<p>" . htmlspecialchars($result['details']) . "</p>";
                        echo "<hr>";
                    }
                }
                 
                elseif($materials['found']=='no') 
                {
                    echo "<p>" . htmlspecialchars($materials['message']) . "</p>";
                }
      

                ?>