<?php 
    include_once("./php/config.php");
    include_once("./includes/header.php");
    ?> 
    <body>
        <div class="container d-flex p-3 mx-auto flex-column">
            <header class="mb-auto">
                <h3 class="float-left">uON | <span class="text-info">Recovery Form</span></h3>
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
            <h5 class="mt-5" style="text-align: center;">Dear customer were are sorry that you could not remember your 
            Account details please fill the form below to create new credentials 
            for your account </h5>
            <section class="form forgot">
                <!-- <form action="#" id="myform" method="Post" class="form" role="form"> -->
                <form role="form">
                    <!-- <div id="user-det"> -->
                    <div class="form-step form-step-active">
                        <div class="form-group">
                            <label for="det">What Detail did u forget:</label>
                            <select name= "det" class="form-control" id="det">
                                <option name="det" value="" selected disabled>---What detail did u forget---</option>
                                <option name="det" value="email">Email</option>
                                <option name="det" value="phone">Phone</option>
                                <option name="det" value="uname">Username</option>
                                <option name="det" value="passwd">Password</option>
                            </select>
                        </div>
                        <div id="det-err" class="error-txt"></div>

                        <div class="form-group" id="qn1">
                        </div>
                        <div id="qn1-err" class="error-txt"></div>

                        <div class="form-group" id="qn2">
                        </div>
                        <div id="qn2-err" class="error-txt"></div>

                        <div class="field button">
                            <input type="submit" class="btn btn-info mr-3" value="Login"> 
                        </div>
                        <div class="link">Does not have Account?<a href="sign_up.php"> sign_up now</a></div>
                    </div>
                </form>
            </section>
        </div>
        <script>
            $(document).ready(function () {
                $("#det").change(function () {
                    var val = $("#det").val();
                    if (val == "email"){
                        $("#qn1").html("<label>Please enter Your Phone Number</label><input type='text' class='form-control' name='phone' id='phone' placeholder='Phone Number'>");
                        $("#qn2").html("<label>Please enter Your Password</label><input type='password' class='form-control' name='passwd' id='passwd' placeholder='Enter Password'><i class='fas fa-eye'></i>");
                        // $("#btn").html("<input type='submit' class='btn btn-info mr-3' value='Submit'>");
                    } else if (val == "phone") {
                        $("#qn1").html("<label>Please enter Your Email Adress</label><input type='email' class='form-control' name='email' id='email' placeholder='Email Address'>");
                        $("#qn2").html("<label>Please enter Your Password</label><input type='password' class='form-control' name='passwd' id='passwd' placeholder='Enter Password'><i id='eye' class='fas fa-eye'></i>");
                        // $("#btn").html("<input type='submit' class='btn btn-info mr-3' value='Submit'>");
                    }else if (val == "uname") {
                        $("#qn1").html("<label>Please enter Your Email Adress</label><input type='email' class='form-control' name='email' id='email' placeholder='Email Address'>");
                        $("#qn2").html("<label>Please enter Your Password</label><input type='password' class='form-control' name='passwd' id='passwd' placeholder='Enter Password'>");
                        // $("#btn").html("<input type='submit' class='btn btn-info mr-3' value='Submit'>");
                    }
                    else if (val == "passwd") {
                        $("#qn1").html("<label>Please enter Your Email Adress</label><input type='email' class='form-control' name='email' id='email' placeholder='Email Address'>");
                        $("#qn2").html("<label>Please enter Your Phone Number</label><input type='text' class='form-control' name='phone' id='phone' placeholder='Phone Number'>");
                        // $("#btn").html("<input type='submit' class='btn btn-info mr-3' value='Submit'>");
                    }
                    else{
                        $("#qn1").html("<label>Sorry Nothing available to deliver</label>");
                        $("#qn2").html("");
                        // $("#btn").html("");
                    }
                });
            });
        </script>
        <script src="./js/forget.js"></script>
        <?php include_once("./includes/footer.php")?>