<?php
require_once '../../connection.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search !== '') {
    // Query for filtered search
    $sql = "SELECT * FROM gym WHERE gym_name LIKE ? OR gym_username LIKE ? OR email LIKE ? ORDER BY gym_name ASC";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
} else {
    // Default query to fetch all users
    $sql = "SELECT * FROM gym ORDER BY gym_name ASC";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($owner = $result->fetch_assoc()) {
        $ban = $owner['ban'];
        echo "<table>";
        echo "<h4><u>" . htmlspecialchars($owner['gym_name']) . "</u></h4>";
        echo "<h5>" . htmlspecialchars($owner['gym_username']) . "</h5>";
        echo "<h5>" . htmlspecialchars($owner['owner_name']) . "</h5>";
        echo "<p>" . htmlspecialchars($owner['email']) . "</p>";
       echo "<button class='deleteBtn' onclick='ownerDelete(\"{$owner['gym_username']}\",\"{$owner['email']}\",\"{$owner['file']}\")'>Delete</button>";
    //    echo "<button class='editBtn' onclick='gymEdit(\"{$owner['gym_username']}\", \"{$owner['email']}\", \"{$owner['gym_username']}\", \"{$owner['email']}\", \"{$owner['gym_name']}\", \"{$owner['gym_contact']}\", \"{$owner['location']}\")'>Edit</button>";

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
