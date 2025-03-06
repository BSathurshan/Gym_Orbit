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