<div class="in-content">
        <!-- Dashboard -->

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
    <div class="table">
        <h2>Profile</h2>
            <div class="row">
                <div class="title">Owner Name</div>
                <div class="data"> <?php echo $owner_name; ?> </div>
            </div>
            <div class="row">
                <div class="title">Gym Name</div>
                <div class="data"> <?php echo $gym_name; ?> </div>
            </div>
            <div class="row">
                <div class="title">Email</div>
                <div class="data"> <?php echo $email; ?> </div>
            </div>
            <div class="row">
                <div class="title">Phone</div>
                <div class="data"> <?php echo $owner_contact; ?> </div>
            </div>
            <div class="row">
                <div class="title">Gym Contact</div>
                <div class="data"> <?php echo $gym_contact; ?> </div>
            </div>
            <div class="row">
                <div class="title">Age</div>
                <div class="data"> <?php echo $age; ?> </div>
            </div>
            <div class="row">
                <div class="title">Gender</div>
                <div class="data"> <?php echo $gender; ?> </div>
            </div>
            <div class="row">
                <div class="title">Address</div>
                <div class="data"> <?php echo $location; ?> </div>
            </div>
            <div class="row">
                <div class="title">Since</div>
                <div class="data"> <?php echo $start_year; ?> </div>
            </div>
            <div class="row">
                <div class="title">Joined</div>
                <div class="data"> <?php echo $joined; ?> </div>
            </div>
            <div class="row">
                <div class="title">Experience</div>
                <div class="data"> <?php echo $experience; ?> </div>
            </div>
            <div class="row">
                <div class="title">Website</div>
                <div class="data"> <?php echo $web; ?> </div>
            </div>
            <div class="row">
                <div class="title">Social</div>
                <div class="data"> <?php echo $social; ?> </div>
            </div>
            <div class="row" style="display: none;">
                <div class="title">Password</div>
                <div class="data"> <?php echo $password; ?> </div>
            </div>

            <!-- 
            <div class="editsave">
                <button class="save" type="submit">
                    <i class="fa-solid fa-floppy-disk"></i>Save
                </button>
            </div>
        </form>
        <div class="editsave">
            <button class="edit activebtn" onclick="editable()">
                <i class="fa-solid fa-pen-to-square"></i>Edit
            </button>
        </div>
            -->

            <div class="editsave">
                <button class="save" type="submit" onclick='editGymSchedule()'>
                    <i class="fa-solid fa-calendar-days"> Schedule </i>
                </button>
            </div>

    </div>
</div>

</div>


                        <!-- Hidden Schedule Form (Modal) -->
                        <!-- <div id="gymScheduleFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Schedule</h3>
                       
                            
                            <input type="hidden" name="gym_username" id="GYM_username" >            
                                <div id="daysContainer1"> -->
                                    <!-- Days will be dynamically generated here -->
                                <!-- </div>
                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                        
                        </div>
                    </div> -->

                    


                    <!-- Hidden Schedule Form (Modal) -->
                    <div id="gymScheduleFormModal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <h3>Edit Schedule</h3>
                            <form id="timeForm" action="<?= ROOT ?>/owner/editGymSchedule" method="POST">
                            
                            <input type="hidden" name="gym_username" id="GYM_username" >            
                            <div id="day-schedule-form">
                                <!-- ...your day inputs and time pickers... -->
                            </div>

                            <!-- This holds the schedule as a JSON string -->
                            <input type="hidden" name="schedule_data" id="schedule-json">

                                <button type="submit">Submit</button>
                                <button type="button" onclick="closeEditModal()">Cancel</button>
                            </form>
                        </div>
                    </div>
