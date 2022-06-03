<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }
    include_once("./php/config/config.php");
    include_once("./includes/header.php");
?>
<link rel="stylesheet" href="./imported/styles/cropper/cropper.css">
<script src="./imported/js/cropper/cropper.js"></script>
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
                <?php
                include("./includes/home/profile_section.php");
                ?>
            </div>
            <div class="col-6">
                <?php 
                include("./includes/home/status_section.php");
                include("./includes/home/post_section.php");
                ?>
            </div>
            <div class="col">
                <?php 
                include("./includes/home/message_section.php"); 
                ?>
            </div>
        </div>
        <script src="./js/home.js"></script>
        <?php include_once("./includes/footer.php")?>