<?php
require_once '../../connection.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$username = isset($_GET['username']) ? $_GET['username'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';

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
        echo "<h5>" . htmlspecialchars($owner['owner_name']) . "</h5>";
        echo "<h5>" . htmlspecialchars($owner['gym_contact']) . "</h5>";
        echo "<h5>" . htmlspecialchars($owner['owner_name']) . "</h5>";
        echo "<h5>" . htmlspecialchars($owner['location']) . "</h5>";
        echo "<p>" . htmlspecialchars($owner['email']) . "</p>";

    echo "<button class='joinBtn' onclick='joinGym(\"{$owner['gym_username']}\",\"{$owner['gym_name']}\",\"$username\",\"$name\")'>Join</button>";



        echo "</table>";
    }
} else {
    echo "No gyms found.";
}
?>
