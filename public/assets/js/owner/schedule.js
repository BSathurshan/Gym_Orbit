const scheduleData = {};
const daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
const timeSlots = [
  "08:00-09:00",
  "09:00-10:00",
  "10:00-11:00",
  "11:00-12:00",
  "13:00-14:00",
  "14:00-15:00"
 
];

const container = document.getElementById('day-schedule-form');

daysOfWeek.forEach(day => {
  const box = document.createElement('div');
  box.className = 'day-box'; 
  box.dataset.day = day;

  const checkbox = document.createElement('input');
  checkbox.type = 'checkbox';
  checkbox.id = day;
  checkbox.disabled = true;

  const label = document.createElement('span');
  label.className = 'day-label';
  label.textContent = day.charAt(0).toUpperCase() + day.slice(1);

  const picker = document.createElement('div');
  picker.className = 'time-picker';
  picker.id = 'picker-' + day;

  // Add time slots
  timeSlots.forEach(slot => {
    const timeLabel = document.createElement('label');
    const timeCheckbox = document.createElement('input');
    timeCheckbox.type = 'checkbox';
    timeCheckbox.value = slot;
    timeLabel.appendChild(timeCheckbox);
    timeLabel.append(" " + slot);
    picker.appendChild(timeLabel);
  });

  // Add Save and Cancel buttons
  const saveBtn = document.createElement('button');
  saveBtn.type = 'button';
  saveBtn.textContent = 'Save';
  saveBtn.onclick = () => saveTime(day);

  const cancelBtn = document.createElement('button');
  cancelBtn.type = 'button';
  cancelBtn.textContent = 'Cancel';
  cancelBtn.onclick = () => cancelTime(day);

  picker.appendChild(saveBtn);
  picker.appendChild(cancelBtn);

  box.appendChild(checkbox);
  box.appendChild(document.createTextNode(' '));
  box.appendChild(label);
  box.appendChild(picker);

  container.appendChild(box);
});

// Make picker show when day label is clicked
document.addEventListener('click', function (e) {
  if (e.target.classList.contains('day-label')) {
    const dayId = e.target.textContent.trim().toLowerCase();
    document.querySelectorAll('.time-picker').forEach(p => p.style.display = 'none');
    document.getElementById('picker-' + dayId).style.display = 'block';
  }
});

function saveTime(dayId) {
  const picker = document.getElementById('picker-' + dayId);
  const selected = picker.querySelectorAll('input[type="checkbox"]:checked');
  
  if (selected.length > 0) {
    const times = Array.from(selected).map(cb => cb.value);
    scheduleData[dayId] = times;
    document.getElementById(dayId).checked = true;
  } else {
    delete scheduleData[dayId];
    document.getElementById(dayId).checked = false;
  }

  picker.style.display = 'none';
  updateHiddenInput();
}

function cancelTime(dayId) {
  const picker = document.getElementById('picker-' + dayId);
  
  picker.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
  
  delete scheduleData[dayId];
  document.getElementById(dayId).checked = false;

  picker.style.display = 'none';
  updateHiddenInput();
}

function updateHiddenInput() {
  document.getElementById('schedule-json').value = JSON.stringify(scheduleData);
  console.log('Saved Schedule:', scheduleData);
}


