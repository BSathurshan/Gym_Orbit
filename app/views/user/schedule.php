<div class="in-content">
    <div class="header">
        <div>
            <h2>Schedule</h2>
        </div>
    </div>

    <div class="in-in-content">

    <?php 
            $user = new User(); 
            $gymDetails = $user->joinedGyms($username); 

            echo "<div class='gym-table'>"; 
            if ($gymDetails['found'] == 'yes') {
                while ($rowRequested = $gymDetails['result']->fetch_assoc()) {
                    echo "<div class='cell' style='display: none;'><p>" . $rowRequested['gym_username'] . "</p></div>";

                    echo "<div class='row'>"; 
                    echo "<div class='cell'>
                    <div class='image'>
                        <img src='" . ROOT . "/assets/images/owner/profile/images/" . htmlspecialchars($rowRequested['file'], ENT_QUOTES, 'UTF-8') . "' alt='Profile Image'>
                    </div>
                </div>";
                            echo "<div class='cell'><p>" . $rowRequested['gym_name'] . "</p></div>";
                    echo "<div class='cell'><button onclick=\"viewGymSchedule('" . htmlspecialchars($rowRequested['gym_username'], ENT_QUOTES, 'UTF-8') . "')\">view</button></div>";
                    echo "</div>";
                }
            } elseif ($gymDetails['found'] == 'no') {
                echo "<p>" . $gymDetails['message'] . "!</p>";
            }
            echo "</div>"; // Close the container
            ?>
            
    </div>
</div>

<div id="booking-modal" class="booking-modal">
    <div class="booking-modal-content">
        <span class="booking-modal-close" id="booking-modal-close">×</span>
        <h3>Book a Schedule</h3>
        <div id="booking-step-1">
            <p>Do you want to book a schedule for <span id="booking-date"></span>?</p>
            <button id="booking-yes">Yes</button>
            <button id="booking-no">No</button>
        </div>
        <div id="booking-step-2" style="display: none;">
            <p>Select a time slot for <span id="booking-date-repeat"></span>:</p>
            <div id="booking-time-slots" class="time-slots">
                <!-- JavaScript will fill this with clickable divs -->
            </div>
            <p>Do you need an instructor?</p>
            <button id="instructor-yes">Yes</button>
            <button id="instructor-no">No</button>
        </div>
        <div id="booking-step-3" style="display: none;">
            <p id="instructor-availability"></p>
            <div id="instructor-list" class="instructor-list">
                <!-- JavaScript will fill this with instructor details -->
            </div>
            <button id="confirm-booking">Confirm Booking</button>
            <button id="cancel-booking">Cancel</button>
        </div>
    </div>
</div>


<div  class="main-calendar" id="main-calendar" style="display: none;">
        <div class="app-container">
                    <div class="calendar-container">
                        <div class="calendar-header">
                            <button id="prev-month"><</button>
                            <h2 id="month-year">Month Year</h2>
                            <button id="next-month">></button>

                            <button onclick='closeGymSchedule()'>❌</button>
                        </div>
                        <div class="weekdays">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="days" id="calendar-days">
                            <!-- Days will be filled by JavaScript -->
                        </div>
                    </div>

                    <div class="machine-container">
                        <div class="machine-header">
                            <h2>Available Machines</h2>
                        </div>
                        <div class="machine-notes" id="machine-availibility" data-availability="">
                            <!-- JavaScript will fill this -->
                        </div>
                    </div>

                    <div class="notes-container">
                        <div class="notes-header">
                            <h2>Notes</h2>
                        </div>
                        <div id="notes-list">
                            <!-- Notes will be filled by JavaScript -->
                        </div>
                    </div>
            </div>
</div>