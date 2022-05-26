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
                    <!-- <div class="col-12">
                        <?php include_once("./includes/image_code/image.php"); ?>
                    </div> -->
                </div>

            </div>
            <div class="col-6">
                <div class="row">
                    <div class="status mx-2 overfow-scroll" id="row">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/oga.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
                        <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
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
                            <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
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
                            <img src="./images/kyle.jpg" alt="" class="m-2 img-thumbnail">
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
                <?php 
                include("./includes/home/message_section.php"); 
                ?>
            </div>
        </div>
        <script src="./js/home.js"></script>
        <script src="./js/chat/chat.js"></script>
        <?php include_once("./includes/footer.php")?>