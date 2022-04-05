const user_list = document.querySelector(".chat-list");
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./php/users/user_list.php", true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                user_list.innerHTML = data; 
            }
        }
    }
    xhr.send();
}, 500);