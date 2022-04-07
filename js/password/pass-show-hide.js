const passwordField = document.getElementById("passwd");
var toggleBtn = document.querySelector(".form .form-step .form-group i");
var toggleBtn2 = document.getElementById("c-eye");
const cpasswordField = document.getElementById("cpasswd");

toggleBtn.onclick = ()=>{
    if(passwordField.type == "password"){
        passwordField.type = "text";
    }else if(passwordField.type == "text"){
        passwordField.type = "password";
    }
}

toggleBtn2.onclick = ()=>{
    if(cpasswordField.type == "password"){
        cpasswordField.type = "text";
    }else if(cpasswordField.type == "text"){
        cpasswordField.type = "password";
    }
}