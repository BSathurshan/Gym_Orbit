document.addEventListener('DOMContentLoaded', function() {

    /////////// Configuration and State ///////////
    // Configuration
    const maxDaysFromToday = 30;

    // DOM elements
    const elements = {
        calendarDays: document.getElementById('calendar-days'),
        monthYear: document.getElementById('month-year'),
        prevMonthBtn: document.getElementById('prev-month'),
        nextMonthBtn: document.getElementById('next-month'),
        closeModal: document.querySelector('.close'),
        eventModal: document.getElementById('event-modal'),
        addEventBtn: document.getElementById('add-event-btn'),
        eventForm: document.getElementById('event-form'),
        eventsList: document.getElementById('events-list'),
        notesArea: document.getElementById('notes-area'),
        saveNotesBtn: document.getElementById('save-notes-btn'),
        notesList: document.getElementById('notes-list')
    };

    // State
    const state = {
        selectedDate: null,
        events: {},
        notes: [],
        colors: {} // New: Store date-color pairs from database
    };

    // Single source of Sri Lanka time
    let currentSriLankaDate = null;
    /////////// End Configuration and State ///////////

    /////////// Time and Initialization ///////////
    // Helper function to get Sri Lanka time (UTC+05:30)
    function getSriLankaTime() {
        const now = new Date();
        const sriLankaOffset = 5.5 * 60 * 60 * 1000; // 5.5 hours in milliseconds
        const utcTime = now.getTime() + (now.getTimezoneOffset() * 60 * 1000);
        const sriLankaDate = new Date(utcTime + sriLankaOffset);
        console.log("getSriLankaTime output:", sriLankaDate.toISOString().split('T')[0], sriLankaDate.toLocaleString('en-US', { timeZone: 'Asia/Colombo' }));
        return sriLankaDate;
    }

    // Initialize
    function init() {
        loadFromLocalStorage();
    
        currentSriLankaDate = getSriLankaTime();
        state.currentMonth = currentSriLankaDate.getMonth();
        state.currentYear = currentSriLankaDate.getFullYear();
        console.log("Init - Today:", currentSriLankaDate.toISOString().split('T')[0], "Month:", state.currentMonth, "Year:", state.currentYear);
    
        fetchSavedColors().then(() => {
            generateCalendar(state.currentMonth, state.currentYear);
            const today = new Date(currentSriLankaDate);
            today.setUTCHours(0, 0, 0, 0);
            today.setTime(today.getTime() + (5.5 * 60 * 60 * 1000));
            state.selectedDate = today;
            generateCalendar(state.currentMonth, state.currentYear);
        });
    
        fetchNotesFromDatabase(); // Load notes from database instead of just displaying local
        setupEventListeners();
    
        document.querySelectorAll(".color-button").forEach(button => {
            button.addEventListener("click", function() {
                let selectedColor = getComputedStyle(this).backgroundColor;
                let activeDay = document.querySelector(".selected");
    
                if (activeDay) {
                    let selectedDate = activeDay.dataset.date;
                    activeDay.style.backgroundColor = selectedColor;
                    state.colors[selectedDate] = selectedColor;
                    updateColorInDatabase(selectedDate, selectedColor);
                }
            });
        });
    
        document.querySelectorAll('#machine-availibility input[type="number"]').forEach(input => {
            input.addEventListener("change", function() {
                updateAvailabilityInDatabase();
            });
        });
    }
    /////////// End Time and Initialization ///////////

    /////////// Calendar Functions ///////////
    function generateCalendar(month, year) {
        elements.calendarDays.innerHTML = '';
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                           'July', 'August', 'September', 'October', 'November', 'December'];
        elements.monthYear.textContent = `${monthNames[month]} ${year}`;

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const prevMonthDays = new Date(year, month, 0).getDate();
        const totalCells = Math.ceil((firstDay + daysInMonth) / 7) * 7;

        // Use Sri Lanka time for reference dates
        const today = new Date(currentSriLankaDate);
        today.setUTCHours(0, 0, 0, 0); // Midnight UTC
        today.setTime(today.getTime() + (5.5 * 60 * 60 * 1000)); // Adjust to Sri Lanka midnight
        console.log("GenerateCalendar - Today:", today.toISOString().split('T')[0]);

        const maxDate = new Date(currentSriLankaDate);
        maxDate.setUTCHours(0, 0, 0, 0);
        maxDate.setTime(maxDate.getTime() + (5.5 * 60 * 60 * 1000) + (maxDaysFromToday * 24 * 60 * 60 * 1000));

        for (let i = 0; i < totalCells; i++) {
            const dayCell = document.createElement('div');
            dayCell.classList.add('day');
    
            if (i < firstDay) {
                dayCell.textContent = prevMonthDays - firstDay + i + 1;
                dayCell.classList.add('other-month', 'disabled');
            } else if (i < firstDay + daysInMonth) {
                const date = i - firstDay + 1;
                dayCell.textContent = date;
    
                const cellDate = new Date(Date.UTC(year, month, date));
                cellDate.setUTCHours(0, 0, 0, 0);
                cellDate.setTime(cellDate.getTime() + (5.5 * 60 * 60 * 1000));
                const dateKey = cellDate.toISOString().split('T')[0];
                dayCell.dataset.date = dateKey;
    
                if (cellDate.getTime() === today.getTime()) {
                    dayCell.classList.add('today');
                    console.log("Today cell set for:", dateKey);
                }
                if (cellDate < today) {
                    dayCell.classList.add('disabled');
                } else if (cellDate > maxDate) {
                    dayCell.classList.add('disabled');
                } else {
                    dayCell.addEventListener('click', () => selectDate(cellDate));
                }
                if (state.selectedDate && cellDate.getTime() === state.selectedDate.getTime()) {
                    dayCell.classList.add('selected');
                }
                // Apply saved color *after* classes to ensure it overrides
                if (state.colors[dateKey]) {
                    dayCell.style.backgroundColor = state.colors[dateKey];
                }
            } else {
                dayCell.textContent = i - firstDay - daysInMonth + 1;
                dayCell.classList.add('other-month', 'disabled');
            }
    
            elements.calendarDays.appendChild(dayCell);
        }
    }

    function changeMonth(step) {
        state.currentMonth += step;
        if (state.currentMonth > 11) {
            state.currentMonth = 0;
            state.currentYear++;
        } else if (state.currentMonth < 0) {
            state.currentMonth = 11;
            state.currentYear--;
        }
        generateCalendar(state.currentMonth, state.currentYear);
    }

    function selectDate(date) {
        state.selectedDate = date;
        document.querySelectorAll('.day').forEach(cell => {
            cell.classList.remove('selected');
        });
        let selectedCell = document.querySelector(`[data-date="${date.toISOString().split('T')[0]}"]`);
        if (selectedCell) {
            selectedCell.classList.add('selected');
            console.log("Selected date:", date.toISOString().split('T')[0]);
        }
        // Only regenerate calendar if needed (e.g., month change), not here
        displayEvents(date);
    }
    /////////// End Calendar Functions ///////////

    /////////// Event Functions ///////////
    function setupEventListeners() {
        elements.prevMonthBtn.addEventListener('click', () => changeMonth(-1));
        elements.nextMonthBtn.addEventListener('click', () => changeMonth(1));
        elements.closeModal.addEventListener('click', () => elements.eventModal.style.display = 'none');
        window.addEventListener('click', (event) => {
            if (event.target === elements.eventModal) {
                elements.eventModal.style.display = 'none';
            }
        });
        elements.addEventBtn.addEventListener('click', () => {
            if (state.selectedDate) {
                elements.eventModal.style.display = 'block';
            } else {
                alert('Please select a date first');
            }
        });
        elements.eventForm.addEventListener('submit', addEvent);
        elements.saveNotesBtn.addEventListener('click', saveNote);
    }

    function addEvent(e) {
        e.preventDefault();
        const title = document.getElementById('event-title').value;
        const time = document.getElementById('event-time').value;
        const dateKey = state.selectedDate.toDateString();

        state.events[dateKey] = state.events[dateKey] || [];
        state.events[dateKey].push({ title, time });

        saveToLocalStorage();
        displayEvents(state.selectedDate);

        elements.eventForm.reset();
        elements.eventModal.style.display = 'none';
    }

    function displayEvents(date) {
        const dateKey = date.toDateString();
        const dateEvents = state.events[dateKey] || [];
        elements.eventsList.innerHTML = '<h3>Events</h3>';

        if (dateEvents.length === 0) {
            elements.eventsList.innerHTML += '<p>No events for this date</p>';
            return;
        }

        dateEvents.sort((a, b) => a.time.localeCompare(b.time));
        dateEvents.forEach(event => {
            const eventElement = document.createElement('div');
            eventElement.className = 'event-item';
            eventElement.innerHTML = `
                <span class="event-time">${formatTime(event.time)}</span>
                <span class="event-title">${event.title}</span>
            `;
            elements.eventsList.appendChild(eventElement);
        });
    }

    function formatTime(time) {
        const [hours, minutes] = time.split(':');
        const period = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12;
        return `${formattedHours}:${minutes} ${period}`;
    }
    /////////// End Event Functions ///////////

    /////////// Notes Functions ///////////
    function saveNote() {
        const content = elements.notesArea.value.trim();
        if (content) {
            const note = {
                id: Date.now(), // Unique based on milliseconds
                content,
                date: currentSriLankaDate.toLocaleString('en-US', { timeZone: 'Asia/Colombo' })
            };
            state.notes.unshift(note);
            elements.notesArea.value = '';

            // Save to database via AJAX
            fetch(ROOT + "/owner/saveNote", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(note)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log("Note saved to database:", data);
                saveToLocalStorage(); // Save locally too
                displayNotes(); // Refresh display
            })
            .catch(error => {
                console.error("Error saving note to database:", error);
                // Still save locally as fallback
                saveToLocalStorage();
                displayNotes();
            });
        }
    }

    function displayNotes() {
        elements.notesList.innerHTML = '';
        if (state.notes.length === 0) {
            elements.notesList.innerHTML += '<p>No saved notes yet</p>';
            return;
        }

        state.notes.forEach(note => {
            const noteElement = document.createElement('div');
            noteElement.className = 'note-item';
            noteElement.innerHTML = `
                <div class="note-date">${note.date}</div>
                <div class="note-content">${note.content}</div>
                <button class="delete-note" data-id="${note.id}">×</button>
            `;
            elements.notesList.appendChild(noteElement);
        });

        document.querySelectorAll('.delete-note').forEach(button => {
            button.addEventListener('click', function() {
                deleteNote(parseInt(this.dataset.id));
            });
        });
    }

    function deleteNote(id) {
        // Send delete request to database
        fetch(ROOT + "/owner/deleteNote", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: id })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log("Note deleted from database:", data);
            state.notes = state.notes.filter(note => note.id !== id); // Remove from state
            saveToLocalStorage(); // Update local storage
            displayNotes(); // Refresh display
        })
        .catch(error => {
            console.error("Error deleting note from database:", error);
            // Remove locally anyway as fallback
            state.notes = state.notes.filter(note => note.id !== id);
            saveToLocalStorage();
            displayNotes();
        });
    }
    /////////// End Notes Functions ///////////

    /////////// Storage and Database Functions ///////////
    function saveToLocalStorage() {
        localStorage.setItem('calendarEvents', JSON.stringify(state.events));
        localStorage.setItem('calendarNotes', JSON.stringify(state.notes));
    }

    function loadFromLocalStorage() {
        const savedEvents = localStorage.getItem('calendarEvents');
        const savedNotes = localStorage.getItem('calendarNotes');
        if (savedEvents) state.events = JSON.parse(savedEvents);
        if (savedNotes) state.notes = JSON.parse(savedNotes);
    }

    function fetchSavedColors() {
        return fetch(ROOT + "/owner/getSavedColors", {
            method: "GET",
            headers: { "Content-Type": "application/json" }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Expect data like { "2025-04-09": "rgb(255, 255, 0)", "2025-04-10": "rgb(0, 128, 0)" }
            state.colors = data || {};
            console.log("Loaded colors from database:", state.colors);
        })
        .catch(error => {
            console.error("Error fetching saved colors:", error);
            state.colors = {}; // Fallback to empty object
        });
    }

    function updateColorInDatabase(date, color) {
        let requestData = { date: date, color: color };

        console.log("Sending data:", requestData); // Debug

        fetch(ROOT + "/owner/updateTodayColor", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ date: date, color: color })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log("Color Updated:", data);
        })
        .catch(error => {
            console.error("Error updating color:", error);
        });
    }

    function updateAvailabilityInDatabase() {
        let availabilityData = {};

        // Collect all the updated availability values
        document.querySelectorAll('#machine-availibility input[type="number"]').forEach(input => {
            let machineName = input.name; // Get the machine name from the input name
            let availability = input.value;
            availabilityData[machineName] = availability; // Store the updated availability
        });

        // Send the availability data to the server via AJAX
        fetch(ROOT + "/owner/updateAvailability", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ availability: availabilityData })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the JSON response
        })
        .then(data => {
            console.log("Database Updated", data); // Log success response from server
        })
        .catch(error => {
            console.error("Error updating database:", error); // Handle any errors
        });
    }

    function fetchNotesFromDatabase() {
        return fetch(ROOT + "/owner/getNotes", {
            method: "GET",
            headers: { "Content-Type": "application/json" }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            state.notes = data || []; // Expect array of { id, content, date }
            console.log("Loaded notes from database:", state.notes);
            saveToLocalStorage(); // Sync local storage
            displayNotes(); // Show them
        })
        .catch(error => {
            console.error("Error fetching notes:", error);
            loadFromLocalStorage(); // Fallback to local storage
            displayNotes();
        });
    }
    /////////// End Storage and Database Functions ///////////

    // Kick off initialization
    init();
});