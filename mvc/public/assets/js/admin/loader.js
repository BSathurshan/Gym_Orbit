const ROOT = "http://localhost:8080/mvc/public"; 

function closeEditModal() {

    document.getElementById('editMaterialFormModal').style.display = 'none';
    document.getElementById('editPostFormModal').style.display = 'none';
    document.getElementById('editUserFormModal').style.display = 'none';
    document.getElementById('addUserFormModal').style.display = 'none';
    document.getElementById('addOwnerFormModal').style.display = 'none';
    document.getElementById('addInstructorFormModal').style.display = 'none';
    document.getElementById('addAdminFormModal').style.display = 'none';
    document.getElementById('editInstructorFormModal').style.display = 'none';
    document.getElementById('editOwnerFormModal').style.display = 'none';
}


function materialEdit(type,title,oldFilename,details,gymUsername,id) {

    document.getElementById('editType').value = type;
    document.getElementById('editTitle').value = title;
    document.getElementById('editDetails').value = details; 
    document.getElementById('gym_Username').value = gymUsername;
    document.getElementById('_id').value = id; 
    document.getElementById('old_FileName').value = oldFilename; 
 
   

    // Show the modal
    document.getElementById('editMaterialFormModal').style.display = 'block';
}

function materialDelete(id, gymUsername, file,access) {
  
    if (confirm('Are you sure you want to delete this machine?')) {
      
        window.location.href = "../Owner/materials/delete.php?id=" + encodeURIComponent(id) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername)  + "&access=" + encodeURIComponent(access);
    }
}


function postEdit(title,oldFilename,details,gymUsername,id) {

    document.getElementById('editNewTitle').value = title;
    document.getElementById('editNewDetails').value = details;
    document.getElementById('gymUsername').value = gymUsername; 
    document.getElementById('id').value = id; 
    document.getElementById('oldFilename').value = oldFilename; 
 
   

    // Show the modal
    document.getElementById('editPostFormModal').style.display = 'block';
}

function postDelete(id, gymUsername, file,access) {
  
    if (confirm('Are you sure you want to delete this post?')) {
      
        window.location.href = "../Owner/posts/delete.php?id=" + encodeURIComponent(id) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername)+ "&access=" + encodeURIComponent(access);
    }
}

