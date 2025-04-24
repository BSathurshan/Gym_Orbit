<div class="in-content">


<?php
$user = new User(); 
$result4 = $user->get_premium_materials($username);
if ($result4['found'] == 'yes'):
?>
    <div class="header">
        <div>
            <h2>Paid Materials</h2>
        </div>
    </div>

    <div class="in-in-content">
        <div class='materials-container'>
            <?php while ($materials = $result4['result']->fetch_assoc()): ?>
                <div class='materials'>
                    <h4><u><?= htmlspecialchars($materials['gym_name']) ?></u></h4>
                    <h5><?= htmlspecialchars($materials['title']) ?></h5>

                    <div class='matimage'>
                        <img src='<?= ROOT ?>/assets/images/materials/images/<?= htmlspecialchars($materials['file'], ENT_QUOTES, 'UTF-8') ?>' class='zoomable' alt='Material Image'>
                    </div>

                    <p><?= htmlspecialchars($materials['details']) ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <br>
<?php
endif;
?>


<div class="header">
        <div>

        <h2>Free Materials</h2>


        </div>
        </div>
<div class="in-in-content">

        <?php                
        $user = new User(); 
        $result3 = $user->get_free_materials($username);


        echo "<div class='materials-container'>";

                if($result3['found']=='yes'){
                    while ($materials = $result3['result']->fetch_assoc()) {
            
                        echo "<div class='materials'>";
                        echo "<h4> <u>" . htmlspecialchars($materials['gym_name']) . "</u> </h5>";

                        echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";


                        echo "<div class='matimage'>";
                        echo "<img src='" . ROOT . "/assets/images/materials/images/" . 
                             htmlspecialchars($materials['file'], ENT_QUOTES, 'UTF-8') . "' 
                             class='zoomable' alt='Material Image'>";
                        echo "</div>";
   
                      echo "<p>" . htmlspecialchars($materials['details']) . "</p>";
                      
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

    <div id="image-overlay" onclick="this.style.display='none'">
    <img src="" alt="Zoomed Material">
    </div>
