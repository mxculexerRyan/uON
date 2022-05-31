const write = document.getElementById("write");
write.onclick = ()=>{
    
}

function sendMsg(){
    setTimeout(() => {
        const forms = document.getElementById("typing-area"),
        chatView = document.getElementById("chat-view");
        let inputField = document.getElementById("input-field"),
        sendBtn = document.getElementById("sendBtn");
    
        forms.onsubmit = (e)=>{
            e.preventDefault();
        }
    
        sendBtn.onclick = ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../uON/php/users/insert_chat.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        inputField.value = "";
                    }
                }
            }
            // we have to send the form data
            let formData = new FormData(forms);
            xhr.send(formData);
        }
    
        setInterval(() => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../uON/php/users/get_chat.php", true);
            xhr.onload = ()=> {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        chatView.innerHTML = data;
                    }
                }
            }
            let formData = new FormData(forms);
            xhr.send(formData);
        }, 500);
    
    }, 500);
}

function sendGrpMsg(){
    setTimeout(() => {
        const forms = document.getElementById("typing-area"),
        chatView = document.getElementById("chat-view");
        let inputField = document.getElementById("input-field"),
        sendBtn = document.getElementById("sendBtn");
    
        forms.onsubmit = (e)=>{
            e.preventDefault();
        }
    
        sendBtn.onclick = ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../uON/php/groups/insert_chat.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        inputField.value = "";
                    }
                }
            }
            // we have to send the form data
            let formData = new FormData(forms);
            xhr.send(formData);
        }
    
        setInterval(() => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../../uON/php/groups/get_chat.php", true);
            xhr.onload = ()=> {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        chatView.innerHTML = data;
                    }
                }
            }
            let formData = new FormData(forms);
            xhr.send(formData);
        }, 500);
    }, 500);
}