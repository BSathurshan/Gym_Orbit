<div class="in-content">

<div class="header">
        <div>

        <h2>Reminders</h2>


        </div>
        </div>

<div class="in-in-content">
    <?php

    $user = new User(); 
    $reminders = $user->get_reminders($username); 

    if ($reminders['found']=='yes') {


        while ($result = $reminders['result']->fetch_assoc()) {

            echo "<table>";
            echo "<tr><td><p>". htmlspecialchars($result['message']) ."</p></td></tr>";
            echo "<tr><td><p>". htmlspecialchars($result['time']) ."<p></td></tr>";
            echo "</table>";
            echo "<br>";    
        
        }
        }
        elseif($reminders['found']=='no') {
            echo "<p>No Reminders ! </p>";
            }
    ?>

</div>
</div> 