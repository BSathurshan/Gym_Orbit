<div class="in-content">
    <div class="header">
        <div>
            <h2>Gym Details</h2>
        </div>
    </div>

    <div class="in-in-content">
        <div class="table">
            <?php
                             $instructor = new Instructor(); 
                             $result = $instructor->getGyms($gym_username); 

            
            ?>
            <?php if ($result['found']=='yes') {
                             $gym_details=$result['result'];
            ?>
                <div class="row">
                    <div class="title">Gym</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['gym_name']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Owner</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['owner_name']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Email</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['email']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Location</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['location']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Gym Contact</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['gym_contact']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Owner Contact</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['owner_contact']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Start Year</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['start_year']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Joined Date</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['joined']); ?></div>
                </div>
                <div class="row">
                    <div class="title">Webpage</div>
                    <div class="data"><?php echo htmlspecialchars($gym_details['web']); ?></div>
                </div>


                <div class="profile-image-container">
                <div class="profile-title">Profile</div>
                <div class="profile-image">
                    <img src="<?php echo htmlspecialchars(ROOT . '/assets/images/owner/profile/images/' . $gym_details['file']); ?>" alt="Gym Image" class="gym-profile-img">
                </div>
                </div>

            <?php } else { ?>
                <div class="row">
                    <div class="data">No gym details found.</div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>