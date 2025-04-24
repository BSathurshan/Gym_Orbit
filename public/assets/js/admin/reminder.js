document.addEventListener("DOMContentLoaded", function () {
    const reminderCard = document.getElementById("system-maintenence");
    const modal = document.getElementById("system-maintenence-form");

    reminderCard.addEventListener("click", function () {
        modal.style.display = "block";
    });
});

function closeRemiderModal() {
    document.getElementById("system-maintenence-form").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    const reminderCard = document.getElementById("database-backup");
    const modal = document.getElementById("dbBackup-form");

    reminderCard.addEventListener("click", function () {
        modal.style.display = "block";
    });
});

function closeDbBackup() {
    document.getElementById("dbBackup-form").style.display = "none";
}