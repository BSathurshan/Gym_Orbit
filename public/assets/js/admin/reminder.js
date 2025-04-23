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