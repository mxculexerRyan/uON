<div class="mb-auto" id="msg-header">
    <h4 class="float-left text-info">Messages</h4>
    <nav class="nav justify-content-center float-right">
        <a class="nav-link active" href="./home.php">Edit</a>
        <a href="#" class="nav-link"><i id="write" class="fas fa-edit"></i></a>
    </nav>
</div>

<div>
    <section class="form search">
        <form role="form">
            <div class="form-step form-step-active">
                <div class="form-group">
                    <input class="form-control mr2" type="search" placeholder="Search.....">
                    <i id="search" class="fas fa-search"></i>
                </div>
            </div>
        </form>
    </section>
</div>

<div>
    <div class="nav justify-content-between">
        <input type="button" value="Chats" class="btn btn-outline-info px-5 mb-2" onclick="loadchat()">
        <input type="button" value="groups" class="btn btn-outline-info px-5 mb-2" onclick="loadgrup()">
    </div>
    <div class="chat-list" id="chat"></div>
    <div class="group-list" id="group-chat"></div>
</div>
<script> 
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
                        if(!user_list.classList.contains("active")){
                            user_list.innerHTML = data; 
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
    }

    function stopld(){
        user_list.classList.remove("active");
        group_list.classList.add("active");
    }

    function grp_back(){
        user_list.classList.add("active");
        group_list.classList.remove("active");
    }
</script>
<script src="./js/users/users_list.js"></script>