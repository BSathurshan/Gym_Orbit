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
        machineAvailability: document.getElementById('machine-availibility'),
        bookingModal: document.getElementById('booking-modal'),
        bookingModalClose: document.getElementById('booking-modal-close'),
        bookingDate: document.getElementById('booking-date'),
        bookingDateRepeat: document.getElementById('booking-date-repeat'),
        bookingYes: document.getElementById('booking-yes'),
        bookingNo: document.getElementById('booking-no'),
        bookingStep1: document.getElementById('booking-step-1'),
        bookingStep2: document.getElementById('booking-step-2'),
        bookingStep3: document.getElementById('booking-step-3'),
        bookingTimeSlots: document.getElementById('booking-time-slots'),
        instructorYes: document.getElementById('instructor-yes'),
        instructorNo: document.getElementById('instructor-no'),
        instructorAvailability: document.getElementById('instructor-availability'),
        instructorList: document.getElementById('instructor-list'),
        confirmBooking: document.getElementById('confirm-booking'),
        cancelBooking: document.getElementById('cancel-booking')
    };

    // State
    const state = {
        selectedDate: null,
        colors: {},
        notes: [],
        availability: {},
        gymTimes: null,
        instructorTimes: null,
        selectedTimeSlot: null // Store the selected time slot
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
    
        // Get the weekday in lowercase (e.g., "monday")
        const weekdayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        const weekday = weekdayNames[date.getDay()];
    
        // Show the modal with the selected date
        const dateString = date.toISOString().split('T')[0];
        elements.bookingDate.textContent = dateString;
        elements.bookingDateRepeat.textContent = dateString;
        elements.bookingModal.style.display = 'block';
        elements.bookingStep1.style.display = 'block';
        elements.bookingStep2.style.display = 'none';
        elements.bookingStep3.style.display = 'none';
    
        // Fetch gym times and populate the time slots as clickable divs
        fetchGymTimes().then(() => {
            const timeSlotsContainer = elements.bookingTimeSlots;
            timeSlotsContainer.innerHTML = '';
            const times = state.gymTimes[weekday] || '';
            if (times) {
                const timeSlots = times.split(','); // Split "08:00-09:00,09:00-10:00"
                timeSlots.forEach(slot => {
                    const slotDiv = document.createElement('div');
                    slotDiv.className = 'time-slot';
                    slotDiv.textContent = slot;
                    slotDiv.dataset.time = slot;
                    timeSlotsContainer.appendChild(slotDiv);
                });
            } else {
                timeSlotsContainer.innerHTML = '<p>No available times for this day.</p>';
            }
        });
    }
    /////////// End Calendar Functions ///////////

    /////////// Event Functions ///////////
    function setupEventListeners() {
        elements.prevMonthBtn.addEventListener('click', () => changeMonth(-1));
        elements.nextMonthBtn.addEventListener('click', () => changeMonth(1));
    
        // Modal close button
        elements.bookingModalClose.addEventListener('click', () => {
            elements.bookingModal.style.display = 'none';
            state.selectedInstructor = null; // Reset on close
        });
    
        // Click outside modal to close
        window.addEventListener('click', (event) => {
            if (event.target === elements.bookingModal) {
                elements.bookingModal.style.display = 'none';
                state.selectedInstructor = null; // Reset on close
            }
        });
    
        // Booking Yes/No buttons
        elements.bookingYes.addEventListener('click', () => {
            elements.bookingStep1.style.display = 'none';
            elements.bookingStep2.style.display = 'block';
        });
    
        elements.bookingNo.addEventListener('click', () => {
            elements.bookingModal.style.display = 'none';
            state.selectedInstructor = null; // Reset on close
        });
    
        // Handle time slot selection
        elements.bookingTimeSlots.addEventListener('click', (event) => {
            const slot = event.target.closest('.time-slot');
            if (slot) {
                document.querySelectorAll('.time-slot').forEach(s => s.classList.remove('selected'));
                slot.classList.add('selected');
                state.selectedTimeSlot = slot.dataset.time;
            }
        });
    
        // Instructor Yes/No buttons
        elements.instructorYes.addEventListener('click', () => {
            if (!state.selectedTimeSlot) {
                alert("Please select a time slot first!");
                return;
            }
    
            // Get the weekday again
            const weekdayNames = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
            const weekday = weekdayNames[state.selectedDate.getDay()];
    
            // Fetch instructor times and show details
            fetchInstructorTimes().then(() => {
                const availableInstructors = state.instructorTimes.filter(instructor => {
                    const instructorTimes = instructor.times[weekday] || '';
                    const availableTimes = instructorTimes ? instructorTimes.split(',') : [];
                    return availableTimes.includes(state.selectedTimeSlot);
                });
    
                elements.bookingStep2.style.display = 'none';
                elements.bookingStep3.style.display = 'block';
                elements.instructorAvailability.textContent = availableInstructors.length > 0
                    ? `Available instructors for ${state.selectedTimeSlot} on ${elements.bookingDate.textContent}:`
                    : `No instructors available for ${state.selectedTimeSlot} on ${elements.bookingDate.textContent}.`;
    
                // Display instructor details
                elements.instructorList.innerHTML = '';
                if (availableInstructors.length > 0) {
                    availableInstructors.forEach(instructor => {
                        const instructorCard = document.createElement('div');
                        instructorCard.className = 'instructor-card';
                        instructorCard.dataset.trainerUsername = instructor.trainer_username; // Store trainer_username
                        instructorCard.innerHTML = `
                            <img src="${ROOT}/assets/images/instructor/profile/images/${instructor.file}" alt="${instructor.trainer_name}">
                            <div class="instructor-details">
                                <p><strong>${instructor.trainer_name}</strong></p>
                                <p>Age: ${instructor.age}</p>
                                <p>Gender: ${instructor.gender}</p>
                            </div>
                        `;
                        elements.instructorList.appendChild(instructorCard);
                    });
    
                    // Add click event to instructor cards
                    elements.instructorList.querySelectorAll('.instructor-card').forEach(card => {
                        card.addEventListener('click', () => {
                            // Remove .selected from all cards
                            elements.instructorList.querySelectorAll('.instructor-card').forEach(c => c.classList.remove('selected'));
                            // Add .selected to the clicked card
                            card.classList.add('selected');
                            // Store the selected instructor
                            state.selectedInstructor = card.dataset.trainerUsername;
                        });
                    });
                }
            });
        });
    
        elements.instructorNo.addEventListener('click', () => {
            if (!state.selectedTimeSlot) {
                alert("Please select a time slot first!");
                return;
            }
    
            elements.bookingStep2.style.display = 'none';
            elements.bookingStep3.style.display = 'block';
            elements.instructorAvailability.textContent = `Booking confirmed for ${state.selectedTimeSlot} on ${elements.bookingDate.textContent} without an instructor.`;
            elements.instructorList.innerHTML = '';
            state.selectedInstructor = null; // Reset instructor selection
        });
    
        // Confirm/Cancel buttons
        elements.confirmBooking.addEventListener('click', () => {
            // If instructors are available but none selected, prompt user
            const hasInstructors = elements.instructorAvailability.textContent.includes("Available instructors");
            if (hasInstructors && !state.selectedInstructor) {
                alert("Please select an instructor before confirming the booking!");
                return;
            }
    
            // Prepare booking data (removed username)
            const bookingData = {
                gym_username: GYM_USERNAME, // Hardcoded as '01'
                trainer_username: state.selectedInstructor || null, // Selected instructor or null if none
                date: elements.bookingDate.textContent, // Selected date
                time: state.selectedTimeSlot // Selected time slot
            };
    
            // Send booking data to the server
            fetch(`${ROOT}/user/saveBooking`, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(bookingData)
            })
            .then(response => {
                if (!response.ok) throw new Error('Failed to save booking');
                return response.json();
            })
            .then(data => {
                console.log("Booking saved:", data);
                alert("Booking confirmed successfully!");
                elements.bookingModal.style.display = 'none';
                state.selectedInstructor = null; // Reset on confirm
            })
            .catch(error => {
                console.error("Error saving booking:", error);
                alert("Failed to save booking. Please try again.");
            });
        });
    
        elements.cancelBooking.addEventListener('click', () => {
            elements.bookingModal.style.display = 'none';
            state.selectedInstructor = null; // Reset on cancel
        });
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
    function fetchGymTimes() {
        return fetch(`${ROOT}/user/getGymTimes?gym_username=${GYM_USERNAME}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            state.gymTimes = data || {};
            console.log("Loaded gym times:", state.gymTimes);
        })
        .catch(error => {
            console.error("Error fetching gym times:", error);
            state.gymTimes = {};
        });
    }
    
    function fetchInstructorTimes() {
        return fetch(`${ROOT}/user/getInstructorTimes?gym_username=${GYM_USERNAME}`, {
            method: "GET",
            headers: { "Content-Type": "application/json" }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            state.instructorTimes = data || [];
            console.log("Loaded instructor times:", state.instructorTimes);
        })
        .catch(error => {
            console.error("Error fetching instructor times:", error);
            state.instructorTimes = [];
        });
    }
    // Start it up
    init();
});