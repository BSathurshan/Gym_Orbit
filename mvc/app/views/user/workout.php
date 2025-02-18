<?php
if (!isset($_SESSION["username"])) {
    header("Location: ../../../login/login.php");
    exit();
} else {
    $username = $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];
    $email = $userDetails["email"];
    $name = $userDetails["name"];
    $contact = $userDetails["contact"];
    $age = $userDetails["age"];
    $gender = $userDetails["gender"];
    $goals = $userDetails["goals"];
    $password = $userDetails["password"];
    $profile_image = $userDetails["file"];

    // Check if result is set and not empty
    $workoutPlans = isset($result) ? $result : [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/plan.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 0.5rem;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="content">
        <div class="descriptor active" value="1">
            <div class="header">
                <div class="p-8">
                    <h1 class="text-2xl font-bold mb-4">Workout Plan</h1>
                    <p class="text-gray-600 mb-6"><?php echo date("l, F j, Y"); ?></p>
                    
                    <!-- Add Workout Form -->
                    <form name="workout" method="post" class="mb-8">
                        <input type="text" name="username" value="<?php echo $username; ?>" class="hidden">
                        <div class="flex gap-2">
                        <input type="text" name="day" placeholder="Enter Day" class="flex-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <input type="text" name="title" placeholder="Enter Title" class="flex-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <input type="text" name="plan" placeholder="Enter your workout plan" class="flex-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <button type="submit" name="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                                Add Workout Plan
                            </button>
                        </div>
                    </form>

                    <!-- Workout Plans Grid -->
                    <h2 class="text-xl font-semibold mb-4">Your Workout Plans</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-7 gap-6">
                        <?php if (!empty($workoutPlans)): ?>
                            <?php foreach ($workoutPlans as $plan): ?>
                                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                                <div class="flex items-center">
                                            <i class="fas fa-dumbbell text-blue-500 mr-2"></i>
                                            <h3 class="text-lg font-semibold text-center text-blue-500 mb-4">
        <?php echo htmlspecialchars($plan['day']); ?>
    </h3>
                                        </div>
                                    <div class="flex items-start justify-between mb-4">
                                       
                                        <div class="text-sm text-gray-500">
                                            <!-- You can add date here if available -->
                                        </div>
                                    </div><p class="text-gray-600 font-semibold mb-4">
                                        <?php echo htmlspecialchars($plan['title']); ?>
                                    </p>
                                    <p class="text-gray-600 mb-4">
                                        <?php echo htmlspecialchars($plan['plan']); ?>
                                    </p>
                                    <div class="flex justify-end gap-2">
                                        <button 
                                            onclick="openModal('<?php echo $plan['workout_id']; ?>', '<?php echo htmlspecialchars($plan['plan']); ?>')" 
                                            class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">
                                            Update
                                        </button>
                                        <form method="post" style="display:inline;" onsubmit="return deleteWorkout(this);">
                                            <input type="hidden" name="workout_id" value="<?php echo $plan['workout_id']; ?>">
                                            <button type="submit" name="delete" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-span-full text-center py-8 bg-white rounded-lg shadow">
                                <i class="fas fa-clipboard-list text-gray-400 text-4xl mb-4"></i>
                                <p class="text-gray-500">No workout plans found. Create your first plan!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3 class="text-xl font-semibold mb-4">Update Workout Plan</h3>
            <form method="post">
                <input type="hidden" id="update_workout_id" name="workout_id">
                <label for="update_plan" class="block text-gray-700 mb-2">Workout Plan:</label>
                <input type="text" id="update_plan" name="plan" class="w-full p-3 border rounded-lg mb-4">
                <button id="update" type="submit" name="update" class="w-full py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                    Update Plan
                </button>
            </form>
        </div>
    </div>

    <script>
        function openModal(workout_id, plan) {
            document.getElementById('update_workout_id').value = workout_id;
            document.getElementById('update_plan').value = plan;
            document.getElementById('updateModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('updateModal').style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('updateModal')) {
                closeModal();
            }
        }
    </script>
</body>
</html>