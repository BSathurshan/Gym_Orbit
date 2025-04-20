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
    fetch('user/get_notification', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        const box = document.getElementById("notification-box");
        box.innerHTML = "";

        if (data.found === 'yes') {
            data.result.forEach(item => {
                const div = document.createElement("div");
                div.style.padding = "8px";
                div.style.marginBottom = "10px";
                div.style.borderBottom = "1px solid #eee";
                div.style.background = "#111";
                div.style.color = "#fff";
                div.style.borderRadius = "5px";

                div.innerHTML = `
                    <em>Issue: ${item.issue}</em><br>
                    ${item.message}<br>
                    <small>${item.time}</small>
                `;

                box.appendChild(div);
            });
        } else {
            box.innerHTML = "<p style='color:white;'>No notifications found.</p>";
        }
    })
    .catch(err => {
        console.error("Error fetching notifications:", err);
        document.getElementById("notification-box").innerHTML = "<p style='color:white;'>Error loading notifications.</p>";
    });
}

