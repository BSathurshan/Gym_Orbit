<?php

if ($result->num_rows > 0) {
    while ($owner = $result->fetch_assoc()) {
        $ban = $owner['ban'];
        echo "<table>";
        echo "<h4><u>" . htmlspecialchars($owner['gym_name']) . "</u></h4>";
        echo "<h5>" . htmlspecialchars($owner['gym_username']) . "</h5>";
        echo "<h5>" . htmlspecialchars($owner['owner_name']) . "</h5>";
        echo "<p>" . htmlspecialchars($owner['email']) . "</p>";
       echo "<button class='deleteBtn' onclick='ownerDelete(\"{$owner['gym_username']}\",\"{$owner['email']}\",\"{$owner['file']}\")'>Delete</button>";
       echo "<button class='editBtn' onclick='editOwner(
        \"{$owner['gym_username']}\", 
        \"{$owner['gym_name']}\", 
        \"{$owner['owner_name']}\",
        \"{$owner['email']}\",
        \"{$owner['age']}\",
        \"{$owner['gender']}\",
        \"{$owner['location']}\",
        \"{$owner['gym_contact']}\",
        \"{$owner['owner_contact']}\",
        \"{$owner['start_year']}\",
        \"{$owner['experience']}\",
        \"{$owner['web']}\",
        \"{$owner['social']}\",
        \"{$owner['file']}\")'>Edit</button>";


        if ($ban == 'no' ||$ban == NULL) {
            echo "<button class='banBtn' onclick='gymBan(\"{$owner['gym_username']}\",\"{$owner['email']}\", \"yes\")'>Ban</button>";
        } else {
            echo "<button class='banBtn' onclick='gymUnBan(\"{$owner['gym_username']}\", \"{$owner['email']}\", \"no\")'>Unban</button>";
        }

        echo "</table>";
    }
} else {
    echo "No users found.";
}
?>
