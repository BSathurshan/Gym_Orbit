<div class="in-content">
    <div class="header">
        <div>
            <h2>Workout Schedule</h2>
        </div>
    </div>
    
    <div class="in-in-content">
        <?php
        // Load workout data
        $user = new User();
        $workoutData = $user->get_workouts($username);
        $workouts = isset($workoutData['found']) && $workoutData['found'] == 'yes' ? $workoutData['workouts'] : [];
        ?>

        <!-- Display success/error messages -->
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div class="success-message">Workout plan saved successfully!</div>
        <?php elseif (isset($_GET['success']) && $_GET['success'] == 0): ?>
            <div class="error-message">Failed to save workout plan. Please try again.</div>
        <?php endif; ?>

        <form action="<?= ROOT ?>/user/save_workout/<?= $username ?>" method="post" class="workout-form">
            <div class="workout-controls">
                <input type="submit" value="Save Plan" class="save-btn">
                <input type="reset" value="Reset" class="reset-btn">
            </div>
            
            <div class="workout-table-container">
                <?php $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']; ?>
                <?php foreach ($days as $day): ?>
                    <div class="day-block">
                        <h4><?= $day ?></h4>
                        <div id="container-<?= $day ?>">
                            <?php
                            $dayWorkouts = $workouts[$day] ?? [[]]; // Always show at least one row
                            foreach ($dayWorkouts as $i => $workout):
                            ?>
                                <div class="exercise-row">
                                    <input type="text" name="exercises[<?= $day ?>][]" value="<?= htmlspecialchars($workout->exercise ?? '') ?>" placeholder="Exercise">
                                    
                                    <input type="number" name="reps[<?= $day ?>][]" value="<?= htmlspecialchars($workout->reps ?? '') ?>" min="0" placeholder="Reps">
                                    <input type="number" name="sets[<?= $day ?>][]" value="<?= htmlspecialchars($workout->sets ?? '') ?>" min="0" placeholder="Sets">
                                    <button type="button" onclick="this.parentElement.remove()">Remove</button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" onclick="addExerciseRow('<?= $day ?>')">Add Exercise</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="workout-controls">
                <input type="submit" value="Save Plan" class="save-btn">
                <input type="reset" value="Reset" class="reset-btn">
            </div>
        </form>
    </div>
</div>

<!-- JavaScript to add rows -->
<script>
function addExerciseRow(day) {
    const container = document.getElementById('container-' + day);
    const row = document.createElement('div');
    row.className = 'exercise-row';
    row.innerHTML = `
        <input type="text" name="exercises[${day}][]" placeholder="Exercise">
        <input type="number" name="sets[${day}][]" min="0" placeholder="Sets">
        <input type="number" name="reps[${day}][]" min="0" placeholder="Reps">
        <button type="button" onclick="this.parentElement.remove()">Remove</button>
    `;
    container.appendChild(row);
}
</script>
