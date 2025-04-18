<div class="in-content">
    <div class="header">
        <div>
            <h2>My Workout Plan</h2>
        </div>
    </div>

    <div class="in-in-content">
        <div class="user-container">
            <?php 
            $user = new User(); 
            $workouts = $user->request_workoutplan($username); 

            if ($workouts['found'] == 'yes'): 
                // Group workouts by day
                $grouped = [];
                foreach ($workouts['result'] as $workout) {
                    $grouped[$workout['day']][] = $workout;
                }
            ?>

            <?php foreach ($grouped as $day => $exercises): ?>
                <div class="day-section" style="margin-bottom: 30px;">
                    <h3 style="color: #007bff;"><?= htmlspecialchars($day) ?></h3>

                    <table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr style="background-color: #f0f0f0;">
                            
                            <th>Exercise</th>
                            <th>Reps</th>
                            <th>Sets</th>
                            <th>Done</th>
                        </tr>

                        <?php foreach ($exercises as $item): ?>
                            <tr>
                                
                                <td><?= htmlspecialchars($item['exercise']) ?></td>
                                <td><?= htmlspecialchars($item['sets']) ?></td>
                                <td><?= htmlspecialchars($item['reps']) ?></td>
                                <td style="text-align: center;">
                                    <input type="checkbox" name="done_<?= $item['id'] ?>" />
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endforeach; ?>

            <?php else: ?>
                <p>No workout plan assigned yet.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
