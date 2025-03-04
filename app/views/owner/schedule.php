<div class="in-content">

        <div class="header">
        <div>

        <h2>Schedule</h2>

        </div>
        </div>

<div class="in-in-content">

                        <?php        
                        $owner = new Owner(); 
                        $machines = $owner->get_machines($username); 
                        ?>

        <div class="app-container">
                        <div class="calendar-container">
                                <div class="calendar-header">
                                        <button id="prev-month">&lt;</button>
                                        <h2 id="month-year">Month Year</h2>
                                        <button id="next-month">&gt;</button>
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
                        
                        <div class="events-list" id="events-list">
                                <!-- Events will be filled by JavaScript -->
                        </div>
                        
                        <button class="add-event-btn" id="add-event-btn">ADD EVENT</button>
             </div>
        
             
                        <div class="machine-container">


                                <div class="indicators">
                                        <button class="color-button" style="background-color: blue;" data-text="Opening soon" data-color="blue"></button>
                                        <button class="color-button" style="background-color: green;" data-text="Available" data-color="green"> </button>
                                        <button class="color-button" style="background-color: yellow;" data-text="Crowded" data-color="yellow"> </button>
                                        <button class="color-button" style="background-color: red;" data-text="Full" data-color="red">          </button>
                                        <button class="color-button" style="background-color: black;" data-text="Holiday" data-color="black">   </button>
                                </div>

                                <div class="machine-header">
                                        <h2>Availaible Machines</h2>
                                </div>
                                
                                <div class="machine-notes" id="machine-availibility">
                                   <?php
                                        if (isset( $machines['found'])&& $machines['found']=='yes') {
                                                while ($row = $machines['result']->fetch_assoc()) {
                                                        echo '<div class="machine-row">';
                                                        echo '<div><label class="label">' . $row["name"] . ':</label></div>';
                                                        echo '<div><img src="' . ROOT . '/assets/images/machines/' . $row["file"] . '" width="150" title="' . $row['file'] . '">';
                                                        echo '<input type="number" name="'. $row["name"] .'" min="0" max="' . $row["total"] . '" value="' . $row["available"] . '" 
                                                        step="1" required oninput="this.value = Math.min(this.max, Math.max(this.min, this.value))">';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                        }
                                        elseif (isset( $machines['found'])&& $machines['found']=='no') {
                                                echo "<p>No Machines found , add one!</p>";
                                        }

                                        ?>
                                </div>
                        </div>


                        <div class="notes-container">
                                <div class="notes-header">
                                        <h2>Notes</h2>
                                        <button id="save-notes-btn">Save</button>
                                </div>
                                <textarea id="notes-area" placeholder="Write your notes here..."></textarea>
                                <div class="saved-notes" id="saved-notes">
                                        <h3>Saved Notes</h3>
                                        <div id="notes-list">
                                        <!-- Notes will be filled by JavaScript -->
                                        </div>
                        </div>
                        </div>

                </div>                 

                                        <!-- Modal for adding events -->
                                        <div id="event-modal" class="calendar-modal">
                                                <div class="calendar-modal-content">
                                                <span class="close">&times;</span>
                                                <h3>Add New Event</h3>
                                                <form class="event-form" id="event-form">
                                                        <div class="form-group">
                                                        <label for="event-title">Event Title</label>
                                                        <input type="text" id="event-title" required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="event-time">Time</label>
                                                        <input type="time" id="event-time" required>
                                                        </div>
                                                        <button type="submit" class="add-event-btn">Add Event</button>
                                                </form>
                                                </div>
                                        </div>


</div>
</div>