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

    document.getElementById('post_editNewTitle').value = title;
    document.getElementById('post_editNewDetails').value = details;
    document.getElementById('post_gymUsername').value = gymUsername; 
    document.getElementById('post_id').value = id; 
    document.getElementById('post_oldFilename').value = oldFilename; 
 
   

    // Show the modal
    document.getElementById('editPostFormModal').style.display = 'block';
}

function postDelete(id, gymUsername, file,access) {
  
    if (confirm('Are you sure you want to delete this post?')) {
      
         window.location.href =  ROOT + "/admin/deletePost?id=" + encodeURIComponent(id) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername)+ "&access=" + encodeURIComponent(access);
    }
}

function userDelete(username, email,file) {
  
    if (confirm('Are you sure you want to delete this user?')) {
      
        window.location.href =  ROOT + "/admin/deleteUser?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}

function userBan(username, email ,ban) {
  
    if (confirm('Are you sure you want to ban this user?')) {
      
        window.location.href =  ROOT + "/admin/banUser?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function userUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this user?')) {
      
      
        window.location.href = ROOT + "/admin/unbanUser?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

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
      
        window.location.href = ROOT + "/admin/banGym?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function gymUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this user?')) {
      
      
        window.location.href = ROOT + "/admin/unbanGym?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

    }
}

function trainerBan(username, email ,ban) {
  
    if (confirm('Are you sure you want to ban this user?')) {
      
        window.location.href = ROOT + "/admin/banInstructor?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function trainerUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this user?')) {
      
      
        window.location.href = ROOT + "/admin/unbanInstructor?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

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
      
        window.location.href =  ROOT + "/admin/deleteGym?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}

function addInstructor() {

    document.getElementById('addInstructorFormModal').style.display = 'block';
}

function instructorDelete(username, email,file,access) {
  
    if (confirm('Are you sure you want to delete the instructor?')) {
      
        window.location.href =  ROOT + "/admin/deleteInstructor?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file) + "&access=" + encodeURIComponent(access);

    }
}

function addAdmin() {

    document.getElementById('addAdminFormModal').style.display = 'block';
}

function adminDelete(username, email,file) {
  
    if (confirm('Are you sure you want to delete the admin?')) {
      
        window.location.href =  ROOT + "/admin/deleteAdmin?username="  + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file);

    }
}


function adminBan(username, email ,ban) {
  
    if (confirm('Are you sure you want to ban this admin?')) {
      
        window.location.href = ROOT + "/admin/banAdmin?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) +"&state=" + encodeURIComponent(ban);

    }
}

function adminUnBan(username, email, unBan) {
  
    if (confirm('Are you sure you want to unban this admin?')) {
      
      
        window.location.href = ROOT + "/admin/unbanAdmin?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&state=" + encodeURIComponent(unBan);

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
    document.getElementById('gym_email').value = email;
    document.getElementById('age').value = age;
    document.getElementById('owner_gender').value = gender;
    document.getElementById('gym_location').value = location;
    document.getElementById('gym_contact').value = gymContact;
    document.getElementById('owner_contact').value = ownerContact;
    document.getElementById('start_year').value = startYear;
    document.getElementById('experience').value = experience;
    document.getElementById('web').value = web;
    document.getElementById('social').value = social;

    // For the hidden inputs
    document.getElementById('old_gym_email').value = email;
    document.getElementById('old_gym_username').value = gymUsername;


}

function messageDelete(username, issue, message, time) {
    const url = `deleteMessage?username=${encodeURIComponent(username)}&issue=${encodeURIComponent(issue)}&message=${encodeURIComponent(message)}&time=${encodeURIComponent(time)}`;
    if (confirm("Are you sure you want to delete this message?")) {
        window.location.href = url;
    }
}


function replyMessage(username, issue, message, time, email = "") {
    document.getElementById('gymUsername').value = username;
    document.getElementById('editIssue').value = issue;
    document.getElementById('editMessage').value = "Re: " + message;
    document.getElementById('gymEmail').value = email;

    const modal = document.getElementById('replyMessageFormModal');
    modal.style.display = 'flex'; // Make sure this matches your modal CSS
}

function closeReplyMessageModal() {
    document.getElementById('replyMessageFormModal').style.display = 'none';
}


function renderGenderChart(genderData) {
    console.log(genderData);
    const ctx = document.getElementById('member-gender-chart').getContext('2d');
    const maleCount = Number(genderData[0]?.male_count) || 0;
    const femaleCount = Number(genderData[0]?.female_count) || 0;
    const total = maleCount + femaleCount;

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Gender Distribution',
                data: [maleCount, femaleCount],
                backgroundColor: [
                    'rgba(56, 189, 248, 0.7)',  // Blue
                    'rgba(219, 39, 119, 0.7)', // Pink
                ],
                borderColor: [
                    'rgba(56, 189, 248, 1)',
                    'rgba(219, 39, 119, 1)',
                ],
                borderWidth: 1,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 14,
                        },
                        generateLabels: function (chart) {
                            const data = chart.data;
                            if (data.labels.length && data.datasets.length) {
                                return data.labels.map((label, i) => {
                                    const count = data.datasets[0].data[i];
                                    let percentage;
                                    if(count == 0 && total == 0){
                                        percentage = 0;
                                    }else{
                                        percentage = ((count / total) * 100).toFixed(1);
                                    }
                                    return {
                                        text: `${label} - ${count} (${percentage}%)`,
                                        fillStyle: data.datasets[0].backgroundColor[i],
                                        strokeStyle: data.datasets[0].borderColor[i],
                                        lineWidth: 1,
                                        hidden: isNaN(data.datasets[0].data[i]),
                                        index: i
                                    };
                                });
                            }
                            return [];
                        }
                    }
                },
                datalabels: {
                    color: '#fff',
                    font: {
                        weight: 'bold',
                        size: 14,
                    },
                    formatter: (value, ctx) => {
                        return `${value}`;
                    }
                },
            },
        },
        plugins: [ChartDataLabels]
    });
}


