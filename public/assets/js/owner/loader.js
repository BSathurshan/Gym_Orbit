const ROOT = "http://localhost:8080/mvc/public"; 

function machineDelete(name, file, gymUsername) {
  
    if (confirm('Are you sure you want to delete this machines?')) {
      
       window.location.href = ROOT + "/owner/deleteMachine?name=" + encodeURIComponent(name) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername);
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

function postEditing( oldFilename, gymUsername, id) {
    document.getElementById('post-edit-gym-username').value = gymUsername;
    document.getElementById('post-edit-id').value = id;
    document.getElementById('post-edit-old-filename').value = oldFilename;
    document.getElementById('post-edit-modal').style.display = 'block';
}

function postAdd() {
    // Show the modal
    document.getElementById('addPostFormModal').style.display = 'block';
}

// JavaScript for handling Delete
function postDelete(id, gymUsername, file, access) {
  
    if (confirm('Are you sure you want to delete this post?')) {
      
        window.location.href = ROOT + "/owner/deletePost?id=" + encodeURIComponent(id) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername)+"&access=" + encodeURIComponent(access);
    }
}

function materialEdit(type,title,oldFilename,details,gymUsername,id) {

    document.getElementById('editType').value = type;
    document.getElementById('editTitle').value = title;
    document.getElementById('editDetails').value = details; 
    document.getElementById('gym_Username').value = gymUsername;
    document.getElementById('_id').value = id; 
    document.getElementById('old_FileName').value = oldFilename; 

    document.getElementById('editMaterialFormModal').style.display = 'block';
}

function materialAdd() {
    document.getElementById('addMaterialFormModal').style.display = 'block';
}
function materialDelete(id, gymUsername, file,access) {
  
    if (confirm('Are you sure you want to delete this material?')) {
      
        window.location.href = ROOT +"/owner/deleteMaterial?id=" + encodeURIComponent(id) + "&file=" + encodeURIComponent(file) + "&gym_username=" + encodeURIComponent(gymUsername)  + "&access=" + encodeURIComponent(access);
    }
}

function addInstructor() {

    document.getElementById('addInstructorFormModal').style.display = 'block';
}

function instructorDelete(username, email,file,access) {
  
    if (confirm('Are you sure you want to delete the instructor?')) {
      
        window.location.href =ROOT +"/owner/deleteInstructor?username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email)  + "&file=" + encodeURIComponent(file)+ "&access=" + encodeURIComponent(access);

    }
}

function accept(gym_username,name,username, trainer_name,trainer_username,state) {
  
    if (confirm('Are you sure you want to accept the request?')) {
      
        window.location.href = ROOT +"/owner/processRequest?trainer_username=" + encodeURIComponent(trainer_username) + "&trainer_name=" + encodeURIComponent(trainer_name)  + "&name=" + encodeURIComponent(name)  + "&username=" + encodeURIComponent(username)
        + "&state=" + encodeURIComponent(state) + "&gym_username=" + encodeURIComponent(gym_username);

    }
}

function reject(gym_username,name,username, trainer_name,trainer_username,state) {
  
    if (confirm('Are you sure you want to reject the request?')) {
      
        window.location.href = ROOT +"/owner/processRequest?trainer_username=" + encodeURIComponent(trainer_username) + "&trainer_name=" + encodeURIComponent(trainer_name)  + "&name=" + encodeURIComponent(name)  + "&username=" + encodeURIComponent(username)
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

    function removeMember(gym_username,username) {
  
        if (confirm('Are you sure you want to remove this user?')) {
          
            window.location.href = ROOT + "/owner/removeMember?username=" + encodeURIComponent(username) + "&gym_username=" + encodeURIComponent(gym_username);
    
        }
    }

    function createTicket(username) {
  
        document.getElementById('USER_NAME').value = username; 
     
        document.getElementById('SupportFormModal').style.display = 'block';
    }

    function closeEditModal() {
        document.getElementById('editFormModal').style.display = 'none';
        document.getElementById('addFormModal').style.display = 'none';
        document.getElementById('post-edit-modal').style.display = 'none';
        document.getElementById('addPostFormModal').style.display = 'none';
        document.getElementById('editMaterialFormModal').style.display = 'none';
        document.getElementById('addMaterialFormModal').style.display = 'none';
        document.getElementById('addInstructorFormModal').style.display = 'none';
        document.getElementById('editInstructorFormModal').style.display = 'none';
        document.getElementById('SupportFormModal').style.display = 'none';
    
        document.getElementById('instructorScheduleFormModal').style.display = 'none';
        document.getElementById('gymScheduleFormModal').style.display = 'none';
    }

    function editInstructorSchedule(trainer_username, trainer_name, email, username) {
        // Set hidden inputs
        document.getElementById('TRAINER_username').value = trainer_username;
        document.getElementById('GYM_username').value = username;
        document.getElementById('Email').value = trainer_name;
        document.getElementById('TRAINER_name').value = email;
    
        // Dynamically set the container and show the modal
        //setupScheduleContainer("daysContainer2");  // Pass the container ID dynamically
        document.getElementById('instructorScheduleFormModal').style.display = 'block';
    }
    
    function editGymSchedule(username) {
        // Set hidden inputs
        document.getElementById('GYM_username').value = username;
    
        // Dynamically set the container and show the modal
      //  setupScheduleContainer("daysContainer1");  // Pass the container ID dynamically
        document.getElementById('gymScheduleFormModal').style.display = 'block';
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