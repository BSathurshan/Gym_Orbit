<div class="searchGym-container">
    <?php
    $name = $_SESSION["userDetails"]["name"] ?? null;
    $username = $_SESSION["username"] ?? null;
    
    if ($result->num_rows > 0) {
        while ($owner = $result->fetch_assoc()) {
            echo "<div class='gym-container'>";
            echo "<table>";
            echo "<h4><u>" . htmlspecialchars($owner['gym_name']) . "</u></h4>";
           
            echo "<div class='image'>";
            echo "<img src='" . ROOT . "/assets/images/owner/profile/images/" . htmlspecialchars($owner['file']) . "'>";
            echo "</div>";

            echo "<h5>" . htmlspecialchars($owner['gym_contact']) . "</h5>";
            echo "<h5>" . htmlspecialchars($owner['location']) . "</h5>";
            echo "<p>" . htmlspecialchars($owner['email']) . "</p>";
            // echo "<button class='joinBtn' onclick='joinGym(\"{$owner['gym_username']}\",\"{$owner['gym_name']}\",\"$username\",\"$name\")'>Join</button>";
            echo "</table>";


            echo "<form action='" . ROOT . "/user/joinGym' method='POST' style='display:inline;'>";
            echo "<input type='hidden' name='gym_username' value='" . htmlspecialchars($owner['gym_username']) . "'>";
            echo "<input type='hidden' name='gym_name' value='" . htmlspecialchars($owner['gym_name']) . "'>";
            echo "<input type='hidden' name='username' value='" . htmlspecialchars($username) . "'>";
            echo "<input type='hidden' name='name' value='" . htmlspecialchars($name) . "'>";
            echo "<button type='submit' class='joinBtn'>Join</button>";
            echo "</form>";
            
            echo "</div>";

        }
    } else {
        echo "No gyms found.";
    }
    ?>
</div>
