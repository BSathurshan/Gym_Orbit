<div class="in-content">
<div class="header">
        <div>
        <h1>Member <?php echo $username; ?>!</h1>       
         
            
        </div>
      </div>
    <div class="header">
        <div>
            <h2>Add Workout Plan</h2>
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

<hr>
<h2>Add Meal Plan</h2>
<form action="index.php?controller=MealPlan&action=addMealPlan" method="POST">
    <input type="hidden" name="user" value="<?php echo htmlspecialchars($_GET['user']); ?>">
    
    <label>Meal Plan Name:</label><br>
    <input type="text" name="meal_plan_name" required><br><br>

    <div id="nutrition-section">
        <div class="nutrition-entry">
            <input type="text" name="nutrition_name[]" placeholder="Nutrition (e.g., Protein)" required>
            <input type="text" name="amount[]" placeholder="Amount (e.g., 70g)" required>
            <button type="button" onclick="removeNutrition(this)">Remove</button>
        </div>
    </div>

    <button type="button" onclick="addNutrition()">+ Add Nutrition</button><br><br>
    <input type="submit" value="Add Meal Plan">
</form>

<script>
function addNutrition() {
    const section = document.getElementById('nutrition-section');
    const entry = document.createElement('div');
    entry.classList.add('nutrition-entry');
    entry.innerHTML = `
        <input type="text" name="nutrition_name[]" placeholder="Nutrition" required>
        <input type="text" name="amount[]" placeholder="Amount" required>
        <button type="button" onclick="removeNutrition(this)">Remove</button>
    `;
    section.appendChild(entry);
}

function removeNutrition(btn) {
    btn.parentElement.remove();
}
</script>

