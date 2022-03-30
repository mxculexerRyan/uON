const form = document.querySelector(".signup form"),
cd_view = form.querySelector(".cd_view input"),
user_rview= form.querySelector(".user_rview input"),
auth_view = form.querySelector(".auth_view input"),
contact_rview = form.querySelector(".contact_rview input"),
contBtn = form.querySelector(".button input");

const prevBtns = document.querySelectorAll(".btn-prev");
const NextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll('.progress-step');
let formStepsNum = 0;

var fname_err = document.getElementById("fname-err");
var int_err = document.getElementById("int_err");
var fname = document.getElementById("fname");
var lname = document.getElementById("lname");
var lname_err = document.getElementById("lname-err");
var uname = document.getElementById("uname");
var uname_err = document.getElementById("uname-err");
var dob = document.getElementById("dob");
var dob_err = document.getElementById("dob-err");
var genderm = document.getElementById("gender_male");
var genderf = document.getElementById("gender_female");
var gender_err = document.getElementById("gender-err");

var email = document.getElementById("email");
var email_err = document.getElementById("email-err");
var phone = document.getElementById("phone");
var phone_err = document.getElementById("phone-err");
var uni = document.getElementById("uni");
var uni_err = document.getElementById("uni-err");
var col = document.getElementById("col");
var col_err = document.getElementById("col-err");

var passwd = document.getElementById("passwd");
var passwd_err = document.getElementById("passwd-err");
var cpasswd = document.getElementById("cpasswd");
var cpasswd_err = document.getElementById("cpasswd-err");
var agree = document.getElementById("agree");
var agree_err = document.getElementById("agree-err");

var chuo = document.getElementById("chuo");



function updateFormSteps() {
    formSteps.forEach((formstep) =>{
        formstep.classList.contains("form-step-active") &&
        formstep.classList.remove("form-step-active");
    });
    // formSteps[formStepsNum-1].classList.remove("form-step-active");
    formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar(){
    progressSteps.forEach((progressStep, idx) =>{
        if(idx < formStepsNum + 1){
            progressStep.classList.add("progress-step-active");
        }else{
            progressStep.classList.remove("progress-step-active");
        }
    });

    const progressActive = document.querySelectorAll(".progress-step-active");
    progress.style.width = 
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}

form.onsubmit = (e)=>{
    e.preventDefault();
}

cd_view.onclick = ()=>{
    //lets start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/sign_up.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data =  xhr.response;
                fname_err.innerHTML = "";
                lname_err.innerHTML ="";
                uname_err.innerHTML ="";
                dob_err.innerHTML = "";
                gender_err.innerHTML = "";
                email_err.innerHTML = "";

                let flength = fname.value.length;
                let llength = lname.value.length;
                let ulength = uname.value.length;
                let dobs = dob.value;
                var today = new Date();
                var bday = new Date(dobs);
                var this_year = today.getFullYear();
                var bday_year = bday.getFullYear();
                var age = this_year-bday_year;

                if(fname.value == ""){
                    fname_err.innerHTML = "*Please enter your first name";
                    fname.focus();
                    return false;
                }else if(fname.value.match(/[0-9*]/)){
                    fname_err.innerHTML = "*Numbers are not accepted in first name";
                    fname.focus();
                    return false;
                }else if(fname.value.match(/\s/)){
                    fname_err.innerHTML = "*Spaces are not accepted in first name";
                    fname.focus();
                    return false;
                }else if(flength < 3){
                    fname_err.innerHTML = "*First name too short'";
                    fname.focus();
                    return false;
                }

                if(lname.value == ""){
                    lname_err.innerHTML = "*Please enter your last name";
                    lname.focus();
                    return false;
                }else if(lname.value.match(/[0-9*]/)){
                    lname_err.innerHTML = "*Numbers are not accepted in last name";
                    lname.focus();
                    return false;
                }else if(lname.value.match(/\s/)){
                    lname_err.innerHTML = "*Spaces are not accepted in last name";
                    lname.focus();
                    return false;
                }else if(llength < 3){
                    lname_err.innerHTML = "*Last name too short'";
                    lname.focus();
                    return false;
                }

                if(uname.value == ""){
                    uname_err.innerHTML = "*Please enter your user name";
                    uname.focus();
                    return false;
                }else if(uname.value.match(/\s/)){
                    uname_err.innerHTML = "*Spaces are not accepted in user name";
                    uname.focus();
                    return false;
                }else if(ulength < 3){
                    uname_err.innerHTML = "*Username too short'";
                    uname.focus();
                    return false;
                }else if(data == "Uexist"){
                    uname_err.innerHTML = "*Username Exists";
                    uname.focus();
                    return false;
                }
                
                if(!dobs){
                    dob_err.innerHTML = "*Please provide date of birth";
                    return false;
        
                }else if(age < 0){
                    dob_err.innerHTML = "Sorry people from the future are not accepted";
                    return false;
                }else if(age < 16){
                    dob_err.innerHTML = "Sorry you should be over 16 years to continue";
                    return false;
                }else if(age > 100){
                    dob_err.innerHTML = "Sorry you should be below 100 years to continue";
                    return false;

                }else if(genderm.checked == false && genderf.checked == false){
                    gender_err.innerHTML = "*Please choose a gender";
                    return false;
                }

                if(data == "success" || data == "Eexist" || data == "Pexist" || data == "Penter"){
                    formStepsNum = formStepsNum +1;
                    updateFormSteps();
                    updateProgressbar();
                }
                else{
                    errorText.style.display = "block"; 
                    errorText.textContent = data;
                    // fname_err.innerHTML = "*Failed To connect to Database Try Again Later";
                    return false;
                }
            }
        }
    }
    // we have to send the form data
    let formData = new FormData(form);
    xhr.send(formData);
}

