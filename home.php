<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }
    include_once("./php/config.php");
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
                        <img class="my-image img-thumbnail" src="./images/zai.jpg" alt="">
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <h5 class="text-black text-center">@joan_doe</h5>
                    </div>
                </div> -->
                <!-- <div class="row">
                </div>
                <div>
                <p class="text-center"> <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>Udom-Cive</p>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col align-content-between">
                    <p>50</p>
                    <P>Following</P>
                    </div>
                    <div class="col">
                        <p>26.7k</p>
                        <p>Followers</p>
                    </div>
                    <div class="col">
                        <p>2.1M</p>
                        <P>Likes</P>
                    </div>
                </div> -->

            </div>
            <div class="col-6">2 of 3</div>
            <div class="col">
                <div class="mb-auto">
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

                    <div class="nav justify-content-between">
                        <input type="button" value="Chats" class="btn btn-outline-info px-5 mb-2">
                        <input type="button" value="groups" class="btn btn-outline-info px-5 mb-2">
                    </div>
                    <div class="chat-list" id="chat">
                        
                    </div>
                </div>
            </div>
        </div>
        <script>
            const user_list = document.querySelector(".chat-list");
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

            function loadDoc(id) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200){  
                        user_list.classList.add("active");
                        document.getElementById("chat").innerHTML =
                        this.responseText;
                    }
                };
                xhttp.open("GET", "./chat.php?q=" + id, true);
                xhttp.send();
            }

            function stopld(){
                user_list.classList.remove("active");
            }
        </script>
        <script src="./js/users/users_list.js"></script>
        <script src="./js/home.js"></script>
        <?php include_once("./includes/footer.php")?>