<?php
if ($result->num_rows > 0) {
    while ($admin = $result->fetch_assoc()) {
        $ban = $admin['ban'];

        echo "<div class='user-card'>";
        
        echo "<h4><u>" . htmlspecialchars($admin['admin_name']) . "</u></h4>";

        echo "<div class='user-image'>";
        echo "<img src='" . ROOT . "/assets/images/Admin/profile/images/" . htmlspecialchars($admin["file"]) . "' width='150'>";
        echo "</div>";

        echo "<div class='user-details'>";
        echo "<h5>" . htmlspecialchars($admin['admin_username']) . "</h5>";
        echo "<h5>" . htmlspecialchars($admin['email']) . "</h5>";
        echo "<p>" . htmlspecialchars($admin['admin_username']) . "</p>";
        echo "</div>";

        echo "<div class='user-buttons'>";
        echo "<button class='deleteBtn' onclick='adminDelete(\"{$admin['admin_username']}\",\"{$admin['email']}\",\"{$admin['file']}\")'>Delete</button>";
        
        // Uncomment if you implement edit functionality later
        // echo "<button class='editBtn' onclick='adminEdit(...)'>Edit</button>";

        if ($ban == 'no' || $ban == NULL) {
            echo "<button class='banBtn' onclick='adminBan(\"{$admin['admin_username']}\",\"{$admin['email']}\", \"yes\")'>Ban</button>";
        } else {
            echo "<button class='banBtn' onclick='adminUnBan(\"{$admin['admin_username']}\", \"{$admin['email']}\", \"no\")'>Unban</button>";
        }

        echo "</div>"; // end admin-buttons
        echo "</div>"; // end admin-card
    }
} else {
    echo "No users found.";
}

?>
