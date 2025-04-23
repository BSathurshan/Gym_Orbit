<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Workout Plan</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/workoutplan.css">
</head>
<body>

<div class="wp_back-container">
    <button onclick="history.back()" class="wp_back-btn">← Back</button>
</div>

<div class="wp_in-content">
    <div class="wp_header">
        <h1>Workout Plan for <?= htmlspecialchars($username); ?></h1>
    </div>

    <div class="wp_in-in-content">
        <?php if (isset($_GET['success'])): ?>
            <div class="<?= $_GET['success'] == 1 ? 'wp_success-message' : 'wp_error-message' ?>">
                <?= $_GET['success'] == 1 ? 'Workout plan saved successfully!' : 'Failed to save workout plan. Please try again.' ?>
            </div>
        <?php endif; ?>

        <form action="<?= ROOT ?>/user/save_workout/<?= $username ?>" method="post" class="wp_workout-form">
            <div class="wp_day-selector">
                <label for="day-select">Select Day:</label>
                <select id="day-select">
                    <option value="" disabled selected>Select a day</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>

            <div id="wp_workout-container">
                <!-- Dynamic day sections will be added here -->
            </div>

            <div class="wp_workout-controls">
                <button type="submit" class="wp_save-btn">Save Plan</button>
                <button type="reset" class="wp_reset-btn">Reset</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('day-select').addEventListener('change', function () {
    const selectedDay = this.value;

    if (!selectedDay) {
        return;
    }

    // Check if the day section already exists
    if (document.getElementById(`container-${selectedDay}`)) {
        alert(`${selectedDay} is already added.`);
        return;
    }

    // Create a new day section
    const container = document.getElementById('wp_workout-container');
    const dayBlock = document.createElement('div');
    dayBlock.className = 'wp_day-block';
    dayBlock.id = `container-${selectedDay}`;
    dayBlock.innerHTML = `
        <h4>${selectedDay}</h4>
        <div class="wp_exercise-container" id="exercise-container-${selectedDay}">
            <!-- Exercise rows will be added here -->
        </div>
        <button type="button" onclick="addExerciseRow('${selectedDay}')">Add Exercise Row</button>
        <button type="button" onclick="removeDay('${selectedDay}')">Remove Day</button>
    `;
    container.appendChild(dayBlock);
});

function addExerciseRow(day) {
    const container = document.getElementById(`exercise-container-${day}`);
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

function removeDay(day) {
    const dayBlock = document.getElementById(`container-${day}`);
    if (dayBlock) {
        dayBlock.remove();
    }
}
</script>

<style>
/* Add styles for the day selector and dynamic sections */
.wp_day-selector {
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.wp_day-selector select {
    padding: 8px;
    font-size: 1em;
}

.wp_day-block {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.wp_day-block h4 {
    margin: 0 0 10px;
    font-size: 1.2em;
    color: #333;
}

.wp_exercise-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.wp_exercise-row input {
    padding: 8px;
    font-size: 1em;
    width: 150px;
}

.wp_exercise-row button {
    padding: 8px 12px;
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.9em;
}

.wp_exercise-row button:hover {
    background-color: #c82333;
}

.wp_workout-controls {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}

.wp_save-btn, .wp_reset-btn {
    padding: 10px 20px;
    font-size: 1em;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 48%;
}

.wp_save-btn {
    background-color: #007bff;
    color: #fff;
}

.wp_save-btn:hover {
    background-color: #0056b3;
}

.wp_reset-btn {
    background-color: #6c757d;
    color: #fff;
}

.wp_reset-btn:hover {
    background-color: #5a6268;
}
</style>

</body>
</html>


