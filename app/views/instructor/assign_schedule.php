<div class="in-content">
    <div class="header">
        <div>
            <h2>Workout Schedule</h2>
        </div>
    </div>
    
    <div class="in-in-content">
        <?php
        // Load existing workout data if available
        $user = new Instructor();
        $workoutData = $user->get_workouts($username);
        $workouts = isset($workoutData['found']) && $workoutData['found'] == 'yes' ? $workoutData['workouts'] : [];
        
        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Add username to the data
            $_POST['username'] = $username;
            
            if ($user->save_workout($_POST)) {
                echo '<div class="success-message">Workout plan saved successfully!</div>';
                // Refresh the data
                $workoutData = $user->get_workouts($username);
                $workouts = isset($workoutData['found']) && $workoutData['found'] == 'yes' ? $workoutData['workouts'] : [];
            } else {
                echo '<div class="error-message">Failed to save workout plan. Please try again.</div>';
            }
        }
        ?>

        <form action="" method="post" class="workout-form">
            <div class="workout-controls">
                <input type="submit" value="Save Plan" class="save-btn">
                <input type="reset" value="Reset" class="reset-btn">
            </div>
            
            <div class="workout-table-container">
                <table class="workout-table">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Exercise</th>
                            <th>Sets</th>
                            <th>Reps</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        
                        foreach ($days as $day) {
                            $dayWorkouts = $workouts[$day] ?? [];
                            $rowCount = max(count($dayWorkouts), 5);
                            
                            for ($i = 0; $i < $rowCount; $i++) {
                                $workout = $dayWorkouts[$i] ?? null;
                                
                                echo '<tr>';
                                
                                // Only show the day name in the first row for each day
                                if ($i === 0) {
                                    echo '<td rowspan="5" class="day-cell">' . $day . '</td>';
                                }
                                
                                $j = $i + 1; // For input naming
                                
                                echo '<td><input type="text" name="' . $day . '_workout' . $j . '" value="' . 
                                    (isset($workout->exercise) ? htmlspecialchars($workout->exercise) : '') . 
                                    '" placeholder="Exercise ' . $j . '"></td>';
                                    
                                echo '<td><input type="number" name="' . $day . '_sets' . $j . '" value="' . 
                                    (isset($workout->sets) ? htmlspecialchars($workout->sets) : '') . 
                                    '" min="0" placeholder="Sets"></td>';
                                    
                                echo '<td><input type="number" name="' . $day . '_reps' . $j . '" value="' . 
                                    (isset($workout->reps) ? htmlspecialchars($workout->reps) : '') . 
                                    '" min="0" placeholder="Reps"></td>';
                                
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <div class="workout-controls">
                <input type="submit" value="Save Plan" class="save-btn">
                <input type="reset" value="Reset" class="reset-btn">
            </div>
        </form>
    </div>
</div>