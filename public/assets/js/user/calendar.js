document.addEventListener('DOMContentLoaded', function() {
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
        currentDate: new Date(),
        selectedDate: null,
        events: {},
        notes: []
    };
    
    // Initialize
    init();
    
    function init() {
        // Load saved data
        loadFromLocalStorage();
        
        // Set up calendar
        const today = new Date();
        state.currentMonth = today.getMonth();
        state.currentYear = today.getFullYear();
        
        // Generate calendar and display notes
        generateCalendar(state.currentMonth, state.currentYear);
        displayNotes();
        
        // Set up event listeners
        setupEventListeners();
    }
    
    function setupEventListeners() {
        // Navigation
        elements.prevMonthBtn.addEventListener('click', () => changeMonth(-1));
        elements.nextMonthBtn.addEventListener('click', () => changeMonth(1));
        
        // Modal
        elements.closeModal.addEventListener('click', () => elements.eventModal.style.display = 'none');
        window.addEventListener('click', (event) => {
            if (event.target === elements.eventModal) {
                elements.eventModal.style.display = 'none';
            }
        });
        
        // Add event
        elements.addEventBtn.addEventListener('click', () => {
            if (state.selectedDate) {
                elements.eventModal.style.display = 'block';
            } else {
                alert('Please select a date first');
            }
        });
        
        // Event form
        elements.eventForm.addEventListener('submit', addEvent);
        
        // Save notes
        elements.saveNotesBtn.addEventListener('click', saveNote);
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
    
    function addEvent(e) {
        e.preventDefault();
        
        const title = document.getElementById('event-title').value;
        const time = document.getElementById('event-time').value;
        const dateKey = state.selectedDate.toDateString();
        
        // Initialize array if needed
        state.events[dateKey] = state.events[dateKey] || [];
        
        // Add event
        state.events[dateKey].push({ title, time });
        
        // Save and update
        saveToLocalStorage();
        displayEvents(state.selectedDate);
        
        // Reset form and close modal
        elements.eventForm.reset();
        elements.eventModal.style.display = 'none';
    }
    
    function saveNote() {
        const content = elements.notesArea.value.trim();
        
        if (content) {
            // Create note object
            const note = {
                id: Date.now(),
                content,
                date: new Date().toLocaleString()
            };
            
            // Add to beginning of array
            state.notes.unshift(note);
            
            // Clear textarea
            elements.notesArea.value = '';
            
            // Save and update
            saveToLocalStorage();
            displayNotes();
        }
    }
    
    function generateCalendar(month, year) {
        // Clear previous days
        elements.calendarDays.innerHTML = '';
        
        // Update header
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 
                           'July', 'August', 'September', 'October', 'November', 'December'];
        elements.monthYear.textContent = `${monthNames[month]} ${year}`;
        
        // Get calendar data
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const prevMonthDays = new Date(year, month, 0).getDate();
        const totalCells = Math.ceil((firstDay + daysInMonth) / 7) * 7;
        
        // Reference dates
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        
        const maxDate = new Date();
        maxDate.setDate(maxDate.getDate() + maxDaysFromToday);
        maxDate.setHours(0, 0, 0, 0);
        
        // Generate cells
        for (let i = 0; i < totalCells; i++) {
            const dayCell = document.createElement('div');
            dayCell.classList.add('day');
            
            if (i < firstDay) {
                // Previous month
                dayCell.textContent = prevMonthDays - firstDay + i + 1;
                dayCell.classList.add('other-month', 'disabled');
            } 
            else if (i < firstDay + daysInMonth) {
                // Current month
                const date = i - firstDay + 1;
                dayCell.textContent = date;
                
                const cellDate = new Date(year, month, date);
                cellDate.setHours(0, 0, 0, 0);
                
                // Apply classes and event listeners
                if (cellDate.getTime() === today.getTime()) {
                    dayCell.classList.add('today');
                }
                
                if (cellDate < today) {
                    dayCell.classList.add('disabled');
                } 
                else if (cellDate > maxDate) {
                    dayCell.classList.add('disabled');
                } 
                else {
                    dayCell.addEventListener('click', () => selectDate(cellDate));
                }
                
                if (state.selectedDate && cellDate.getTime() === state.selectedDate.getTime()) {
                    dayCell.classList.add('selected');
                }
            } 
            else {
                // Next month
                dayCell.textContent = i - firstDay - daysInMonth + 1;
                dayCell.classList.add('other-month', 'disabled');
            }
            
            elements.calendarDays.appendChild(dayCell);
        }
    }
    
    function displayEvents(date) {
        const dateKey = date.toDateString();
        const dateEvents = state.events[dateKey] || [];
        
        elements.eventsList.innerHTML = '<h3>Events</h3>';
        
        if (dateEvents.length === 0) {
            elements.eventsList.innerHTML += '<p>No events for this date</p>';
            return;
        }
        
        // Sort by time
        dateEvents.sort((a, b) => a.time.localeCompare(b.time));
        
        // Create event elements
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
    
    function displayNotes() {
        elements.notesList.innerHTML = '';
        
        if (state.notes.length === 0) {
            elements.notesList.innerHTML = '<p>No saved notes yet</p>';
            return;
        }
        
        // Create note elements
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
        
        // Add delete handlers
        document.querySelectorAll('.delete-note').forEach(button => {
            button.addEventListener('click', function() {
                deleteNote(parseInt(this.dataset.id));
            });
        });
    }
    
    function deleteNote(id) {
        state.notes = state.notes.filter(note => note.id !== id);
        saveToLocalStorage();
        displayNotes();
    }
    
    function selectDate(date) {
        state.selectedDate = date;
        generateCalendar(state.currentMonth, state.currentYear);
        displayEvents(date);
    }
    
    function formatTime(time) {
        const [hours, minutes] = time.split(':');
        const period = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12;
        return `${formattedHours}:${minutes} ${period}`;
    }
    
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
}); 