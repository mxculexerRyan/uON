<?php 
    include_once("./php/config/config.php");
    include_once("./includes/header.php");
    ?>
    <body>
        <div class="container d-flex p-3 mx-auto flex-column">
            <header class="mb-auto">
                <h3 class="float-left">uON | <span class="text-info">Log-In</span></h3>
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

            <section class="form login">
                <!-- <form action="#" id="myform" method="Post" class="form" role="form"> -->
                <form role="form">
                    <!-- <div id="user-det"> -->
                    <div class="form-step form-step-active">
                        <h3 class="text-center text-info">Welcome Back</h3>
                        <div class="form-group">
                            <label for="logid">Log_In ID:</label>
                            <input type="text" class="form-control" name="logid" id="logid" placeholder="Email, Username or phone number" autocomplete="off">
                        </div>
                        <div id="logid-err" class="error-txt"></div>

                        <div class="form-group">
                            <label for="passwd">Password</label>
                            <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password">
                            <i id="eye" class="fas fa-eye"></i>
                        </div>
                        <div id="passwd-err" class="error-txt"></div>

                        <div class="checkbox">
                            <label for="keep"><input type="checkbox" name="keep" id="keep" value="yes"> Keep Me signed in</label>
                        </div>
                        <div id="agree-err" class="error-txt"></div>

                        <div class="field button">
                            <input type="submit" class="btn btn-info mr-3" value="Sign In"> 
                        </div>
                        <div class="link double-link">Don't have an account?<a href="sign_up.php"> sign_up</a> | <a href="forget.php">forget Password</a> </div>
                    </div>
                </form>
            </section>
        </div>
        <script src="./js/log_in.js"></script>
        <?php include_once("./includes/footer.php")?>