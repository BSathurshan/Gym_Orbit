const instructorScheduleData = {};
const instructorDaysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
const instructorTimeSlots = [
  "08:00-09:00",
  "09:00-10:00",
  "10:00-11:00",
  "11:00-12:00",
  "13:00-14:00",
  "14:00-15:00"
];

const instructorContainer = document.getElementById('instructor-day-schedule-form');

instructorDaysOfWeek.forEach(day => {
  const box = document.createElement('div');
  box.className = 'instructor-day-box'; 
  box.dataset.day = day;

  const checkbox = document.createElement('input');
  checkbox.type = 'checkbox';
  checkbox.id = 'instructor-checkbox-' + day;
  checkbox.disabled = true;

  const label = document.createElement('span');
  label.className = 'instructor-day-label';
  label.textContent = day.charAt(0).toUpperCase() + day.slice(1);

  const picker = document.createElement('div');
  picker.className = 'instructor-time-picker';
  picker.id = 'instructor-picker-' + day;

  // Add time slots
  instructorTimeSlots.forEach(slot => {
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
  saveBtn.onclick = () => instructorSaveTime(day);

  const cancelBtn = document.createElement('button');
  cancelBtn.type = 'button';
  cancelBtn.textContent = 'Cancel';
  cancelBtn.onclick = () => instructorCancelTime(day);

  picker.appendChild(saveBtn);
  picker.appendChild(cancelBtn);

  box.appendChild(checkbox);
  box.appendChild(document.createTextNode(' '));
  box.appendChild(label);
  box.appendChild(picker);

  instructorContainer.appendChild(box);
});

// Show picker on instructor label click
document.addEventListener('click', function (e) {
  if (e.target.classList.contains('instructor-day-label')) {
    const dayId = e.target.textContent.trim().toLowerCase();
    document.querySelectorAll('.instructor-time-picker').forEach(p => p.style.display = 'none');
    document.getElementById('instructor-picker-' + dayId).style.display = 'block';
  }
});

function instructorSaveTime(dayId) {
  const picker = document.getElementById('instructor-picker-' + dayId);
  const selected = picker.querySelectorAll('input[type="checkbox"]:checked');
  
  if (selected.length > 0) {
    const times = Array.from(selected).map(cb => cb.value);
    instructorScheduleData[dayId] = times;
    document.getElementById('instructor-checkbox-' + dayId).checked = true;
  } else {
    delete instructorScheduleData[dayId];
    document.getElementById('instructor-checkbox-' + dayId).checked = false;
  }

  picker.style.display = 'none';
  updateInstructorHiddenInput();
}

function instructorCancelTime(dayId) {
  const picker = document.getElementById('instructor-picker-' + dayId);
  
  picker.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
  
  delete instructorScheduleData[dayId];
  document.getElementById('instructor-checkbox-' + dayId).checked = false;

  picker.style.display = 'none';
  updateInstructorHiddenInput();
}

function updateInstructorHiddenInput() {
  document.getElementById('instructor-schedule-json').value = JSON.stringify(instructorScheduleData);
  console.log('Instructor Schedule:', instructorScheduleData);
}
