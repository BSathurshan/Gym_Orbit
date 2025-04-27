function showAlert(message, status) {
    var alertBox = document.getElementById('customAlert');
    var messageSpan = document.getElementById('customAlertMessage');
    messageSpan.innerText = message;

    // Set background color based on status
    if (status === 'success') {
        alertBox.style.backgroundColor = '#4caf50'; // Green
    } else if (status === 'error') {
        alertBox.style.backgroundColor = '#f44336'; // Red
    } else {
        alertBox.style.backgroundColor = '#333'; // Default gray
    }

    alertBox.style.display = 'block';
    setTimeout(function() {
        alertBox.style.top = '20px';
        alertBox.style.opacity = 1;
    }, 10);

    setTimeout(function() {
        alertBox.style.top = '-100px';
        alertBox.style.opacity = 0;
        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 500);
    }, 2500);
}