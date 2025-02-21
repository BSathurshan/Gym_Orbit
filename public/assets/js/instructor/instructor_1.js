
function closeEditModal() {
    document.getElementById('SupportFormModal').style.display = 'none';

}

function createTicket(trainer_username,email) {
  
    document.getElementById('USER_NAME').value = trainer_username; 
    document.getElementById('Email').value = email; 
 
    document.getElementById('SupportFormModal').style.display = 'block';
}