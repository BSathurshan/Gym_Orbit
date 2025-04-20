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
                        <!-- Wrap the username in a link to the page where schedule can be assigned -->
                        <h4><a href="<?=ROOT?>/user/workoutPlan/<?= urlencode($result['username']) ?>"><u><?= htmlspecialchars($result['username']) ?></u></a></h4>
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
