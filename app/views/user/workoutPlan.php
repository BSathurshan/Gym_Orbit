<div class="in-content">

<div class="header">
        <div>

        <h2>Materials</h2>


        </div>
        </div>
<div class="in-in-content">

        <?php                
        $user = new User(); 
        $result3 = $user->get_materials($username);


        echo "<div class='materials-container'>";

                if($result3['found']=='yes'){
                    while ($materials = $result3['result']->fetch_assoc()) {
            
                        echo "<div class='materials'>";
                        echo "<h4> <u>" . htmlspecialchars($materials['gym_name']) . "</u> </h5>";

                        echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";
                        echo "<p>" . htmlspecialchars($materials['details']) . "</p>";

                     echo "<div class='matimage'>
                        <img src='" . ROOT . "/assets/images/materials/images/" . 
                        htmlspecialchars($materials['file'], ENT_QUOTES, 'UTF-8') . "'>
                      </div>";
   
                      echo "</div>";

                        
                    }

                }
                elseif($result3['found']=='no'){
                    echo "<p>There are no materials available </p>";

                }elseif($result3['found']=='alert'){
                    echo "<p>Please join a gym to view materials  </p>";

                }
                echo "</div>";

        ?>
    </div>
    </div> 
    