<?php
if ($result->num_rows > 0) {
    while ($instructor = $result->fetch_assoc()) {
        $ban = $instructor['ban'];

        echo "<div class='instructor-card'>";

        echo "<h4><u>" . htmlspecialchars($instructor['trainer_name']) . "</u></h4>";

        echo "<div class='instructor-image'>";
        echo "<img src='" . ROOT . "/assets/images/Instructor/profile/images/" . htmlspecialchars($instructor["file"]) . "' width='150'>";
        echo "</div>";

        echo "<div class='instructor-details'>";
        echo "<h5>" . htmlspecialchars($instructor['trainer_username']) . "</h5>";
        echo "<h5>" . htmlspecialchars($instructor['email']) . "</h5>";
        echo "<p>Gym Username: " . htmlspecialchars($instructor['gym_username']) . "</p>";
        echo "</div>";

        echo "<div class='instructor-buttons'>";
        echo "<button class='deleteBtn' onclick='instructorDelete(\"{$instructor['trainer_username']}\",\"{$instructor['email']}\",\"{$instructor['file']}\",\"admin\")'>Delete</button>";

        echo "<button class='editBtn' onclick='instructorEdit(
                \"{$instructor['gym_username']}\",
                \"{$instructor['trainer_username']}\",
                \"{$instructor['trainer_name']}\",
                \"{$instructor['email']}\",
                \"{$instructor['age']}\",
                \"{$instructor['gender']}\",
                \"{$instructor['contact']}\",
                \"{$instructor['experience']}\",
                \"{$instructor['social']}\",
                \"{$instructor['location']}\",
                \"{$instructor['availiblity']}\",
                \"{$instructor['qualify']}\",
                \"{$instructor['special']}\",
                \"{$instructor['file']}\"
            )'>Edit</button>";

        if ($ban == 'no' || $ban == NULL) {
            echo "<button class='banBtn' onclick='trainerBan(\"{$instructor['trainer_username']}\",\"{$instructor['email']}\", \"yes\")'>Ban</button>";
        } else {
            echo "<button class='banBtn' onclick='trainerUnBan(\"{$instructor['trainer_username']}\", \"{$instructor['email']}\", \"no\")'>Unban</button>";
        }

        echo "</div>"; // end instructor-buttons
        echo "</div>"; // end instructor-card
    }
} else {
    echo "No users found.";
}

?>
