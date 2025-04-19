<div class="in-content">

    <div class="header">
        <div>
            <h1>Welcome, <?php echo $username; ?>!</h1>       
            <p>
                <?php
                echo date("l, F j, Y"); // Outputs: Wednesday, December 18, 2024
                ?></p>
        </div>
    </div>

    <div class="in-in-content">
        <h2>Admin Dashboard</h2>

        <?php 
            $admin = new Admin();

            $result1 = $admin->getNof_Users(); // Total Users
            $result2 = $admin->getNof_Owners(); // Total Owners
            $result3 = $admin->getNof_Instructors(); // Total Instructors
        ?>

        <?php 
            // Fetch recent users and pending gyms
            $recentUsers = $admin->getRecent_Users();
            $pendingGyms = $admin->getPending_Gyms();
        ?>

        <!-- Display recent users in a table -->
<h3>Recent Users</h3>
<?php if ($recentUsers['found'] == 'yes'): ?>
    <table border="1" cellspacing="0" cellpadding="8">
        <thead>
            <tr>
                <th>Username</th>
                <th>Joined Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($recentUsers['result'] as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No recent users found.</p>
<?php endif; ?>

<!-- Display pending gyms in a table -->
<h3>Pending Gym Approvals</h3>
<?php if ($pendingGyms['found'] == 'yes'): ?>
    <table border="1" cellspacing="0" cellpadding="8">
        <thead>
            <tr>
                <th>Gym Name</th>
                <th>Owner Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pendingGyms['result'] as $gym): ?>
                <tr>
                    <td><?php echo htmlspecialchars($gym['gym_name']); ?></td>
                    <td><?php echo htmlspecialchars($gym['owner_name']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No pending gyms.</p>
<?php endif; ?>


        <!-- Display the number of users, gyms, and instructors -->
        <div class="cards">
            <div class="card">
                <div class="box">
                    <h2><?php echo $result1['result']; ?></h2>
                    <h4>Total Users</h4>
                </div>
                <div class="icon-case">
                    <i class="fas fa-users"></i>
                </div>
            </div>  

            <div class="card">
                <div class="box">
                    <h2><?php echo $result2['result']; ?></h2>
                    <h4>Total Gyms</h4>
                </div>
                <div class="icon-case">
                    <i class="fas fa-building"></i>
                </div>
            </div> 

            <div class="card">
                <div class="box">
                    <h2><?php echo $result3['result']; ?></h2>
                    <h4>Total Instructors</h4>
                </div>
                <div class="icon-case">
                    <i class="fas fa-user-graduate"></i>
                </div>
            </div> 
        </div>

        <!-- Display Gender Distribution Chart -->
        <h3>Gender Distribution of Users</h3>
        <canvas id="genderChart"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Fetch gender data from PHP and pass it to JavaScript
            const genderData = <?php echo json_encode($genderData); ?>;

            console.log(genderData);

            const labels = genderData.map(item => item.gender);
            const data = genderData.map(item => item.count);

            const ctx = document.getElementById('genderChart').getContext('2d');
            const genderChart = new Chart(ctx, {
                type: 'pie', // You can also use 'bar' if you prefer a bar chart
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Gender Distribution',
                        data: data,
                        backgroundColor: ['#36A2EB', '#FF6384'], // Colors for male and female
                        borderColor: ['#36A2EB', '#FF6384'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top'
                        }
                    }
                }
            });
        </script>

    </div>

</div>
