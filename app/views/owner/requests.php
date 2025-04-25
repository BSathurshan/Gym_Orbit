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

echo "<div class='request-container'>";
if (isset($requests['found']) && $requests['found'] == 'yes') {
    while ($rowRequested = $requests['result']->fetch_assoc()) {
        
        echo "<div class='request'>";
        echo "<table>";
        
        echo "<tr><td><h4>{$rowRequested['name']}</h4></td></tr>";
        echo "<tr><td><h4>{$rowRequested['username']}</h4></td></tr>";
        echo "<tr><td><h4>{$rowRequested['trainer_name']}</h4></td></tr>";
        echo "<tr><td><h4>{$rowRequested['trainer_username']}</h4></td></tr>";

        echo "<tr><td>
                <button class='editBtn' onclick='accept(\"{$username}\", \"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\", \"accept\")'> Accept </button>
                <button class='deleteBtn' onclick='reject(\"{$username}\", \"{$rowRequested['name']}\", \"{$rowRequested['username']}\", \"{$rowRequested['trainer_name']}\", \"{$rowRequested['trainer_username']}\", \"reject\")'> Reject </button>
              </td></tr>";

        echo "</table>";
        echo "<br>"; 
        echo "</div>";   

    }
} elseif (isset($requests['found']) && $requests['found'] == 'no') {
    echo "<p>No instructors were requested</p>";
}
echo "</div>";

?>


</div>
</div>