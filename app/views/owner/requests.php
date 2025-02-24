<div class="in-content">

    <div class="header">
        <div>


        <h2>Requests</h2>

</div>

</div>

<div class="in-in-content">

<?php          

$owner = new Owner(); 
$requests = $owner->get_requests($username); 

if (isset($requests['found']) && $requests['found'] == 'yes') {
    while ($rowRequested = $requests['result']->fetch_assoc()) {
        
        echo "<table>";
        
        echo "<tr><td><h6>{$rowRequested['name']}</h6></td></tr>";
        echo "<tr><td><h6>{$rowRequested['username']}</h6></td></tr>";
        echo "<tr><td><h6>{$rowRequested['trainer_name']}</h6></td></tr>";
        echo "<tr><td><h6>{$rowRequested['trainer_username']}</h6></td></tr>";

        echo "<tr><td>
                <button class='editBtn' onclick='accept(\"{$username}\", \"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\", \"accept\")'> Accept </button>
                <button class='deleteBtn' onclick='reject(\"{$username}\", \"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\", \"reject\")'> Reject </button>
              </td></tr>";

        echo "</table>";
        echo "<br>";    

    }
} elseif (isset($requests['found']) && $requests['found'] == 'no') {
    echo "<p>No instructors were requested</p>";
}

?>


</div>
</div>