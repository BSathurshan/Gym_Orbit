<?php
if ($result->num_rows > 0) {
    while ($admin = $result->fetch_assoc()) {
        $ban = $admin['ban'];
        echo "<table>";
        echo "<h4><u>" . htmlspecialchars($admin['admin_name']) . "</u></h4>";
        echo "<img src='" . ROOT . "/assets/images/Admin/profile/images/" . htmlspecialchars($admin["file"]) . "' width='150' '>";
        echo "<h5>" . htmlspecialchars($admin['admin_username']) . "</h5>";
        echo "<h5>" . htmlspecialchars($admin['email']) . "</h5>";
        echo "<p>" . htmlspecialchars($admin['admin_username']) . "</p>";
        echo "<button class='deleteBtn' onclick='adminDelete(\"{$admin['admin_username']}\",\"{$admin['email']}\",\"{$admin['file']}\")'>Delete</button>";
      //  echo "<button class='editBtn' onclick='userEdit(\"{$admin['admin_username']}\", \"{$admin['email']}\", \"{$admin['admin_username']}\", \"{$admin['email']}\", \"{$admin['admin_name']}\", \"{$admin['contact']}\", \"{$admin['location']}\")'>Edit</button>";

        if ($ban == 'no'||$ban == NULL) {
            echo "<button class='banBtn' onclick='adminBan(\"{$admin['admin_username']}\",\"{$admin['email']}\", \"yes\")'>Ban</button>";
        } else {
            echo "<button class='banBtn' onclick='adminUnBan(\"{$admin['admin_username']}\", \"{$admin['email']}\", \"no\")'>Unban</button>";
        }

        echo "</table>";
    }
} else {
    echo "No users found.";
}
?>
