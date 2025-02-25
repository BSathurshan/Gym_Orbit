<div class="in-content">

<div class="header">
        <div>

        <h2>Materials</h2>


        </div>
        </div>

<div class="in-in-content">
                <?php
                
                echo "<div class='materials-container'>";


                 $instructor = new Instructor(); 
                 $materials = $instructor->getMaterials($gym_username); 

                 if ($materials['found'] == 'yes') {
                    while ($result = $materials['result']->fetch_assoc()) {

                        echo "<div class='materials'>";

                        echo "<h4><u>" . htmlspecialchars($result['gym_name']) . "</u></h4>";
                        echo "<h5>" . htmlspecialchars($result['title']) . "</h5>";

                        echo "<div class='matimage'>
                        <img src='" . ROOT . "/assets/images/materials/images/" . 
                        htmlspecialchars($result['file'], ENT_QUOTES, 'UTF-8') . "'>
                      </div>";
                        echo "<p>" . htmlspecialchars($result['details']) . "</p>";

                        echo "</div>";

                    }
                }
                 
                elseif($materials['found']=='no') 
                {
                    echo "<p>" . htmlspecialchars($materials['message']) . "</p>";
                }
      
                echo "</div>";


                ?>


</div>
</div>  