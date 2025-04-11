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
  $admin=new Admin();

  $result1= $admin->getNof_Users();
//   echo "<h4> Total Users: " . $result['result'] . "</h4>";

  $result2= $admin->getNof_Owners();
//   echo "<h4> Total Owners: " . $result['result'] . "</h4>";

  $result3= $admin->getNof_Instructors();
//   echo "<h4> Total Instructors: " . $result['result'] . "</h4>";


?>

<?php 
    $admin = new Admin();
    $recentUsers = $admin->getRecent_Users();
    $pendingGyms = $admin->getPending_Gyms();
?>

<h3>Recent Users</h3>
<ul>
<?php 
    if($recentUsers['found'] == 'yes'){
        foreach($recentUsers['result'] as $user){
            echo "<li>" . htmlspecialchars($user['username']) . " - " . $user['created_at'] . "</li>";
        }
    } else {
        echo "<li>No recent users found.</li>";
    }
?>
</ul>

<h3>Pending Gym Approvals</h3>
<ul>
<?php 
    if($pendingGyms['found'] == 'yes'){
        foreach($pendingGyms['result'] as $gym){
            echo "<li>" . htmlspecialchars($gym['gym_name']) . " - Owner: " . $gym['owner_name'] . "</li>";
        }
    } else {
        echo "<li>No pending gyms.</li>";
    }
?>
</ul>


<div class="cards">
    <div class = "card">

        <div class="box">
            <h2>
                <?php echo $result1['result'];?>
            </h2>
            
            <h4>Total Users</h4>
        </div>
        <div class="icon-case">
            <i class="fas fa-users"></i>
        </div>
    </div>  
    
    <div class = "card">

        <div class="box">
            <h2>
                <?php echo $result2['result'];?>
            </h2>
            
            <h4>Total Gyms</h4>
        </div>
        <div class="icon-case">
            <i class="fas fa-building"></i>
        </div>
    </div> 

    <div class = "card">

        <div class="box">
            <h2>
                <?php echo $result3['result'];?>
            </h2>
            
            <h4>Total Instructors</h4>
        </div>
        <div class="icon-case">
            <i class="fas fa-user-graduate"></i>
        </div>
    </div> 
</div>

</div>
</div>