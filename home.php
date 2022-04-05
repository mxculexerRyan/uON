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
            <div class="col">1 of 3</div>
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

                    <div class="chat-list" id="chat">
                        <a href="#" onclick="loadDoc();">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                        <a href="#">
                            <div class="content">
                                <img src="./images/zai.jpg" alt="">
                                <div class="details text-black">
                                    <span>Fname Lname</span>
                                    <p>Message</p>
                                </div>
                            </div>
                            <div class="time text-black">
                                <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                                
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/home.js"></script>
        <?php include_once("./includes/footer.php")?>