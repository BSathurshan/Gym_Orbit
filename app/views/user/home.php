<div class="in-content">

                <div class="header">
                        <div>
                        <h2>Home</h2>
                        </div>

                        <div>
                                <button class="notification-btn" onclick="toggleNotifications()" style="background: none; border: none; cursor: pointer;">
                                🔔
                                </button>
                        </div>

                        <div id="notification-box" style="display:none; position:absolute; right:10px; top:50px; background:black; border:1px solid #ccc; padding:10px; width:300px; max-height:300px; overflow-y:auto; box-shadow:0 2px 6px rgba(0,0,0,0.2); z-index:100;">
                                <!-- Notification content will be loaded here -->
                        </div>
                </div>
        <div class="in-in-content">

        <div class="home-content-wrapper">
        <div class="posts-stats-row">
            <div class="home-posts">
            <?php
                $user = new User(); 
                $post = $user->get_posts($username); 
                if (isset($post['found']) && $post['found'] == 'yes') {
                    $postCount = 0;
                    while ($posts = $post['result']->fetch_assoc()) {
                        if ($postCount >= 2) break; // Limit to 2 posts
                        echo "<div class='posts'>";
                        echo "<h4><u>" . htmlspecialchars($posts['gym_name']) . "</u></h4>";
                        echo "<br>";
                        echo "<h5>" . htmlspecialchars($posts['title']) . "</h5>";
                        echo "<div class='postimage'>";
                        echo "<img src='" . ROOT . "/assets/images/posts/images/" . htmlspecialchars($posts["file"]) . "'>";
                        echo "</div>";
                        echo "<p>" . htmlspecialchars($posts['details']) . "</p>";
                        echo "</div>";
                        $postCount++;
                    }
                } elseif (isset($post['found']) && $post['found'] == 'no') {
                    echo "<p>There are no posts</p>";
                } elseif (isset($post['found']) && $post['found'] == 'alert') {
                    echo "<p>Please join a gym to view posts</p>";   
                }
            ?>
            </div>

            <div class="home-stats">
                <h4>Squat</h4>
                <h4>Push-up</h4>
                <h4>Bench press</h4>
                <h4>Leg extension</h4>
            </div>
        </div>

        <div class="materials-appointments-row">
            <div class="home-materials">
            <?php
                $user = new User(); 
                $result3 = $user->get_materials($username);
                if ($result3['found'] == 'yes') {
                    $materialCount = 0;
                    while ($materials = $result3['result']->fetch_assoc()) {
                        if ($materialCount >= 2) break; 
                        echo "<div class='materials'>";
                        echo "<h4><u>" . htmlspecialchars($materials['gym_name']) . "</u></h4>";
                        echo "<h5>" . htmlspecialchars($materials['title']) . "</h5>";
                        echo "<div class='matimage'>";
                        echo "<img src='" . ROOT . "/assets/images/materials/images/" . htmlspecialchars($materials['file'], ENT_QUOTES, 'UTF-8') . "'>";
                        echo "</div>";
                        echo "<p>" . htmlspecialchars($materials['details']) . "</p>";
                        echo "</div>";
                        $materialCount++;
                    }
                } elseif ($result3['found'] == 'no') {
                    echo "<p>There are no materials available</p>";
                } elseif ($result3['found'] == 'alert') {
                    echo "<p>Please join a gym to view materials</p>";
                }
            ?>
            </div>

            <div class="home-appointments">
            <?php
                $user = new User(); 
                $result = $user->getAppointments();
                if ($result['found'] == 'yes') {
                    $appointmentsCount = 0;
                    while ($appointments = $result['result']->fetch_assoc()) {
                        if ($appointmentsCount >= 3) break; 
                        echo "<div class='appointments'>";
                        echo "<h4><u>" . htmlspecialchars($appointments['gym_username']) . "</u></h4>";
                        echo "<h5>" . htmlspecialchars($appointments['time']) . "</h5>";
                        echo "<p>" . htmlspecialchars($appointments['date']) . "</p>";
                        echo "</div>";
                        $appointmentsCount++;
                    }
                } elseif ($result['found'] == 'no') {
                    echo "<p>There are no appointments</p>";
                } 
            ?>
            </div>
        </div>
    </div>
                
        </div>
    </div>
      