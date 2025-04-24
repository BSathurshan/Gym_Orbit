<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/instructor/members.css">
<div class="in-content">
    <div class="header">
        <h2>My Clients</h2>
    </div>

    <div class="in-in-content">
        <div class="im-user-container">
            <?php 
            $instructor = new Instructor(); 
            $clients = $instructor->showClients($trainer_username);

            if ($clients['found'] === 'yes'): 
                foreach ($clients['result'] as $client): 
                ?>
                    <div class="im-client-card">
                        <div class="im-client-image">
                            <img src="<?= ROOT ?>/assets/images/user/profile/images/<?= htmlspecialchars($client['profile_image'] ?? 'default-profile.png') ?>" alt="Profile Image">
                        </div>
                        <div class="im-client-details">
                            <h3><?= htmlspecialchars($client['name']) ?></h3>
                            <p><strong>Age:</strong> <?= htmlspecialchars($client['age']) ?></p>
                            <p><strong>Gender:</strong> <?= htmlspecialchars($client['gender']) ?></p>
                            <p><strong>Email:</strong> <?= htmlspecialchars($client['email']) ?></p>
                                <a href="mailto:<?= htmlspecialchars($client['email']) ?>">
                                    <?= htmlspecialchars($client['email']) ?>
                                </a>
                            </p>
                            <a href="<?= ROOT ?>/user/workoutplan/<?= htmlspecialchars($client['username']) ?>" class="im-workout-plan-btn">
                                View Plans
                            </a>
                        </div>
                    </div>
                <?php
                endforeach;
            else:
                ?>
                <p class="im-no-clients-message"><?= htmlspecialchars($clients['message']) ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>



