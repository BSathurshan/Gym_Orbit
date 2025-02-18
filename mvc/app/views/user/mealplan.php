<?php 
if (!isset($_SESSION["username"])) {
    header("Location: ../../../login/login.php");
    exit();
}
else{

    $username = $_SESSION["username"];
    $userDetails = $_SESSION["userDetails"];
    $email=$userDetails["email"];
    $name=$userDetails["name"];
    $contact=$userDetails["contact"];
    $age=$userDetails["age"];
    $gender=$userDetails["gender"];
    $goals=$userDetails["goals"];
    $password=$userDetails["password"];
    $profile_image=$userDetails["file"];

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>User Dashboard</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/main.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/custom.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/buttons.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/edit.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/userDashboard.css">
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/progressTracker.css">
    <script src="<?= ROOT ?>/assets/js/user/user_1.js" defer></script>
    <script src="<?= ROOT ?>/assets/js/user/user_2.js" defer></script> -->
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/user/plan.css">


    <style>
    
        

        @media (max-width: 768px) {
            #main-div {
                flex-direction: column;
            }
            #sidebar-div {
                width: 100%;
                height: 100px;
            }
            #bodyarea-div {
                flex: 1;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="content">
        <div class="descriptor active" value="1">
            <div class="header">
                <div class="p-8">
                    <h1 class="text-2xl font-bold mb-4">Meal Plan</h1>
                    <p class="text-gray-600 mb-6"><?php echo date("l, F j, Y"); ?></p>

                    <!-- Add Meal Plan Form -->
                    <form name="meal" method="post" class="mb-8">
                        <input type="text" name="username" value="<?php echo $username; ?>" class="hidden">
                        <div class="flex gap-2">
                            <input type="text" name="day" placeholder="Enter Day" class="flex-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <input type="text" name="meal" placeholder="Enter your meal plan" class="flex-1 p-3 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <button type="submit" name="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors shadow-sm">
                                Add Meal Plan
                            </button>
                        </div>
                    </form>

                    <!-- Meal Plans Grid -->
                    <h2 class="text-xl font-semibold mb-4">Your Meal Plans</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-7 gap-6">
                        <?php if (!empty($result)): ?>
                            <?php foreach ($result as $plan): ?>
                                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                                    <h3 class="text-lg font-semibold text-blue-500 mb-4">
                                        <?php echo htmlspecialchars($plan['day']); ?>
                                    </h3>
                                    <p class="text-gray-600 mb-4">
                                        <?php echo htmlspecialchars($plan['meal']); ?>
                                    </p>
                                    <div class="flex justify-end gap-2">
                                        <button 
                                            onclick="openModal('<?php echo $plan['meal_id']; ?>', '<?php echo htmlspecialchars($plan['day']); ?>', '<?php echo htmlspecialchars($plan['meal']); ?>')" 
                                            class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">
                                            Update
                                        </button>
                                        <form method="post" style="display:inline;" onsubmit="return deleteMealPlan(this);">
                                            <input type="hidden" name="meal_id" value="<?php echo $plan['meal_id']; ?>">
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
                                <p class="text-gray-500">No meal plans found. Create your first plan!</p>
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
            <h3 class="text-xl font-semibold mb-4">Update Meal Plan</h3>
            <form method="post">
                <input type="hidden" id="update_meal_id" name="meal_id">
                <label for="update_day" class="block text-gray-700 mb-2">Day:</label>
                <input type="text" id="update_day" name="day" class="w-full p-3 border rounded-lg mb-4">
                <label for="update_meal" class="block text-gray-700 mb-2">Meal Plan:</label>
                <input type="text" id="update_meal" name="meal" class="w-full p-3 border rounded-lg mb-4">
                <button id="update" type="submit" name="update" class="w-full py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                    Update Plan
                </button>
            </form>
        </div>
    </div>

    <script>
        function openModal(meal_id, day, meal) {
            document.getElementById('update_meal_id').value = meal_id;
            document.getElementById('update_day').value = day;
            document.getElementById('update_meal').value = meal;
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