const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
              "August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
});

document.querySelectorAll(".color-button").forEach(button => {
    button.addEventListener("click", function() {
        let selectedColor = getComputedStyle(this).backgroundColor; // Get the actual computed background color
        let activeDay = document.querySelector(".days li.active");

        if (activeDay) {
            // Update the background color of the active day's pseudo-element
            activeDay.style.setProperty('--active-day-color', selectedColor);

            // Conditionally change the text color to black if the selected color is yellow
            if (selectedColor === 'rgb(255, 255, 0)') { // RGB value for yellow
                activeDay.style.setProperty('--active-day-text-color', '#000'); 
            } else {
                activeDay.style.setProperty('--active-day-text-color', '#fff'); 
            }
        }
    });
});

// Listen for changes in availability fields
document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener("change", function() {
        // When the availability is changed, send the update to the server
        updateAvailabilityInDatabase();
    });
});

// Function to send updated availability to the server
function updateAvailabilityInDatabase() {
    let availabilityData = {};

    // Collect all the updated availability values
    document.querySelectorAll('input[type="number"]').forEach(input => {
        let machineName = input.name; // Get the machine name from the input name
        let availability = input.value;
        availabilityData[machineName] = availability; // Store the updated availability
    });

    // Send the availability data to the server via AJAX
    fetch("update_machines.php", {
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

