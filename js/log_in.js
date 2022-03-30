const form = document.querySelector(".login form"),
contBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

var logid = document.getElementById("logid");
var logid_err = document.getElementById("logid-err");

var passwd = document.getElementById("passwd");
var passwd_err = document.getElementById("passwd-err");

form.onsubmit = (e)=>{
    e.preventDefault();
}

contBtn.onclick = ()=>{
        //lets start ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/login.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data =  xhr.response;
                    logid_err.innerHTML = "";
                    passwd_err.innerHTML = "";

                    if(logid.value == ""){
                        logid_err.innerHTML = "*Please enter your Email, Username or Phone Number";
                        logid.focus();
                        return false;
                    }
                    if(passwd.value == ""){
                        passwd_err.innerHTML = "*Please Enter your Password";
                        passwd.focus();
                        return false;
                    }

                    if (data == "Incorrect Em-us-pas"){
                        passwd_err.innerHTML = "*Incorect Username or Password";
                        logid.focus();
                        return false;
                    }

                    if(data == "success"){
                        location.href = "./home.php";
                    }
    
                    else{
                        errorText.style.display = "block"; 
                        errorText.textContent = data;
                        // passwd_err.innerHTML = "*Failed To connect to Database Try Again Later";
                        // return false;
                    }
                }
            }
        }
        // we have to send the form data
        let formData = new FormData(form);
        xhr.send(formData);
}
