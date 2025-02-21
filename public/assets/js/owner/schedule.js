// Function to dynamically set the days container
function setupScheduleContainer(containerId) {
  const daysContainer = document.getElementById(containerId);

  const days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
  
  days.forEach(day => {
    // Create a container for each day
    const dayContainer = document.createElement("div");
    dayContainer.classList.add("day-container");

    // Add the day label
    const dayLabel = document.createElement("span");
    dayLabel.textContent = day;
    dayLabel.classList.add("day-label");

    // Wrapper for the time slots
    const timeWrapper = document.createElement("div");
    timeWrapper.classList.add("time-wrapper");

    // Add the first time row
    addTimeRow(timeWrapper, day);

    // Append to the day container
    dayContainer.appendChild(dayLabel);
    dayContainer.appendChild(timeWrapper);

    // Append to the main days container
    daysContainer.appendChild(dayContainer);
  });
}

// Function to add a time row
function addTimeRow(wrapper, day) {
const timeRow = document.createElement("div");
timeRow.classList.add("time-row");

// Start time input
const startTime = document.createElement("input");
startTime.type = "time";
startTime.name = `startTime[${day}][]`; // Grouped by day

// End time input
const endTime = document.createElement("input");
endTime.type = "time";
endTime.name = `endTime[${day}][]`; // Grouped by day

// Add (+) button
const addButton = document.createElement("button");
addButton.type = "button";
addButton.textContent = "+";
addButton.addEventListener("click", () => addTimeRow(wrapper, day));

// Remove (-) button
const removeButton = document.createElement("button");
removeButton.type = "button";
removeButton.textContent = "-";
removeButton.addEventListener("click", () => {
  if (wrapper.children.length > 1) {
    wrapper.removeChild(timeRow);
  }
});

// Append inputs and buttons to the row
timeRow.appendChild(startTime);
timeRow.appendChild(endTime);
timeRow.appendChild(addButton);
timeRow.appendChild(removeButton);

// Append the row to the wrapper
wrapper.appendChild(timeRow);
}
