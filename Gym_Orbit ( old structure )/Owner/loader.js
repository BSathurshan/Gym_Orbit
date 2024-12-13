// JavaScript for handling Delete
function machineDelete(name, file, gymUsername) {
  
    if (confirm('Are you sure you want to delete this machine?')) {
      
        window.location.href = "./machines/delete.php?name=" + encodeURIComponent(name) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername);
    }
}

function machineEdit(name, file, gymUsername) {

    document.getElementById('editName').value = name; // show exist name 
    document.getElementById('editOldName').value = name; // Store the old name for database update
    document.getElementById('editGymUsername').value = gymUsername; // Populate the gym username (hidden field)
    document.getElementById('editOldfile').value = file;
   

    // Show the modal
    document.getElementById('editFormModal').style.display = 'block';
}

function machineAdd() {
    // Show the modal
    document.getElementById('addFormModal').style.display = 'block';
}
function closeEditModal() {
    document.getElementById('editFormModal').style.display = 'none';
    document.getElementById('addFormModal').style.display = 'none';
    document.getElementById('editPostFormModal').style.display = 'none';
    document.getElementById('addPostFormModal').style.display = 'none';
    document.getElementById('editMaterialFormModal').style.display = 'none';
    document.getElementById('addMaterialFormModal').style.display = 'none';
    document.getElementById('addInstructorFormModal').style.display = 'none';
    document.getElementById('editInstructorFormModal').style.display = 'none';
}

//function postEdit(name, file, gymUsername)
function postEdit(title,oldFilename,details,gymUsername,id) {

    document.getElementById('editNewTitle').value = title;
    document.getElementById('editNewDetails').value = details; // Store the old name for database update
    document.getElementById('gymUsername').value = gymUsername; // Populate the gym username (hidden field)
    document.getElementById('id').value = id; 
    document.getElementById('oldFilename').value = oldFilename; 
 
   

    // Show the modal
    document.getElementById('editPostFormModal').style.display = 'block';
}

function postAdd() {
    // Show the modal
    document.getElementById('addPostFormModal').style.display = 'block';
}

// JavaScript for handling Delete
function postDelete(id, gymUsername, file) {
  
    if (confirm('Are you sure you want to delete this machine?')) {
      
        window.location.href = "./posts/delete.php?id=" + encodeURIComponent(id) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername);
    }
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

function materialAdd() {
    document.getElementById('addMaterialFormModal').style.display = 'block';
}
function materialDelete(id, gymUsername, file) {
  
    if (confirm('Are you sure you want to delete this machine?')) {
      
        window.location.href = "./materials/delete.php?id=" + encodeURIComponent(id) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername);
    }
}

function addInstructor() {

    document.getElementById('addInstructorFormModal').style.display = 'block';
}

function instructorDelete(username, email,file) {
  
    if (confirm('Are you sure you want to delete the instructor?')) {
      
        window.location.href = "./instructor/delete.php?trainer_username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}

function accept(gym_username,name,username, trainer_name,trainer_username,state) {
  
    if (confirm('Are you sure you want to accept the request?')) {
      
        window.location.href = "./instructor/accept_reject.php?trainer_username=" + encodeURIComponent(trainer_username) + "&trainer_name=" + encodeURIComponent(trainer_name)  + "&name=" + encodeURIComponent(name)  + "&username=" + encodeURIComponent(username)
        + "&state=" + encodeURIComponent(state) + "&gym_username=" + encodeURIComponent(gym_username);

    }
}

function reject(gym_username,name,username, trainer_name,trainer_username,state) {
  
    if (confirm('Are you sure you want to reject the request?')) {
      
        window.location.href = "./instructor/accept_reject.php?trainer_username=" + encodeURIComponent(trainer_username) + "&trainer_name=" + encodeURIComponent(trainer_name)  + "&name=" + encodeURIComponent(name)  + "&username=" + encodeURIComponent(username)
        + "&state=" + encodeURIComponent(state) + "&gym_username=" + encodeURIComponent(gym_username);

    }
}


function instructorEdit(trainer_username,trainer_name,email,age,gender,contact,experience,social,location,availiblity,qualify,special,file) {

        document.getElementById('old_trainer_username').value = trainer_username;
        document.getElementById('old_email').value = email;
        document.getElementById('old_file').value = file;
        
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