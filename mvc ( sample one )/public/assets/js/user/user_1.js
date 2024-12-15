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
    const url = `./gym/search.php?search=${encodeURIComponent(searchQuery2)}&username=${encodeURIComponent(username)}&name=${encodeURIComponent(name)}`;

    // Fetch user data dynamically based on the input and hidden values
    fetch(url)
        .then(response => response.text())
        .then(data => {
            // Update the gymResults container
            document.getElementById('gymResults').innerHTML = data;
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

    const url = `./gym/search.php?username=${encodeURIComponent(username)}&name=${encodeURIComponent(name)}`;
    loadData(url, 'gymResults');
});


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
