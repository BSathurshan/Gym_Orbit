<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Workout & Meal Plan</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/workoutplan.css"> 
</head>
<body>

<div class="wp_back-container">
    <button onclick="history.back()" class="wp_back-btn">← Back</button>
</div>

<div class="wp_in-content">
    <div class="wp_header">
        <h1>Member <?= htmlspecialchars($username); ?></h1>
    </div>

    <div class="wp_header">
        <h2>Add Workout Plan</h2>
    </div>

    <div class="wp_in-in-content">
        <?php if (isset($_GET['success'])): ?>
            <div class="<?= $_GET['success'] == 1 ? 'wp_success-message' : 'wp_error-message' ?>">
                <?= $_GET['success'] == 1 ? 'Workout plan saved successfully!' : 'Failed to save workout plan. Please try again.' ?>
            </div>
        <?php endif; ?>

        <form action="<?= ROOT ?>/user/save_workout/<?= $username ?>" method="post" class="wp_workout-form">
            

            <div class="wp_workout-table-container">
                <?php $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']; ?>
                <?php foreach ($days as $day): ?>
                    <div class="wp_day-block">
                        <h4><?= $day ?></h4>
                        <div id="container-<?= $day ?>">
                            <?php foreach ($data['workouts']['workouts'][$day] ?? [[]] as $i => $workout): ?>
                                <div class="wp_exercise-row">
                                    <input type="text" name="exercises[<?= $day ?>][]" value="<?= htmlspecialchars($workout['exercise'] ?? '') ?>" placeholder="Exercise">
                                    <input type="number" name="sets[<?= $day ?>][]" value="<?= htmlspecialchars($workout['sets'] ?? '') ?>" min="0" placeholder="Sets">
                                    <input type="number" name="reps[<?= $day ?>][]" value="<?= htmlspecialchars($workout['reps'] ?? '') ?>" min="0" placeholder="Reps">
                                    <button type="button" onclick="this.parentElement.remove()">Remove</button>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" onclick="addExerciseRow('<?= $day ?>')">Add Exercise Row</button>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="wp_workout-controls">
                <input type="submit" value="Save Plan" class="wp_save-btn">
                <input type="reset" value="Reset" class="wp_reset-btn">
            </div>
        </form>
    </div>
</div>

<script>
function addExerciseRow(day) {
    const container = document.getElementById('container-' + day);
    const row = document.createElement('div');
    row.className = 'wp_exercise-row';
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
<h2 class="wp_meal-title">Add Meal Plan</h2>
<form action="index.php?controller=MealPlan&action=addMealPlan" method="POST" class="wp_meal-form">
    <input type="hidden" name="user" value="<?= htmlspecialchars($_GET['user'] ?? '') ?>">

    <label>Meal Plan Name:</label><br>
    <input type="text" name="meal_plan_name" required><br><br>

    <div id="wp_nutrition-section">
        <div class="wp_nutrition-entry">
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
    const section = document.getElementById('wp_nutrition-section');
    const entry = document.createElement('div');
    entry.className = 'wp_nutrition-entry';
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

</body>
</html>


