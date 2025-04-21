
<link rel="stylesheet" type="text/css" href="<?= ROOT ?>/assets/css/admin/dashboard.css">
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

      


        <!-- Display the number of users, gyms, and instructors -->
        <div class="dashboard-cards">
    <div class="dashboard-card">
        <div class="card-content">
            <h2><?php echo $result1['result']; ?></h2>
            <p>Total Users</p>
        </div>
        <div class="card-icon">
            <i class="fas fa-users"></i>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-content">
            <h2><?php echo $result2['result']; ?></h2>
            <p>Total Gyms</p>
        </div>
        <div class="card-icon">
            <i class="fas fa-building"></i>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-content">
            <h2><?php echo $result3['result']; ?></h2>
            <p>Total Instructors</p>
        </div>
        <div class="card-icon">
            <i class="fas fa-user-graduate"></i>
        </div>
    </div>
</div>


       

    </div>

</div>
