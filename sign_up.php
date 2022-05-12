<?php
    include_once("./php/config/config.php");
    include_once("./includes/header.php")
    ?>
    <body>
    <div class="container d-flex p-3 mx-auto flex-column">
        <!-- <div class="container my-5"> -->
        <header class="mb-auto">
            <h3 class="float-left">uON | <span class="text-info">Registration Form</span></h3>
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
            <section class="form signup">
                <!-- <form action=s"#" class="form" id="myform" method="POST"> -->
                <form role="form">
                    <!-- progress bar -->
                    <div class="progressbar">
                        <div class="progress" id="progress"></div>
                        <div class="progress-step progress-step-active" data-title="Intro"></div>
                        <div class="progress-step" data-title="Contact"></div>
                        <div class="progress-step" data-title="Authentication"></div>
                        <div class="progress-step" data-title="OTP"></div>
                    </div>

                    <div class="form-step form-step-active">
                        <h4 class="text-center text-info">Introduction Details</h4>
                        <div id="int-err"></div>
                        <div class="form-group">
                            <label for="fname">First name:</label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" autocomplete="off">
                        </div>
                        <div id="fname-err" class="error-txt"></div>

                        <div class="form-group">
                            <label for="lname">Last name:</label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" autocomplete="off">
                        </div>
                        <div id="lname-err" class="error-txt"></div>

                        <div class="form-group">
                            <label for="uname">User name:</label>
                            <input type="text" class="form-control" name="uname" id="uname" placeholder="User Name" autocomplete="off">
                        </div>
                        <div id="uname-err" class="error-txt"></div>

                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" name="dob" id="dob">
                        </div>
                        <div id="dob-err" class="error-txt">
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender:</label><br>
                            <?php $genders = [
                                'male' => 'Male',
                                'female' => 'Female'
                                ]; 
                            ?>

                            <?php foreach ($genders as $key => $value) : ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="gender_<?php echo $key ?>" value="<?php echo $key ?>" />
                                    <label class="form-check-label" for="gender_<?php echo $key ?>"><?php echo $value ?></label>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div id="gender-err" class="error-txt"></div>

                        <div class="field cd_view">
                            <input type="button" class="btn btn-info btn-next" value="Next" id="cd_view"> 
                        </div>
                        <div class="link">Signed up Already?<a href="login.php"> Login now</a> </div>
                    </div>

                    <div class="form-step">
                        <h4 class="text-center text-info">Contact Details</h4>
                        <div class="form-group">
                            <label for="name">Email Adress:</label>
                            <input type="text" class="form-control" id="email" name= "email" placeholder="Enter Your Email Adress" autocomplete="off">
                        </div>
                        <div id="email-err" class="error-txt"></div>

                        <div class="form-group">
                            <label for="name">Phone Number:</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                        <div id="phone-err" class="error-txt"></div>

                        <!-- <div class="field input"> -->
                        
                        <div class="form-group">
                            <label for="uni">University:</label>
                            <select name= "uni" class="form-control" id="uni">
                                <option name="uni" value="" selected>---Select your University---</option>
                            <?php 
                                $sql = "SELECT * FROM university";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<option name="uni" value="'.$row["uni_acr"].'">'.$row["uni_name"].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                        <div id="uni-err" class="error-txt"></div>
                        
                        <div class="form-group">
                            <label for="col">College:</label>
                            <select name= "col" id="col" class="form-control" >
                                    <option name="col" value="">---Select your college---</option>
                                    <option name="col" value="">---ReSelect university to get list of college---</option>
                                    
                            </select>
                        </div>
                        <div id="col-err" class="error-txt"></div>

                        <div class="btn-toolbar pull-right">
                            <div class="field user_rview">
                            <input type="button" value="Back" class="btn btn-prev btn-outline-info mr-3"> 
                            </div>

                            <div class="field auth_view">
                            <input type="button"value="Next" class="btn btn-next btn-info mr-3"> 
                            </div>
                        </div>

                    </div>

                    <div class="form-step">
                        <h4 class="text-center text-info">Authentication Details</h4>
                        <div class="form-group">
                            <label for="passwd">Password</label>
                            <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Enter Your Password">
                            <i id= "eye" class="fas fa-eye"></i>
                        </div>
                        <div id="passwd-err" class="error-txt"></div>

                        <div class="form-group">
                            <label for="passwd">Confirm Password</label>
                            <input type="password" class="form-control" name="cpasswd" id="cpasswd" placeholder="Confirm Your Password">
                            <i id="c-eye" class="fas fa-eye"></i>
                        </div>
                        <div id="cpasswd-err" class="error-txt"></div>

                        <div class="checkbox">
                            <label for="agree"><input type="checkbox" name="agree" id="agree" value="yes"> I agree to the <a href="#"  title="term of service"> Term of Service</a></label>
                        </div>
                        <div id="agree-err" class="error-txt"></div>

                        <div class="btn-toolbar pull-right">
                            <div class="field contact_rview">
                                <input type="button" class="btn btn-prev btn-outline-info mr-3" value="Back"> 
                            </div>
                            
                            <div class="field button">
                                <input type="submit" class="btn btn-info mr-3" value="Submit"> 
                            </div>
                        </div>
                    </div>
                </form>
            </section>
    </div>

        <script>
            $(document).ready(function () {
                $("#uni").change(function () {
                    var val = $("#uni").val();
                    if (val == "UDOM") {
                        $("#col").html("<option value=''selected disabled>---Choose your college---</option><?php $sql = "SELECT * FROM college WHERE uni_id = 1"; $result = $conn->query($sql); if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { echo "<option value='"; echo $row["col_acr"]; echo"'>"; echo $row["col_name"]; echo"</option>"; } }?>");
                    } else if (val == "UDSM") {
                        $("#col").html("<option value=''selected disabled>---Choose your college---</option><?php $sql = "SELECT * FROM college WHERE uni_id = 2"; $result = $conn->query($sql); if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { echo "<option value='"; echo $row["col_acr"]; echo"'>"; echo $row["col_name"]; echo"</option>"; } }?>");
                    } else{
                        $("#col").html("<option value=''selected disabled>---Choose your college---</option><option value=''>Sorry Your University  colleges are currently unavailable</option>");
                    }
                });
            });
        </script>
        <script src="./js/sign_up.js"></script>
        <?php include_once("./includes/footer.php")?>