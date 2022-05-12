<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }
    include_once("./php/config/config.php");
    include_once("./includes/header.php");
?>
<body>
    <div class="fluid-container d-flex p-3 mx-auto flex-column">
        <header class="mb-auto">
            <h3 class="float-left">uON | <span class="text-info">Home</span></h3>
            <nav class="nav justify-content-center float-right">
                <a class="nav-link active" href="./home.php">Home</a>
                <a class="nav-link" href="https://github.com/coliff/dark-mode-switch" target="_blank">GitHub</a>
                <div class="nav-link">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="darkSwitch">
                        <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
                    </div>
                </div>
            </nav>
        </header>

        <div class="row">
            <div class="col">
                <h4 class="float-left text-info">My Profile</h4><br><br>
                <div class="row float-left m-2">
                    <div class="col-12">
                        <img class="my-image img-thumbnail" src="./images/ayo.jpg" alt="">
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="row">
                    <div class="status mx-2 overfow-scroll" id="row">
                        <img src="kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                    </div>
                </div>
                <div class="row post_section">
                    <div class="post_cont mx-2 mt-2 row" id="post_cont">
                        <div class="post_img col-4" id="post_img">
                           <img src="kyle.jpg" alt="" class="m-2 img-thumbnail">
                        </div>
                        <div class="desc_com col-8">
                            <div class="post_desc mt-2" id="post_desc">
                                <p>Hello my name is Georgina Saantos i am a therapist</p>
                            </div>
                            <div class="comments p-0 my-1">
                                <h5 class="m-0 p-0">Comments:</h5>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/kyle.jpg" alt="" class="img-thumbnail">
                                        <div>
                                            <p class="p-0 m-0"> <b>Kyle Reeves</b></p>
                                            <p  class="p-0 m-0" >Helo</p>
                                        </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                            </div>
                            <div class="comment_form ">
                                <form action="#">
                                    <div class="form-group">
                                        <input class="form-control mr2" type="text" placeholder="Comment Publiclly Here...">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="post_cont mx-2 mt-2 row" id="post_cont">
                        <div class="post_img col-6" id="post_img">
                           <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        </div>
                        
                        <div class="desc_com col-6">
                            <div class="post_desc mt-2" id="post_desc">
                                <p>Hello my name is Georgina Saantos i am a therapist</p>
                            </div>
                            <div class="comments p-0 my-1">
                                <h5 class="m-0 p-0">Comments:</h5>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/kyle.jpg" alt="" class="img-thumbnail">
                                        <div>
                                            <p class="p-0 m-0"> <b>Kyle Reeves</b></p>
                                            <p  class="p-0 m-0" >Helo</p>
                                        </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                            </div>
                            <div class="comment_form ">
                                <form action="#">
                                    <div class="form-group">
                                        <input class="form-control mr2" type="text" placeholder="Comment Publiclly Here...">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="post_cont mx-2 mt-2 row" id="post_cont">
                        <div class="post_img col-6" id="post_img">
                           <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        </div>
                        
                        <div class="desc_com col-6">
                            <div class="post_desc mt-2" id="post_desc">
                                <p>Hello my name is Georgina Saantos i am a therapist</p>
                            </div>
                            <div class="comments p-0 my-1">
                                <h5 class="m-0 p-0">Comments:</h5>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/kyle.jpg" alt="" class="img-thumbnail">
                                        <div>
                                            <p class="p-0 m-0"> <b>Kyle Reeves</b></p>
                                            <p  class="p-0 m-0" >Helo</p>
                                        </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                            </div>
                            <div class="comment_form ">
                                <form action="#">
                                    <div class="form-group">
                                        <input class="form-control mr2" type="text" placeholder="Comment Publiclly Here...">
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="post_cont mx-2 mt-2 row" id="post_cont">
                        <div class="post_img col-6" id="post_img">
                           <img src="kyle.jpg" alt="" class="m-2 img-thumbnail">
                        </div>
                        <div class="desc_com col-6">
                            <div class="post_desc mt-2" id="post_desc">
                                <p>Hello my name is Georgina Saantos i am a therapist</p>
                            </div>
                            <div class="comments p-0 my-1">
                                <h5 class="m-0 p-0">Comments:</h5>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/kyle.jpg" alt="" class="img-thumbnail">
                                        <div>
                                            <p class="p-0 m-0"> <b>Kyle Reeves</b></p>
                                            <p  class="p-0 m-0" >Helo</p>
                                        </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                                    <div class="user_comment p-0 mx-2">
                                        <img src="./images/oga.jpg" alt="" class="img-thumbnail">
                                            <div>
                                                <p class="p-0 m-0"> <b> Oga Servelt</b></p>
                                                <p class="p-0 m-0">okay give out your contact</p>
                                            </div>
                                    </div>
                            </div>
                            <div class="comment_form ">
                                <form action="#">
                                    <div class="form-group">
                                        <input class="form-control mr2" type="text" placeholder="Comment Publiclly Here...">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
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
            </div>
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
        <script src=".js/chat.js"></script>
        <script src="./js/users/users_list.js"></script>
        <script src="./js/home.js"></script>
        <?php include_once("./includes/footer.php")?>