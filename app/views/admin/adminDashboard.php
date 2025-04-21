<div class="in-content">
    <!-- Dashboard -->

    <div class="header">
    
        <div>
            <h2>Dashboard</h2>
        </div>
    </div>

    <div class="in-in-content dashboard-content">
        <?php
        $admin = new Admin();
        $dashboardData = $admin->get_dashboard_data();

        $paymentsData = $admin->get_payment_records();

        ?>
        <div class="dashboard-boxes">
            <?php if (isset($dashboardData['found']) && $dashboardData['found'] == 'yes' && $dashboardData['result']->num_rows > 0): ?>
                <?php $data = $dashboardData['result']->fetch_assoc(); ?>
                <div class="dashboard-box primary">
                    <i class="fa fa-users"></i>
                    <h4><?php echo htmlspecialchars($data['owner_count']); ?></h4>
                    <p>Owners</p>
                </div>
                <div class="dashboard-box success">
                    <i class="fa fa-dumbbell"></i>
                    <h4><?php echo htmlspecialchars($data['instructor_count']); ?></h4>
                    <p>Instructors</p>
                </div>
                <div class="dashboard-box info">
                    <i class="fa fa-user-friends"></i>
                    <h4><?php echo htmlspecialchars($data['user_count']); ?></h4>
                    <p>Users</p>
                </div>
                <div class="dashboard-box warning">
                    <i class="fa fa-chart-line"></i>
                    <h4><?php echo htmlspecialchars($data['total_revenue']); ?></h4>
                    <p>Total Revenue</p>
                </div>
            <?php elseif (isset($dashboardData['found']) && $dashboardData['found'] == 'no'): ?>
                <p>No Dashboard Data found!</p>
            <?php endif; ?>
        </div>
        <div class="bottom-charts">
            <div class="chart-container-left">
                <h3>Gender Distribution</h3>
                <canvas id="genderChart"></canvas>
                <?php if (isset($dashboardData['found']) && $dashboardData['found'] == 'yes' && $dashboardData['result']->num_rows > 0): ?>
                    <p>Male: <?php echo htmlspecialchars($data['male_user_count']); ?>, Female: <?php echo htmlspecialchars($data['female_user_count']); ?></p>
                <?php endif; ?>
            </div>

            <div class="chart-container-right">
                <h3>Last 12 Months Payments</h3>
                <canvas id="paymentsChart"></canvas>
                <?php if (isset($paymentsData['found']) && $paymentsData['found'] == 'no'): ?>
                    <p>No Payment Data found!</p>
                <?php endif; ?>
            </div>
        </div>

        <script>
            <?php if (isset($dashboardData['found']) && $dashboardData['found'] == 'yes' && $dashboardData['result']->num_rows > 0): ?>
                const genderCanvas = document.getElementById('genderChart');
                const genderData = {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [
                            <?php echo htmlspecialchars($data['male_user_count']); ?>,
                            <?php echo htmlspecialchars($data['female_user_count']); ?>
                        ],
                        backgroundColor: ['#36a2eb', '#ff6384'],
                        hoverOffset: 4
                    }]
                };
                new Chart(genderCanvas, {
                    type: 'pie',
                    data: genderData,
                });
            <?php endif; ?>

            <?php if (isset($paymentsData['found']) && $paymentsData['found'] == 'yes' && is_array($paymentsData['result'])): ?>
                const paymentsCanvas = document.getElementById('paymentsChart');
                const paymentsLabels = <?php echo json_encode(array_column($paymentsData['result'], 'payment_day')); ?>;
                const paymentsAmounts = <?php echo json_encode(array_column($paymentsData['result'], 'total_amount')); ?>;

                const paymentsChartData = {
                    labels: paymentsLabels,
                    datasets: [{
                        label: 'Total Payments',
                        data: paymentsAmounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                };

                new Chart(paymentsCanvas, {
                    type: 'bar',
                    data: paymentsChartData,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Amount'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Date'
                                }
                            }
                        }
                    }
                });
            <?php endif; ?>
        </script>

    </div>
</div>