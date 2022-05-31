    var search_form = document.getElementById("msg-header");
    const user_list = document.querySelector(".chat-list");
    var group_list = document.querySelector(".group-list");
    var back = document.getElementById("back");
    setInterval(() => {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "./php/users/user_list.php", true);
            xhr.onload = ()=> {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        if(!searchbar.classList.contains("active")){
                            if(!user_list.classList.contains("active")){
                                user_list.innerHTML = data;
                                search_list.style.display="none";
                            }
                        }
                    }
                }
            }
            xhr.send();
    }, 500);

    function loadgrup() {
        user_list.classList.add("active");
        group_list.classList.remove("active");
        setInterval(() => {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "./php/groups/group_list.php", true);
            xhr.onload = ()=> {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        if(!group_list.classList.contains("active")){
                            group_list.innerHTML = data; 
                            group_list.style.display="block"; 
                            user_list.style.display="none";
                            search_list.style.display="none";
                        }
                    }
                }
            }
            xhr.send();
        }, 500);
    }

    function loadchat(){
        group_list.classList.add("active");
        user_list.classList.remove("active");
        setInterval(() => {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "./php/users/user_list.php", true);
            xhr.onload = ()=> {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                            if(!user_list.classList.contains("active")){
                                user_list.innerHTML = data;
                                user_list.style.display="block"; 
                                group_list.style.display="none";
                                search_list.style.display="none";
                            }
                    }
                }
            }
            xhr.send();
        }, 500);
    }

    function loadDoc(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){  
                user_list.classList.add("active");
                group_list.classList.add("active");
                document.getElementById("chat").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "./chat/chat.php?q=" + id, true);
        xhttp.send();
        sendMsg();
    }

    function showgrp(gid) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){  
                user_list.classList.add("active");
                group_list.classList.add("active");
                document.getElementById("group-chat").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", "./chat/group_chat.php?q=" + gid, true);
        xhttp.send();
        sendGrpMsg();
    }

    function stopld(){
        console.log(user_list.classList);
        if(user_list.classList.contains("active")){
            user_list.classList.remove("active");
            group_list.classList.add("active");
        }else{
            user_list.style.display = "block";
            search_list.style.display = "none";
            group_list.style.display = "none";
        }
    }
    
    

    function grp_back(){
        user_list.classList.add("active");
        group_list.classList.remove("active");
    }