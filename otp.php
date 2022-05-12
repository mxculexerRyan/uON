<?php 
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }
    include_once("./php/config/config.php");
    include_once("./includes/header.php");
    
?>
    <body>
        <div class="container d-flex p-3 mx-auto flex-column">
            <header class="mb-auto">
                <h3 class="float-left">uON | <span class="text-info">OTP</span></h3>
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
            <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active" data-title="Intro"></div>
                <div class="progress-step" data-title="Contact"></div>
                <div class="progress-step" data-title="Authentication"></div>
                <div class="progress-step" data-title="OTP"></div>
            </div>
            
            <script>
                const progressSteps = document.querySelectorAll('.progress-step');
                let formStepsNum = 3; 
                progressSteps.forEach((progressStep, idx) =>{
                if(idx < formStepsNum + 1){
                    progressStep.classList.add("progress-step-active");
                }else{
                    progressStep.classList.remove("progress-step-active");
                }
                const progressActive = document.querySelectorAll(".progress-step-active");
                progress.style.width = 
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";});
            </script>

            <?php
                $one = $two = $three = $four = $five = $six = $otp = "";
                if(($_SERVER["REQUEST_METHOD"] == "POST")){
                    $one = test_input($_POST["one"]);
                    $two = test_input($_POST["two"]);
                    $three = test_input($_POST["three"]);
                    $four = test_input($_POST["four"]);
                    $five = test_input($_POST["five"]);
                    $six = test_input($_POST["six"]);
                    $otp = $one . $two . $three . $four . $five  . $six;
                }
                function test_input($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-step form-step-active">
                    <h3 class="text-center text-info">One Time Password</h3>
                    <?php
                        $sql = "SELECT * FROM users where  u_id = '{$_SESSION['user_id']}'";
                        $result = $conn->query($sql);
                        ($row = $result->fetch_assoc());
                    ?>
                    <h5>Dear <strong><?php echo $row["FName"]." ".$row["lName"];?></strong> Your account was Succesfully created but we would like to verify your Email<h5>
                    <p>Please enter a confirmation code sent to you via <code><?Php echo $row["Email"]?></code> in the text boxes below</p>
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item mr-4"><a class="page-link" href="#"><textarea name="one" id="" cols="1" rows="1" maxlength="1"></textarea></a></li>
                        <li class="page-item mr-4"><a class="page-link" href="#"><textarea name="two" id="" cols="1" rows="1" maxlength="1"></textarea></a></li>
                        <li class="page-item mr-4"><a class="page-link" href="#"><textarea name="three" id="" cols="1" rows="1" maxlength="1"></textarea></a></li>
                        <li class="page-item mr-4"><a class="page-link" href="#"><textarea name="four" id="" cols="1" rows="1" maxlength="1"></textarea></a></li>
                        <li class="page-item mr-4"><a class="page-link" href="#"><textarea name="five" id="" cols="1" rows="1" maxlength="1"></textarea></a></li>
                        <li class="page-item mr-4"><a class="page-link" href="#"><textarea name="six" id="" cols="1" rows="1" maxlength="1"></textarea></a></li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <input type="submit" name="submit" class="btn btn-info" value="send">
                    </div>
                    <h5>If you did not get the code you can request it <a href="#">here</a></h5>
                    <h5>Or You can <a href="./home.php">Skip</a> this step and confirm your details Later</h5>
                </div>
            </form>

            <?php
                $sql = "SELECT * FROM otp where  u_id = '{$_SESSION['user_id']}'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                if($row['otp_status'] == "Account_unactivated"){
                    if($otp == $row['auth_token']){
                        $_SESSION['user_id'] = $row['u_id'];
                        $sql = "UPDATE otp SET otp_status = 'Account_activated' WHERE otp_id = '{$_SESSION['user_id']}'";
                        if($conn->query($sql) === TRUE){
                            echo "<script>window.location.replace('./home.php')</script>";
                        }else{
                            echo $conn->error;
                        }
                    }else if($otp == ""){
                        echo "";
                    }else{
                        echo "invalid OTP";
                    }
                    echo $row['auth_token'];
                }else{
                    // echo "Your Account Ready Activated";
                    echo "<script>window.location.replace('./home.php')</script>";
                    
                }
            ?>
        </div>
        <?php include_once("./includes/footer.php")?> 
</html>