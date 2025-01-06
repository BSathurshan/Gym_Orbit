<?php
if ($result->num_rows > 0) {
    while ($user = $result->fetch_assoc()) {
        $ban = $user['ban'];
        echo "<table>";
        echo "<h4><u>" . htmlspecialchars($user['name']) . "</u></h4>";
        echo "<h5>" . htmlspecialchars($user['username']) . "</h5>";
        echo "<p>" . htmlspecialchars($user['email']) . "</p>";
        echo "<button class='deleteBtn' onclick='userDelete(\"{$user['username']}\",\"{$user['email']}\",\"{$user['file']}\")'>Delete</button>";
        echo "<button class='editBtn' onclick='userEdit(\"{$user['username']}\", \"{$user['email']}\", \"{$user['username']}\", \"{$user['email']}\", \"{$user['name']}\", \"{$user['contact']}\", \"{$user['location']}\")'>Edit</button>";

        if ($ban == 'no'||$ban == NULL) {
            echo "<button class='banBtn' onclick='userBan(\"{$user['username']}\",\"{$user['email']}\", \"yes\")'>Ban</button>";
        } else {
            echo "<button class='banBtn' onclick='userUnBan(\"{$user['username']}\", \"{$user['email']}\", \"no\")'>Unban</button>";
        }

        echo "</table>";
    }
} else {
    echo "No users found.";
}
?>
