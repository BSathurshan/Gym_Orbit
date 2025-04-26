// Predefined exercises
const predefinedExercises = [
    "Push-ups",
    "Squats",
    "Bench Press",
    "Deadlift",
    "Plank",
    "Pull-ups"
  ];
  
  // Weekdays
  const weekdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
  
  // Open modal
  function openWorkoutmodal(username) {
    document.getElementById('workoutModal').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
  
    // Set the hidden field value
    document.getElementById('assigned_user').value = username;
  
    // Load weekdays UI
    loadWeekdays();
  }
  
  
  // Close modal
  function closeWorkoutmodal() {
    document.getElementById('workoutModal').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
  }
  
  // Load weekdays
  function loadWeekdays() {
    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    const container = document.getElementById('daysContainer');
    container.innerHTML = '';
  
    days.forEach(day => {
      const dayDiv = document.createElement('div');
      dayDiv.className = 'day-section';
      dayDiv.innerHTML = `
        <h3>${day} <button type="button" onclick="addExerciseRow('${day}')">+</button></h3>
        <div id="${day}-exercises" class="exercise-list"></div>
      `;
      container.appendChild(dayDiv);
    });
  }
  
  
  // Add exercise row
  function addExerciseRow(day) {
    const exerciseList = document.getElementById(`${day}-exercises`);
  
    const row = document.createElement('div');
    row.className = 'exercise-row';
  
    let options = `<option value="">Select Exercise</option>`;
    predefinedExercises.forEach(ex => {
      options += `<option value="${ex}">${ex}</option>`;
    });
    options += `<option value="custom">Other (Type manually)</option>`;
  
    row.innerHTML = `
      <select onchange="toggleCustomExercise(this)">
        ${options}
      </select>
      <input type="text" name="exercises[${day}][]" placeholder="Or type exercise" style="display:none;">
      
      <input type="text" name="sets[${day}][]" placeholder="Sets">
      <input type="text" name="reps[${day}][]" placeholder="Reps">
      <button type="button" onclick="this.parentElement.remove()">Remove</button>
    `;
  
    exerciseList.appendChild(row);
  }
  
  
  
  // Toggle between select and manual input
  function toggleCustomExercise(select) {
    const input = select.nextElementSibling; // the hidden input field
  
    if (select.value === 'custom') {
      input.style.display = 'inline-block';
      input.value = '';
      input.focus();
    } else if (select.value !== '') {
      input.style.display = 'none';
      input.value = select.value; // Auto-fill input with selected value
    } else {
      input.style.display = 'none';
      input.value = '';
    }
  }
  
  