document.addEventListener('DOMContentLoaded', function() {

    /////////// Configuration and State ///////////
    // Configuration
    const maxDaysFromToday = 30;
    const GYM_USERNAME = '01'; // Hardcoded gym username

    // DOM elements
    const elements = {
        calendarDays: document.getElementById('calendar-days'),
        monthYear: document.getElementById('month-year'),
        prevMonthBtn: document.getElementById('prev-month'),
        nextMonthBtn: document.getElementById('next-month'),
        notesList: document.getElementById('notes-list'),
        machineAvailability: document.getElementById('machine-availibility') // Assuming this exists in HTML
    };

    // State
    const state = {
        selectedDate: null,
        colors: {},
        notes: [],
        availability: {}
    };

    // Single source of Sri Lanka time
    let currentSriLankaDate = null;
    /////////// End Configuration and State ///////////

    /////////// Time and Initialization ///////////
    function getSriLankaTime() {
        const now = new Date();
        const sriLankaOffset = 5.5 * 60 * 60 * 1000; // 5.5 hours in milliseconds
        const utcTime = now.getTime() + (now.getTimezoneOffset() * 60 * 1000);
        const sriLankaDate = new Date(utcTime + sriLankaOffset);
        return sriLankaDate;
    }

    function init() {
        currentSriLankaDate = getSriLankaTime();
        state.currentMonth = currentSriLankaDate.getMonth();
        state.currentYear = currentSriLankaDate.getFullYear();

        // Initial load
        refreshData();
        generateCalendar(state.currentMonth, state.currentYear);
        setupEventListeners();

        // Auto-refresh every 5 seconds
        setInterval(refreshData, 5000);
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

        const today = new Date(currentSriLankaDate);
        today.setUTCHours(0, 0, 0, 0);
        today.setTime(today.getTime() + (5.5 * 60 * 60 * 1000));

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
                }
                if (cellDate < today || cellDate > maxDate) {
                    dayCell.classList.add('disabled');
                } else {
                    dayCell.addEventListener('click', () => selectDate(cellDate));
                }
                if (state.selectedDate && cellDate.getTime() === state.selectedDate.getTime()) {
                    dayCell.classList.add('selected');
                }
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
        document.querySelectorAll('.day').forEach(cell => cell.classList.remove('selected'));
        const selectedCell = document.querySelector(`[data-date="${date.toISOString().split('T')[0]}"]`);
        if (selectedCell) selectedCell.classList.add('selected');
    }
    /////////// End Calendar Functions ///////////

    /////////// Event Functions ///////////
    function setupEventListeners() {
        elements.prevMonthBtn.addEventListener('click', () => changeMonth(-1));
        elements.nextMonthBtn.addEventListener('click', () => changeMonth(1));
    }
    /////////// End Event Functions ///////////

    /////////// Notes Functions ///////////
    function displayNotes() {
        elements.notesList.innerHTML = '';
        if (state.notes.length === 0) {
            elements.notesList.innerHTML = '<p>No saved notes yet</p>';
            return;
        }

        state.notes.forEach(note => {
            const noteElement = document.createElement('div');
            noteElement.className = 'note-item';
            noteElement.innerHTML = `
                <div class="note-date">${note.date}</div>
                <div class="note-content">${note.content}</div>
            `;
            elements.notesList.appendChild(noteElement);
        });
    }
    /////////// End Notes Functions ///////////

    /////////// Storage and Database Functions ///////////
    function fetchSavedColors() {
        return fetch(`${ROOT}/user/getSavedColors?gym_username=${GYM_USERNAME}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            state.colors = data || {};
            console.log("Loaded colors:", state.colors);
            generateCalendar(state.currentMonth, state.currentYear); // Refresh calendar with colors
        })
        .catch(error => {
            console.error("Error fetching colors:", error);
            state.colors = {};
        });
    }

    function fetchNotesFromDatabase() {
        return fetch(`${ROOT}/user/getNotes?gym_username=${GYM_USERNAME}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            state.notes = data || [];
            console.log("Loaded notes:", state.notes);
            displayNotes();
        })
        .catch(error => {
            console.error("Error fetching notes:", error);
            state.notes = [];
            displayNotes();
        });
    }

    function fetchAvailabilityFromDatabase() {
        return fetch(`${ROOT}/user/getAvailability?gym_username=${GYM_USERNAME}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" }
        })
        .then(response => {
            if (!response.ok) throw new Error('Fetch failed with status: ${response.status}');
            return response.json();
        })
        .then(data => {
            let machines = data || [];
            console.log("Loaded availability:", machines);
            if (elements.machineAvailability) {
                // Clear the container
                elements.machineAvailability.innerHTML = '';
    
                // Mimic the PHP structure: if (isset($machines['found']) && $machines['found'] == 'yes')
                if (machines.length > 0) {
                    machines.forEach(machine => {
                        // Create the row
                        let row = document.createElement('div');
                        row.className = 'machine-row';
                        row.setAttribute('data-name', machine.name);
    
                        // Set the name (label)
                        let labelDiv = document.createElement('div');
                        let label = document.createElement('label');
                        label.className = 'label';
                        label.textContent = machine.name + ':';
                        labelDiv.appendChild(label);
    
                        // Set the image and availability
                        let contentDiv = document.createElement('div');
                        let img = document.createElement('img');
                        img.src = `${ROOT}/assets/images/machines/${machine.file}`;
                        img.width = 150;
                        img.title = machine.file;
                        let availableSpan = document.createElement('span');
                        availableSpan.className = 'available';
                        availableSpan.textContent = machine.available;
                        contentDiv.appendChild(img);
                        contentDiv.appendChild(availableSpan);
    
                        // Add to row
                        row.appendChild(labelDiv);
                        row.appendChild(contentDiv);
    
                        // Add row to container
                        elements.machineAvailability.appendChild(row);
                    });
                } else {
                    // Mimic the PHP else: echo "<p>No Machines found</p>";
                    elements.machineAvailability.innerHTML = '<p>No Machines found</p>';
                }
            }
        })
        .catch(error => {
            console.error("Error fetching availability:", error);
            if (elements.machineAvailability) {
                elements.machineAvailability.innerHTML = '<p>Error loading machines</p>';
            }
        });
    }
    // function displayAvailability() {
    //     if (!elements.machineAvailability) return;
    //     elements.machineAvailability.innerHTML = '';
    //     if (Object.keys(state.availability).length === 0) {
    //         elements.machineAvailability.innerHTML = '<p>No availability data</p>';
    //         return;
    //     }

    //     for (const [machine, value] of Object.entries(state.availability)) {
    //         const div = document.createElement('div');
    //         div.textContent = `${machine}: ${value}`;
    //         elements.machineAvailability.appendChild(div);
    //     }
    // }

    function refreshData() {
        fetchSavedColors();
        fetchNotesFromDatabase();
        fetchAvailabilityFromDatabase();
    }
    /////////// End Storage and Database Functions ///////////

    // Start it up
    init();
});