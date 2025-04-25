const ROOT = "http://localhost:8080/mvc/public"; 

//function postEdit(name, file, gymUsername)
function requestInstructor(username,name,gym_username,trainer_username,trainer_name) {

    if (confirm('Are you sure you want to request this instructor?')) {
      
        window.location.href = ROOT + "/user/sendRequest?gym_username=" + encodeURIComponent(gym_username) +
        "&trainer_username=" + encodeURIComponent(trainer_username) +
        "&trainer_name=" + encodeURIComponent(trainer_name) +
        "&name=" + encodeURIComponent(name) +
        "&username=" + encodeURIComponent(username);
    
    }
}

//////////////////

document.getElementById('searchQuery2').addEventListener('input', function () {
    const searchQuery2 = this.value;

    // Get the hidden values for username and name
    const username = document.getElementById('username').value;
    const name = document.getElementById('name').value;

    // Construct the URL with query parameters
    const url = ROOT + `/user/searchGym?search=${encodeURIComponent(searchQuery2)}&username=${encodeURIComponent(username)}&name=${encodeURIComponent(name)}`;

    // Fetch user data dynamically based on the input and hidden values
    fetch(url)
        .then(response => response.text())
        .then(data => {
            // Update the gymResults container
            document.getElementById('searchGymResults').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
});

window.addEventListener('DOMContentLoaded', function () {
    // Reusable function to load data
    function loadData(url, elementId) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById(elementId).innerHTML = data;
            })
            .catch(error => console.error(`Error loading ${url}:`, error));
    }

    // Initial load of gym data
    const username = document.getElementById('username').value;
    const name = document.getElementById('name').value;

    const url =ROOT + `/user/searchGym?username=${encodeURIComponent(username)}&name=${encodeURIComponent(name)}`;
    loadData(url, 'searchGymResults');
});

function payGym(gym_username, username, option) {
    const redirectURL = ROOT + "/user/payGym?gym_username=" + gym_username + "&username=" + username + "&option=" + option
    window.location.href = redirectURL;
  }  

function joinGym(gym_username,gym_name,username,name) {
  
    if (confirm('Are you sure you want to join ?')) {
      
      
        window.location.href = "./gym/join.php?gym_username=" + encodeURIComponent(gym_username) + "&gym_name=" + encodeURIComponent(gym_name) + "&username=" + encodeURIComponent(username) + "&name=" + encodeURIComponent(name);

    }
}

function leaveGym(gym_username,username) {
  
    if (confirm('Are you sure you want to leave ?')) {
      
      
        window.location.href = ROOT + "/user/leaveGym?gym_username=" + encodeURIComponent(gym_username) + "&username=" + encodeURIComponent(username);



    }
}

function createTicket(username) {
  
    document.getElementById('USER_NAME').value = username; 
 
    document.getElementById('SupportFormModal').style.display = 'block';
}


function closeEditModal() {

    document.getElementById('SupportFormModal').style.display = 'none';
    document.getElementById('editUserFormModal').style.display = 'none';


}


//function postEdit(name, file, gymUsername)
function editProfile(name,contact,age,address) {

    document.getElementById('name').value = name;
    document.getElementById('contact').value = contact; 
    document.getElementById('location').value = address;
    document.getElementById('age').value = age;
  //  document.getElementById('gender').value = gender;
  // document.getElementById('goal').value = goal;

    // Show the modal
    document.getElementById('editUserFormModal').style.display = 'block';
}

let isVisible = false;

function toggleNotifications() {
    const box = document.getElementById("notification-box");

    if (isVisible) {
        box.style.display = "none";
        isVisible = false;
    } else {
        fetchNotifications();
        box.style.display = "block";
        isVisible = true;
    }
}

function fetchNotifications() {
    console.log("ROOT URL:", ROOT);
    console.log("Fetching URL:", `${ROOT}/user/get_notification`);
    fetch(`${ROOT}/user/get_notification`, {
        method: 'POST',
        credentials: 'include',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        console.log("Response status:", response.status, response.statusText);
        if (!response.ok) {
            return response.text().then(text => {
                throw new Error(`HTTP error: ${response.status} ${response.statusText}, Response: ${text}`);
            });
        }
        return response.json();
    })
    .then(data => {
        console.log("Response data:", data);
        const box = document.getElementById("notification-box");
        box.innerHTML = `
            <button id="close-notifications" aria-label="Close notifications">❌</button>
            <div class="notification-content"></div>
        `;
        const content = box.querySelector(".notification-content");

        if (data.found === 'yes') {
            data.result.forEach(item => {
                const div = document.createElement("div");
                div.className = "notification-item";
                div.innerHTML = `
                    <em>Issue: ${item.issue}</em><br>
                    ${item.message}<br>
                    <small>${item.time}</small>
                `;
                content.appendChild(div);
            });
        } else if (data.error === 'Not logged in') {
            content.innerHTML = "<p class='notification-message'>Please log in to view notifications.</p>";
        } else {
            content.innerHTML = "<p class='notification-message'>No notifications found.</p>";
        }

        // Add event listener for close button
        document.getElementById("close-notifications").addEventListener("click", closeNotifications);
    })
    .catch(err => {
        console.error("Error fetching notifications:", err.message);
        document.getElementById("notification-box").innerHTML = `
            <button id="close-notifications" aria-label="Close notifications">❌</button>
            <p class="notification-message">Error loading notifications: ${err.message}</p>
        `;
        // Add event listener for close button in error case
        document.getElementById("close-notifications").addEventListener("click", closeNotifications);
    });
}

function closeNotifications() {
    const box = document.getElementById("notification-box");
    box.style.display = "none";
    isVisible = false;
}

function viewPaymentPage() {
    const tab = document.getElementById("payment-page-tab"); 
    const tabPage = document.getElementById("payment-page-tab-page");

    const scheduleTab = document.getElementById("schedule-page-tab");
    const scheduleTabPage = document.getElementById("schedule-page-tab-page"); 

    if (tab && tabPage && scheduleTab && scheduleTabPage) {
        tab.className = "tabs activetab";
        scheduleTab.className = "tabs";

        tabPage.className = "descriptor active";
        scheduleTabPage.className = "descriptor";
    }
}
