const form = document.querySelector(".forgot form"),
contBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

var det = document.getElementById("det");
var det_err = document.getElementById("det-err");

var phone = document.getElementById("phone");
var qn1_err = document.getElementById("qn1-err");
var qn2_err = document.getElementById("qn2-err");

var passwd = document.getElementById("passwd");
var passwd_err = document.getElementById("passwd-err");

form.onsubmit = (e)=>{
    e.preventDefault();
}

contBtn.onclick = ()=>{
        //lets start ajax
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/forget.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data =  xhr.response;
                    det_err.innerHTML = "";

                    if (data == "Incorrect Em-us-pas"){
                        qn2_err.innerHTML = "*Incorect Username or Password";
                        det.focus();
                        return false;
                    }

                    if(data == "success"){
                        location.href = "./otp.php";
                    }
    
                    else{
                        errorText.style.display = "block"; 
                        errorText.textContent = data;
                    }
                }
            }
        }
        // we have to send the form data
        let formData = new FormData(form);
        xhr.send(formData);
}
