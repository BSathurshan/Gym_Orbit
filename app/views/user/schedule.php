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
    <div id="event-modal" class="modal">
        <div class="modal-content">
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