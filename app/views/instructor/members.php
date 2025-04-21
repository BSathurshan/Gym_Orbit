<div class="in-content">

    <div class="header">
        <h2>My Clients</h2>
    </div> <!-- Close header div -->

    <div class="in-in-content">
        <div class="user-container">
            <?php 
            $instructor = new Instructor(); 
            $clients = $instructor->showClients($username); 

            if ($clients['found'] == 'yes'): // Check if clients were found
                foreach ($clients['result'] as $result): // Loop through each client in the result array
                ?>
                   <div class="users">
    <h3 style="color: white;">
        <a href="<?=ROOT?>/user/workoutPlan/<?= urlencode($result['username']) ?>" style="color: white; text-decoration: underline;">
            <?= htmlspecialchars($result['username']) ?>
        </a>
    </h3>
</div>

                <?php
                endforeach;
            else:
                ?>
                <p><?= htmlspecialchars($clients['message']) ?></p>
            <?php endif; ?>
        </div>
    </div> <!-- Close in-in-content div -->
</div> <!-- Close in-content div -->
