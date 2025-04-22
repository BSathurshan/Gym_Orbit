<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/workoutview.css"> 
<div style="display:flex; flex-direction:column; width:100%; margin-left: 270px; margin-top:20px;">
    <div class="header" style="width:90%">
        <div>
            <h2>MY Progress</h2>
        </div>
    </div>

    <div class="wv-in-in-content">

        <div class="wv-progress-container">
            <div class="wv-progress-title">Workout Progress</div>
            <div class="wv-progress-bar-bg">
                <div class="wv-progress-bar-fill" id="progress-bar"></div>
                <div class="wv-progress-label" id="progress-text">0%</div>
            </div>
        </div>

        
        <div class="wv-progress-table-content">
        <div>
            <h2 style="text-align: center; color: teal;">My Workout Plan</h2><br>
        </div>
            <div class="wv-user-container">
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
                    <div class="wv-day-section">
                        <h3><?= htmlspecialchars($day) ?></h3>

                        <table class="wv-table">
                            <thead>
                                <tr>
                                    <th class="wv-th">Exercise</th>
                                    <th class="wv-th">Reps</th>
                                    <th class="wv-th">Sets</th>
                                    <th class="wv-th">Done</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($exercises as $item): ?>
                                    <tr class="wv-tr">
                                        <td class="wv-td" data-label="Exercise"><?= htmlspecialchars($item['exercise']) ?></td>
                                        <td class="wv-td" data-label="Reps"><?= htmlspecialchars($item['sets']) ?></td>
                                        <td class="wv-td" data-label="Sets"><?= htmlspecialchars($item['reps']) ?></td>
                                        <td class="wv-td" data-label="Done">
                                            <input class="wv-input"
                                                type="checkbox" 
                                                name="done_<?= $item['id'] ?>" 
                                                data-id="<?= $item['id'] ?>" 
                                                <?= $item['done'] == 1 ? 'checked' : '' ?>
                                                onchange="saveDoneStatus(<?= $item['id'] ?>, this.checked ? 1 : 0)" />
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

<!-- JS to update progress and save checkbox states -->
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

    // Send update to backend
    function saveDoneStatus(id, done) {
    fetch('<?=ROOT?>/user/updateDone', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${id}&done=${done}`
    })
    .then(response => response.text())
    .then(data => {
        console.log("Server response:", data);
    })
    .catch(err => console.error("Fetch error:", err));
}


    // On checkbox change
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
        cb.addEventListener('change', function () {
            const id = this.dataset.id;
            const done = this.checked ? 1 : 0;
            saveDoneStatus(id, done);
            updateProgress();
        });
    });
</script>










