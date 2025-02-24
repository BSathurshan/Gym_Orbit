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

if (isset($members['found']) && $members['found'] == 'yes') {
    while ($user = $members['result']->fetch_assoc()) {
        echo "<table>";

        echo "<tr><td><h6>" . htmlspecialchars($user['name']) . "</h6></td></tr>";
        echo "<tr><td><h6>Age: " . htmlspecialchars($user['age']) . "</h6></td></tr>";
        echo "<tr><td><h6>Gender: " . htmlspecialchars($user['gender']) . "</h6></td></tr>";
        echo "<tr><td><h6>Contact: " . htmlspecialchars($user['contact']) . "</h6></td></tr>";
        echo "<tr><td><h6>Location: " . htmlspecialchars($user['location']) . "</h6></td></tr>";

        echo "<tr><td><img src='" . ROOT . "/assets/images/User/profile/images/" . htmlspecialchars($user["file"]) . "' width='200' title='" . htmlspecialchars($user['file']) . "'></td></tr>";

        echo "<tr><td>
                <button class='removeBtn' onclick='removeMember(\"$gym_username\",\"{$user['username']}\")'>Remove</button>
              </td></tr>";

        echo "<hr>";

        echo "</table>";
        echo "<br>";    
    }
} elseif (isset($members['found']) && $members['found'] == 'no') {
    echo "<p>There are no active members.</p>";
}
?>  

</div>
</div>