function userDelete(username, email,file) {
  
    if (confirm('Are you sure you want to delete this user?')) {
      
        window.location.href = "./users/delete.php?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}

function userBan(username, email ,ban) {
  
    if (confirm('Are you sure you want to ban this user?')) {
      
        window.location.href = "./users/ban.php?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function userUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this user?')) {
      
      
        window.location.href = "./users/ban.php?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

    }
}

function userEdit(old_username,old_email,username,email,name,contact,location) {

    document.getElementById('old_username').value = old_username;
    document.getElementById('old_email').value = old_email;

    document.getElementById('username').value = username;
    document.getElementById('email').value = email; 
    document.getElementById('name').value = name;
    document.getElementById('contact').value = contact; 
    document.getElementById('location').value = location;

    // Show the modal
    document.getElementById('editUserFormModal').style.display = 'block';
}

//////////////////

document.getElementById('searchQuery').addEventListener('input', function () {
    const searchQuery = this.value;

    const url = ROOT + `/admin/searchUsers?search=${encodeURIComponent(searchQuery)}`;
    
    // Fetch user data dynamically based on the input
    fetch(url)
        .then(response => response.text())
        .then(data => {
            // Update the userResults container
            document.getElementById('userResults').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
});


//////////////////


document.getElementById('searchQuery2').addEventListener('input', function () {
    const searchQuery2 = this.value;
    const url = ROOT + `/admin/searchGyms?search=${encodeURIComponent(searchQuery2)}`;

    // Fetch user data dynamically based on the input
    fetch(url)
        .then(response => response.text())
        .then(data => {
            // Update the userResults container
            document.getElementById('ownerResults').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
});

//////////////////


document.getElementById('searchQuery3').addEventListener('input', function () {
    const searchQuery3 = this.value;
    const url = ROOT + `/admin/searchInstructors?search=${encodeURIComponent(searchQuery3)}`;

    // Fetch user data dynamically based on the input
    fetch(url)
        .then(response => response.text())
        .then(data => {
            // Update the userResults container
            document.getElementById('instructorResults').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
});


//////////////////


document.getElementById('searchQuery4').addEventListener('input', function () {
    const searchQuery4 = this.value;
    const url = ROOT + `/admin/searchAdmins?search=${encodeURIComponent(searchQuery4)}`;

    // Fetch user data dynamically based on the input
    fetch(url)
        .then(response => response.text())
        .then(data => {
            // Update the userResults container
            document.getElementById('adminResults').innerHTML = data;
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

    // Load data for all sections
    const url = ROOT + `/admin/searchUsers?`;
    loadData(url, 'userResults');

    const url2 = ROOT + `/admin/searchGyms?`;
    loadData(url2 , 'ownerResults');

    const url3 = ROOT + `/admin/searchInstructors?`;
    loadData(url3, 'instructorResults');

    const url4 = ROOT + `/admin/searchAdmins?`;
    loadData(url4 , 'adminResults');
});


function gymBan(username, email ,ban) {
  
    if (confirm('Are you sure you want to ban this user?')) {
      
        window.location.href = "./gym/ban.php?gym_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function gymUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this user?')) {
      
      
        window.location.href = "./gym/ban.php?gym_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

    }
}

function trainerBan(username, email ,ban) {
  
    if (confirm('Are you sure you want to ban this user?')) {
      
        window.location.href = "./instructors/ban.php?trainer_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function trainerUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this user?')) {
      
      
        window.location.href = "./instructors/ban.php?trainer_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

    }
}

function addUser() {

    document.getElementById('addUserFormModal').style.display = 'block';
}

function addOwner() {

    document.getElementById('addOwnerFormModal').style.display = 'block';
}

function ownerDelete(username, email,file) {
  
    if (confirm('Are you sure you want to delete this owner?')) {
      
        window.location.href = "./gym/delete.php?gym_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}

function addInstructor() {

    document.getElementById('addInstructorFormModal').style.display = 'block';
}

function instructorDelete(username, email,file) {
  
    if (confirm('Are you sure you want to delete the instructor?')) {
      
        window.location.href = "./instructors/delete.php?trainer_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}

function addAdmin() {

    document.getElementById('addAdminFormModal').style.display = 'block';
}

function adminDelete(username, email,file) {
  
    if (confirm('Are you sure you want to delete the instructor?')) {
      
        window.location.href = "./admins/delete.php?admin_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}


function adminBan(username, email ,ban) {
  
    if (confirm('Are you sure you want to ban this admin?')) {
      
        window.location.href = "./admins/ban.php?admin_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function adminUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this admin?')) {
      
      
        window.location.href = "./admins/ban.php?admin_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

    }
}

function instructorEdit(gym_username,trainer_username,trainer_name,email,age,gender,contact,experience,social,location,availiblity,qualify,special,file) {

    document.getElementById('Gym_Username').value = gym_username;
    document.getElementById('old_trainer_username').value = trainer_username;
    document.getElementById('old_Email').value = email;
    document.getElementById('old_File').value = file;
    
    document.getElementById('trainerUsername').value = trainer_username;
    document.getElementById('trainerName').value = trainer_name;
    document.getElementById('_email').value = email;
    document.getElementById('_age').value = age;
    document.getElementById('_gender').value = gender;
    document.getElementById('_contact').value = contact;
    document.getElementById('_experience').value = experience;
    document.getElementById('_social').value = social;
    document.getElementById('_location').value = location;
    document.getElementById('Availiblity').value = availiblity; 
    document.getElementById('Qualify').value = qualify;
    document.getElementById('Special').value = special;

    document.getElementById('editInstructorFormModal').style.display = 'block';
}

function editOwner(gymUsername, gymName, ownerName, email, age, gender, location, gymContact, ownerContact, startYear, experience, web, social, file) {
    // Display the modal
    document.getElementById('editOwnerFormModal').style.display = 'block';

    // Populate form fields with the provided data
    document.getElementById('gym_username').value = gymUsername;
    document.getElementById('gym_name').value = gymName;
    document.getElementById('owner_name').value = ownerName;
    document.getElementById('email').value = email;
    document.getElementById('age').value = age;
    document.getElementById('gender').value = gender;
    document.getElementById('location').value = location;
    document.getElementById('gym_contact').value = gymContact;
    document.getElementById('owner_contact').value = ownerContact;
    document.getElementById('start_year').value = startYear;
    document.getElementById('experience').value = experience;
    document.getElementById('web').value = web;
    document.getElementById('social').value = social;

    // For the hidden inputs
    document.getElementById('old_email').value = email;
    document.getElementById('old_username').value = gymUsername;


}

