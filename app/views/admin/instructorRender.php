<?php
if ($result->num_rows > 0) {
    while ($instructor = $result->fetch_assoc()) {
        $ban = $instructor['ban'];
        echo "<table>";
        echo "<h4><u>" . htmlspecialchars($instructor['trainer_name']) . "</u></h4>";
        echo "<img src='" . ROOT . "/assets/images/Instructor/profile/images/" . htmlspecialchars($instructor["file"]) . "' width='150' '>";
        echo "<h5>" . htmlspecialchars($instructor['trainer_username']) . "</h5>";
        echo "<h5>" . htmlspecialchars($instructor['email']) . "</h5>";
        echo "<p>" . htmlspecialchars($instructor['gym_username']) . "</p>";
        echo "<button class='deleteBtn' onclick='instructorDelete(\"{$instructor['trainer_username']}\",\"{$instructor['email']}\",\"{$instructor['file']}\",\"admin\")'>Delete</button>";
        echo "<button class='editBtn' onclick='instructorEdit(\"{$instructor['gym_username']}\",
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
                                                                \"{$instructor['file']}\")'>Edit</button>";


        if ($ban == 'no'||$ban == NULL) {
            echo "<button class='banBtn' onclick='trainerBan(\"{$instructor['trainer_username']}\",\"{$instructor['email']}\", \"yes\")'>Ban</button>";
        } else {
            echo "<button class='banBtn' onclick='trainerUnBan(\"{$instructor['trainer_username']}\", \"{$instructor['email']}\", \"no\")'>Unban</button>";
        }

        echo "</table>";
    }
} else {
    echo "No users found.";
}
?>
