<div class="in-content">
    <div class="header">
        <div>
            <h2>Schedule</h2>
        </div>
    </div>

    <div class="in-in-content">
        <div class="app-container">
            <div class="calendar-container">
                <div class="calendar-header">
                    <button id="prev-month"><</button>
                    <h2 id="month-year">Month Year</h2>
                    <button id="next-month">></button>
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