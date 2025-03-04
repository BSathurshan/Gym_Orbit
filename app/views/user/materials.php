<!-- User Workout Schedule Page (Editable Timetable Format) -->
<div class="in-content">
    <h2>My Workout Schedule</h2>
    <table>
        <!-- <thead>
            <tr>
                <th>Day</th>
                <th>Workout</th>
                <th>Reps</th>
                <th>Actions</th>
            </tr>
        </thead> -->
        <h2>Workout Schedule</h2>
        <form action="save_workout.php" method="post">
    
    <table boarder="1">
        <tr>
            <th>Day</th>
            <th>Workout</th>
            <th>Reps</th>
        </tr>
        
        <!-- Monday -->
        <tr>
            <td rowspan="3">Monday</td>
            <td><input type="text" name="monday_workout1"></td>
            <td><input type="text" name="monday_reps1"></td>
        </tr>
        <tr>
            <td><input type="text" name="monday_workout2"></td>
            <td><input type="text" name="monday_reps2"></td>
        </tr>
        <tr>
            <td><input type="text" name="monday_workout3"></td>
            <td><input type="text" name="monday_reps3"></td>
        </tr>
        
        <!-- Tuesday -->
        <tr>
            <td rowspan="3">Tuesday</td>
            <td><input type="text" name="tuesday_workout1"></td>
            <td><input type="text" name="tuesday_reps1"></td>
        </tr>
        <tr>
            <td><input type="text" name="tuesday_workout2"></td>
            <td><input type="text" name="tuesday_reps2"></td>
        </tr>
        <tr>
            <td><input type="text" name="tuesday_workout3"></td>
            <td><input type="text" name="tuesday_reps3"></td>
        </tr>
        
        <!-- Wednesday -->
        <tr>
            <td rowspan="3">Wednesday</td>
            <td><input type="text" name="wednesday_workout1"></td>
            <td><input type="text" name="wednesday_reps1"></td>
        </tr>
        <tr>
            <td><input type="text" name="wednesday_workout2"></td>
            <td><input type="text" name="wednesday_reps2"></td>
        </tr>
        <tr>
            <td><input type="text" name="wednesday_workout3"></td>
            <td><input type="text" name="wednesday_reps3"></td>
        </tr>
        
        <!-- Thursday -->
        <tr>
            <td rowspan="3">Thursday</td>
            <td><input type="text" name="thursday_workout1"></td>
            <td><input type="text" name="thursday_reps1"></td>
        </tr>
        <tr>
            <td><input type="text" name="thursday_workout2"></td>
            <td><input type="text" name="thursday_reps2"></td>
        </tr>
        <tr>
            <td><input type="text" name="thursday_workout3"></td>
            <td><input type="text" name="thursday_reps3"></td>
        </tr>
        
        <!-- Friday -->
        <tr>
            <td rowspan="3">Friday</td>
            <td><input type="text" name="friday_workout1"></td>
            <td><input type="text" name="friday_reps1"></td>
        </tr>
        <tr>
            <td><input type="text" name="friday_workout2"></td>
            <td><input type="text" name="friday_reps2"></td>
        </tr>
        <tr>
            <td><input type="text" name="friday_workout3"></td>
            <td><input type="text" name="friday_reps3"></td>
        </tr>
        
        <!-- Saturday -->
        <tr>
            <td rowspan="3">Saturday</td>
            <td><input type="text" name="saturday_workout1"></td>
            <td><input type="text" name="saturday_reps1"></td>
        </tr>
        <tr>
            <td><input type="text" name="saturday_workout2"></td>
            <td><input type="text" name="saturday_reps2"></td>
        </tr>
        <tr>
            <td><input type="text" name="saturday_workout3"></td>
            <td><input type="text" name="saturday_reps3"></td>
        </tr>
        
        <!-- Sunday -->
        <tr>
            <td rowspan="3">Sunday</td>
            <td><input type="text" name="sunday_workout1"></td>
            <td><input type="text" name="sunday_reps1"></td>
        </tr>
        <tr>
            <td><input type="text" name="sunday_workout2"></td>
            <td><input type="text" name="sunday_reps2"></td>
        </tr>
        <tr>
            <td><input type="text" name="sunday_workout3"></td>
            <td><input type="text" name="sunday_reps3"></td>
        </tr>
    
        <?php if (!empty($workouts) && is_array($workouts)): ?>
    <?php foreach ($workouts as $workout): ?>
        <tr>
            <td><?= htmlspecialchars($workout['day']); ?></td>
            <td><?= htmlspecialchars($workout['workout']); ?></td>
            <td><?= htmlspecialchars($workout['reps']); ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="3">No workout data found.</td>
    </tr>
<?php endif; ?>


    </table>
    <button type="submit">Save</button>
    </form>
</div>




