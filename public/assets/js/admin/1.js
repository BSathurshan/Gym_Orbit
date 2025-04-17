const tabs = document.querySelectorAll('.tabs');

tabs.forEach(tab => {
    tab.addEventListener('click',() =>{
        for(tabi of tabs){
            tabi.classList.remove("activetab")
        }
        tab.classList.add('activetab');
        const value1=tab.getAttribute('value');
        const descriptors=document.querySelectorAll('.descriptor');
        for(descriptor of descriptors){
            descriptor.classList.remove("active")
        }
        descriptors.forEach(descriptor => {
            const value2=descriptor.getAttribute('value');
            if(value1 === value2){
            descriptor.classList.add('active');
        }
        });
    });
});


function editable() {
    const inputs = document.querySelectorAll(".input");
    inputs.forEach(function(input) {
        input.readOnly = false; 
        input.classList.add('activeinput');
    });

    const buttons1 = document.querySelectorAll(".edit");
    const buttons2 = document.querySelectorAll(".save");
    buttons1.forEach(function(button) {
        button.classList.remove("activebtn");
    });
    buttons2.forEach(function(button) {
        button.classList.add('activebtn');
    });
}