user_rview.onclick = ()=>{
    formStepsNum = formStepsNum -1;
    updateFormSteps();
    updateProgressbar();
}

auth_view.onclick = ()=>{
    //lets start ajax
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/sign_up.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data =  xhr.response;
                email_err.innerHTML ="";
                phone_err.innerHTML ="";
                col_err.innerHTML ="";
                uni_err.innerHTML ="";

                if(email.value== ""){
                    email_err.innerHTML = "*Please enter your Email";
                    email.focus();
                    return false;
                }else if(!email.value.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
                    email_err.innerHTML = "*please enter a valid Email adress";
                    email.focus();
                    return false;
                }else if(data == "Eexist"){
                    email_err.innerHTML = "*Email Exists";
                    email.focus();
                    return false;
                }
        
                if(phone.value == ""){
                    phone_err.innerHTML = "*Please enter your Phone";
                    phone.focus();
                    return false;
                }else if(phone.value.match(/^[0]{1}[6-7]{1}[1-9]{8}$/)){
                    phone_err.innerHTML = "*Please start with country code eg 255..";
                    phone.focus();
                    return false;
                }else if(!phone.value.match(/^[2]{1}[5]{2}[6-7]{1}[0-9]{8}$/)){
                    phone_err.innerHTML = "*Please enter a valid Phone";
                    phone.focus();
                    return false;
                }else if(data == "Pexist"){
                    phone_err.innerHTML = "*Phone Number Exists";
                    phone.focus();
                    return false;
                }

                if(uni.value == ""){
                    uni_err.innerHTML = "*Please Select your University";
                    return false;
                }
                
                if(col.value == ""){
                    col_err.innerHTML = "*Please Select your College";
                    return false;
                }

                if(data == "Uexist" || data == "success" || data == "Penter"){
                    formStepsNum = formStepsNum +1;
                    updateFormSteps();
                    updateProgressbar();
                }

                else{
                    email_err.style.display = "block"; 
                    email_err.textContent = data;
                    // email_err.innerHTML = "*Failed To connect to Database Try Again Later";
                    return false;
                }
            }
        }
    }
    // we have to send the form data
    let formData = new FormData(form);
    xhr.send(formData);
}

contact_rview.onclick = ()=>{
    formStepsNum = formStepsNum -1;
    updateFormSteps();
    updateProgressbar();
}

contBtn.onclick = ()=>{
        //lets start ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/sign_up.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data =  xhr.response;
                    passwd_err.innerHTML = "";
                    cpasswd_err.innerHTML = "";
                    agree_err.innerHTML = "";

                    if(passwd.value == ""){
                        passwd_err.innerHTML = "*Please enter your Password";
                        passwd.focus();
                        return false;
                    }else if(passwd.value.length < 6){
                        passwd_err.innerHTML = "*Password too short";
                        passwd.focus();
                        return false;
                    }
                    if(cpasswd.value == ""){
                        cpasswd_err.innerHTML = "*Please confirm your Password";
                        cpasswd.focus();
                        return false;
                    }else if(passwd.value != cpasswd.value){
                        cpasswd_err.innerHTML = "*Passwords Dont Match";
                        cpasswd.focus();
                        return false;
                    }else if(data == "succes_"){
                        passwd_err.innerHTML = "*Password too short";
                        passwd.focus();
                        return false;
                    }

                    if(!agree.checked){
                        agree_err.innerHTML = "*Please Accept our Terms and conditions to continue";
                        return false;
                    }

                    if(data == "success" || data == "Uexist"){
                        location.href = "./otp.php"
                    }
    
                    else{
                        // passwd_err.innerHTML = "*Failed To connect to Database Try Again Later";
                        passwd_err.style.display = "block"; 
                        passwd_err.textContent = data;
                        return false;
                    }
                }
            }
        }
        // we have to send the form data
        let formData = new FormData(form);
        xhr.send(formData);
}
