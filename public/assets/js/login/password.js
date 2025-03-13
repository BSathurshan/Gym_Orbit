let password_field=document.getElementById('password');
let eye_icon=document.getElementById('eyeIcon');

eye_icon.onclick =function(){

    if(password_field.type=="password"){
        password_field.type="text";
        eye_icon.src=ROOT + '/assets/images/login/hide.png';
    }else{
        password_field.type="password";
       eye_icon.src=ROOT + '/assets/images/login/eye.png';
    }

}