function renderRevenueChart(revenueData) {
    const ctx = document.getElementById('revenue-chart').getContext('2d');
    const gymNames = revenueData.map(item => item.gym_username);
    const revenues = revenueData.map(item => Number(item.total_revenue) || 0);

    const backgroundColors = [
        'rgba(255, 99, 132, 0.7)',
        'rgba(54, 162, 235, 0.7)',
        'rgba(255, 206, 86, 0.7)',
        'rgba(75, 192, 192, 0.7)',
        'rgba(153, 102, 255, 0.7)',
        'rgba(255, 159, 64, 0.7)',
        'rgba(255, 0, 0, 0.7)',
        'rgba(0, 255, 0, 0.7)',
        'rgba(0, 0, 255, 0.7)',
        'rgba(128, 128, 0, 0.7)'
    ];
    const borderColors = backgroundColors.map(c => c.replace('0.7', '1'));

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: gymNames,
            datasets: [{
                label: 'Revenue by Gym',
                data: revenues,
                backgroundColor: backgroundColors.slice(0, gymNames.length),
                borderColor: borderColors.slice(0, gymNames.length),
                borderWidth: 1,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                datalabels: {
                    color: '#000',
                    formatter: (value) => `Rs:${value.toLocaleString()}`,
                    font: {
                        weight: 'bold',
                        size: 12
                    }
                }
            },
        },
        plugins: [ChartDataLabels],
    });
}


function renderIncomeChart(incomeData) {
    const ctx = document.getElementById('income-chart').getContext('2d');
    const months = incomeData.map(item => item.month);
    const incomeValues = incomeData.map(item => item.monthly_income);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Monthly Income',
                data: incomeValues,
                backgroundColor: 'rgba(52, 211, 153, 0.7)', // Teal
                borderColor: 'rgba(52, 211, 153, 1)',
                borderWidth: 1,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
            plugins: {
                legend: {
                    position: 'top',
                },
            },
        },
    });
}

window.addEventListener('DOMContentLoaded', function () {
    // Call the rendering functions
    renderGenderChart(reportData.activeMemberGenderCounts);
    renderRevenueChart(reportData.revenueByGym);
    renderIncomeChart(reportData.monthlyIncome);


    document.getElementById('download-report-pdf').addEventListener('click', () => {
        const original = document.getElementById('pdf-report-section');
        const clone = original.cloneNode(true);
        clone.style.margin = 'auto auto';
        clone.style.padding = '0px';

        // Remove the download button from the clone
        const downloadBtn = clone.querySelector('#download-report-pdf');
        if (downloadBtn) downloadBtn.remove();

        // Replace each canvas in the clone with an image
        const canvases = original.querySelectorAll('canvas');
        const clonedCanvases = clone.querySelectorAll('canvas');

        canvases.forEach((canvas, i) => {
            const img = new Image();
            img.src = canvas.toDataURL('image/png');
            img.style.width = canvas.style.width;
            img.style.height = canvas.style.height;
            clonedCanvases[i].replaceWith(img);
        });

        // Change heading colors to black inside the clone
        clone.querySelectorAll('h2, h3, h4').forEach(heading => {
            heading.style.color = 'black';
        });


        const container = document.createElement('div');
        container.appendChild(clone);
        document.body.appendChild(container);

        const opt = {
            margin: 0.5,
            filename: 'Gym_Report.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a3', orientation: 'landscape' }
        };

        html2pdf().set(opt).from(clone).save().then(() => {
            document.body.removeChild(container); // Clean up after download
        });
    });

});
