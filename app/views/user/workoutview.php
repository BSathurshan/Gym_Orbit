
<div style="display:flex; flex-direction:column; width:100%; margin-left: 270px; margin-top:20px;">
    <div class="header" style="width:90%">
        <div>
            <h2>MY Progress</h2>
        </div>
    </div>

    <div class="in-in-content">

        <div class="progress-container">
            <div class="progress-title">Your Workout Progress</div>
            <div class="progress-bar-bg">
                <div class="progress-bar-fill" id="progress-bar"></div>
                <div class="progress-label" id="progress-text">0%</div>
            </div>
        </div>

        <div>
            <h2>My Workout Plan</h2>
        </div>
        <div class="progress-table-content">
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
                <div class="day-section">
                    <h3><?= htmlspecialchars($day) ?></h3>

                    <table>
                        <thead>
                            <tr>
                                <th>Exercise</th>
                                <th>Reps</th>
                                <th>Sets</th>
                                <th>Done</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($exercises as $item): ?>
                                <tr>
                                    <td data-label="Exercise"><?= htmlspecialchars($item['exercise']) ?></td>
                                    <td data-label="Reps"><?= htmlspecialchars($item['sets']) ?></td>
                                    <td data-label="Sets"><?= htmlspecialchars($item['reps']) ?></td>
                                    <td data-label="Done">
                                        <input type="checkbox" name="done_<?= $item['id'] ?>" />
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>

            <?php else: ?>
                <p style="text-align: center; font-size: 1.1rem; color: #999;">No workout plan assigned yet.</p>
            <?php endif; ?>
        </div>
    </div>
    </div>

    
</div>
    <!-- JS for updating progress -->
    <script>
        function updateProgress() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const total = checkboxes.length;
            const checked = Array.from(checkboxes).filter(cb => cb.checked).length;
            const percent = total === 0 ? 0 : Math.round((checked / total) * 100);

            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');

            progressBar.style.width = percent + '%';
            progressText.innerText = percent + '%';
        }

        // Initial update
        updateProgress();

        // Update on checkbox interaction
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.addEventListener('change', updateProgress);
        });
    </script>








