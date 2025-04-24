<div class="in-content">
    <div class="header">
        <h2>Instructors</h2>
    </div>

    <div class="in-in-content">
        <?php
        $user = new User();
        $instructors = $user->request_Instructor($username);

        // Display My Instructors
        echo "<h3>My Instructors</h3>";
        if (!empty($instructors['myInstructors'])) {
            echo "<div class='im-instructor-container'>";
            foreach ($instructors['myInstructors'] as $instructor) {
                $profileImage = !empty($instructor['profile_image']) ? ROOT . "/assets/images/instructor/profile/images/" . htmlspecialchars($instructor['profile_image']) : ROOT . "/assets/images/default-profile.png";
                echo "<div class='im-instructor-card'>
                        <div class='im-instructor-image'>
                            <img src='" . $profileImage . "' alt='Profile Image'>
                        </div>
                        <div class='im-instructor-details'>
                            <p><strong>Name:</strong> " . htmlspecialchars($instructor['trainer_name']) . "</p>
                            <p><strong>Age:</strong> " . htmlspecialchars($instructor['age']) . "</p>
                            <p><strong>Gender:</strong> " . htmlspecialchars($instructor['gender']) . "</p>
                            <p><strong>Experience:</strong> " . htmlspecialchars($instructor['experience']) . " years</p>
                            <p><strong>Email:</strong> <a href='mailto:" . htmlspecialchars($instructor['email']) . "'>" . htmlspecialchars($instructor['email']) . "</a></p>
                        </div>
                      </div>";
            }
            echo "</div>";
        } else {
            echo "<p>No instructors found under 'My Instructors'.</p>";
        }

        // Display Other Instructors
        echo "<h3>Other Instructors</h3>";
        if (!empty($instructors['otherInstructors'])) {
            echo "<div class='im-instructor-container'>";
            foreach ($instructors['otherInstructors'] as $instructor) {
                $profileImage = !empty($instructor['profile_image']) ? ROOT . "/assets/images/instructor/profile/images/" . htmlspecialchars($instructor['profile_image']) : ROOT . "/assets/images/default-profile.png";
                echo "<div class='im-instructor-card'>
                        <div class='im-instructor-image'>
                            <img src='" . $profileImage . "' alt='Profile Image'>
                        </div>
                        <div class='im-instructor-details'>
                            <p><strong>Name:</strong> " . htmlspecialchars($instructor['trainer_name']) . "</p>
                            <p><strong>Age:</strong> " . htmlspecialchars($instructor['age']) . "</p>
                            <p><strong>Gender:</strong> " . htmlspecialchars($instructor['gender']) . "</p>
                            <p><strong>Experience:</strong> " . htmlspecialchars($instructor['experience']) . " years</p>
                            <p><strong>Email:</strong> <a href='mailto:" . htmlspecialchars($instructor['email']) . "'>" . htmlspecialchars($instructor['email']) . "</a></p>
                        </div>
                        <button class='im-request-btn' onclick='sendRequest(\"" . htmlspecialchars($username, ENT_QUOTES) . "\", \"" . htmlspecialchars($instructor['trainer_username'], ENT_QUOTES) . "\", \"" . htmlspecialchars($instructor['trainer_name'], ENT_QUOTES) . "\", \"" . htmlspecialchars($instructor['gym_username'], ENT_QUOTES) . "\")'>
                            Request
                        </button>
                      </div>";
            }
            echo "</div>";
        } else {
            echo "<p>No instructors found under 'Other Instructors'.</p>";
        }
        ?>
    </div>
</div>

<script>
function sendRequest(username, trainerUsername, trainerName, gymUsername) {
    if (confirm(`Send request to ${trainerName}?`)) {
        const url = `<?=ROOT?>/user/sendRequest?username=${username}&trainer_username=${trainerUsername}&trainer_name=${trainerName}&gym_username=${gymUsername}`;
        window.location.href = url;
    }
}
</script>

<style>
.im-instructor-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 16px 0;
}

.im-instructor-card {
    display: flex;
    align-items: center;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    width: 500px;
    position: relative;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.im-instructor-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.im-instructor-image img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
    border: 3px solid #007bff;
    padding: 4px;
    background-color: #f0f8ff;
}

.im-instructor-details {
    flex: 1;
}

.im-instructor-details p {
    margin: 5px 0;
    font-size: 0.95em;
    color: #555;
}

.im-instructor-details a {
    color: #007bff;
    text-decoration: none;
    font-weight: 500;
}

.im-instructor-details a:hover {
    text-decoration: underline;
}

.im-request-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(to right, #007bff, #0056b3);
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 0.95em;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.im-request-btn:hover {
    background: linear-gradient(to right, #0056b3, #004494);
}
</style>






