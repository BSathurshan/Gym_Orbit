document.addEventListener("DOMContentLoaded", function () {
    const pin = document.getElementById("name-edit-pin");
    const modal = document.getElementById("Change-Name");

    pin.addEventListener("click", function () {
        modal.style.display = "block";
    });
});

function cancelNameEdit() {
    document.getElementById("Change-Name").style.display = "none";
}
////////////////////////////////name////////////////////////
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("new-name-input");
    const saveBtn = document.getElementById("save-name");

    // Get the existing name from input's default value
    const existingName = input.value.trim();

    saveBtn.addEventListener("click", function () {
        const newName = input.value.trim();
        const nameRegex = /^[A-Za-z\s]{3,}$/;

        saveBtn.style.backgroundColor = '';
        saveBtn.style.color = '';

        if (newName === "") {
            alert("Name cannot be empty.");
        } else if (newName === existingName) {
            alert("New name must be different from your existing name.");
        } else if (!nameRegex.test(newName)) {
            alert("Name must be at least 3 letters long and contain only letters and spaces.");
        } else {
            saveBtn.style.backgroundColor = "green";
            saveBtn.style.color = "white";
            
            const redirectURL = ROOT + "/user/changeName?newName=" + newName ;
            window.location.href = redirectURL;      
          }
    });
});


////////////////////////////////age////////////////////////

document.addEventListener("DOMContentLoaded", function () {
    const pin = document.getElementById("age-edit-pin");
    const modal = document.getElementById("Change-age");

    pin.addEventListener("click", function () {
        modal.style.display = "block";
    });
});

function cancelAgeEdit() {
    document.getElementById("Change-age").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    const ageInput = document.getElementById("new-age-input");
    const saveBtn = document.getElementById("save-age");

    saveBtn.addEventListener("click", function () {
        const newAge = parseInt(ageInput.value.trim(), 10);

        // Reset button style
        saveBtn.style.backgroundColor = '';
        saveBtn.style.color = '';

        if (isNaN(newAge)) {
            alert("Age must be a number.");
        } else if (newAge < 12 || newAge > 60) {
            alert("Age must be between 12 and 60.");
        } else {
            saveBtn.style.backgroundColor = "green";
            saveBtn.style.color = "white";
           
            const redirectURL = ROOT + "/user/changeAge?newAge=" + newAge ;
            window.location.href = redirectURL; 
        }
    });
});




