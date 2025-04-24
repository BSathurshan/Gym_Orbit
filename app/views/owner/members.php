<div class="in-content">

    <div class="header">
        <div>


        <h2>Members</h2>

</div>

</div>

<div class="in-in-content">

<?php          
$owner = new Owner(); 
$members = $owner->get_members($gym_username); 

echo "<div class='members-container'>";

if (isset($members['found']) && $members['found'] == 'yes') {
    while ($user = $members['result']->fetch_assoc()) {
        echo "<div class='members'>";
        echo "<table>";

        echo "<tr><td><h4>" . htmlspecialchars($user['name']) . "</h4></td></tr>";
        echo "<div class='matimage'>";
        echo "<div class='matimage'>";
        echo "<tr><td><img src='" . ROOT . "/assets/images/User/profile/images/" . htmlspecialchars($user["file"]) . "' width='200' title='" . htmlspecialchars($user['file']) . "'></td></tr>";
        echo "</div>";
        echo "<tr><td><h5>Age: " . htmlspecialchars($user['age']) . "</h5></td></tr>";
        echo "<tr><td><h5>Gender: " . htmlspecialchars($user['gender']) . "</h5></td></tr>";
        echo "<tr><td><h5>Contact: " . htmlspecialchars($user['contact']) . "</h5></td></tr>";
        echo "<tr><td><h5>Location: " . htmlspecialchars($user['location']) . "</h5></td></tr>";
        
        echo "<tr><td>
                <button class='deleteBtn' onclick='removeMember(\"$gym_username\",\"{$user['username']}\")'>Remove</button>
              </td></tr>";

        echo "</table>";
        echo "<br>"; 
        echo "</div>";   
    }
} elseif (isset($members['found']) && $members['found'] == 'no') {
    echo "<p>There are no active members.</p>";
}
echo "</div>";

?>  

</div>
</div>