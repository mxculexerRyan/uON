<?php 
    include_once("../php/config/config.php");
    include_once("../includes/infile_header.php");
    ?>
    <style>
        .center-div{
            margin-top: 250px;
            margin-left: 20%;
            border: 1px solid #314cb6;
            text-align: center;
            width: 60%;
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
    <body>
        <div class="container d-flex p-3 mx-auto flex-column">
            <header class="mb-auto">
                <h3 class="float-left">uON | <span class="text-info">403</span></h3>
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

            <div class="center-div">
                <h2>Error: 403</h2>
                <h5>Access to this page is currently Denied</h5>
                <p>~Kindly Go back or re-write the URL~</p>

            </div>
        </div>
        
        <?php include_once("../includes/footer.php")?>