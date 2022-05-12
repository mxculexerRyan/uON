<?php
    session_start();
    include_once("./config/config.php");
    $fname = mysqli_real_escape_string($conn, ($_POST['fname']));
    $lname = mysqli_real_escape_string($conn, ($_POST['lname']));
    $uname = mysqli_real_escape_string($conn, ($_POST['uname']));
    $dob = mysqli_real_escape_string($conn, ($_POST['dob']));
    $gender = mysqli_real_escape_string($conn, ($_POST['gender']));
    $email = mysqli_real_escape_string($conn, ($_POST['email']));
    $phone = mysqli_real_escape_string($conn, ($_POST['phone']));
    $uni = mysqli_real_escape_string($conn, (($_POST["uni"])));
    $col = mysqli_real_escape_string($conn, ($_POST['col']));
    
    $passwd = mysqli_real_escape_string($conn, ($_POST['passwd']));
    $cpasswd = mysqli_real_escape_string($conn, ($_POST['cpasswd']));
    $agree = mysqli_real_escape_string($conn, (isset($_POST['agree'])));
    $u_id = "";
    $uni_id = "";
    $col_id = "";
    $auth_token = rand(100000,999999);
    $date = date("Y-m-d H:i:s");
    $last_date = date("Y-m-d H:i:s");

    
                                    
    $subject = "Test Mail";
    $message = "Hello ".$uname."\n\nYour athentication token is ".$auth_token."\nUse the token to confirm Your Email";
    $headers = "From: mxculexer@gmail.com \r\nReply-To: mxculexer@gmail.com";
    
    if($sql1 = mysqli_query($conn, "SELECT Username FROM users WHERE Username = '{$uname}'")){
        if (!mysqli_num_rows($sql1) > 0) {
            $sql2 = mysqli_query($conn, "SELECT Email FROM users WHERE Email ='{$email}'");
            if (!mysqli_num_rows($sql2) > 0){
                $sql3 = mysqli_query($conn, "SELECT Phone_number FROM users WHERE Phone_number = '{$phone}'");
                if(!mysqli_num_rows($sql3) > 0){
                    if($passwd == $cpasswd && (strlen($cpasswd) > 5) && $agree != ""){
                        $passwd = password_hash("$passwd", PASSWORD_DEFAULT);
                        $sql1 = "SELECT uni_id FROM university WHERE uni_acr = '{$uni}'";
                        $result = $conn->query($sql1);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                        }$uni_id = $row["uni_id"];

                        $sql2 = "SELECT col_id FROM college WHERE col_acr = '{$col}'";
                        $result = $conn->query($sql2);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                        }$col_id = $row["col_id"];

                        $sql = "INSERT INTO users (Fname, Lname, Username, DOB, Gender, Email, Phone_number, uni_id, col_id, Password)
                        VALUES ('$fname', '$lname', '$uname', '$dob', '$gender', '$email', '$phone', '$uni_id', '$col_id', '$passwd');";
                            if($conn->query($sql) === TRUE){

                                $sql4 = "SELECT u_id FROM users WHERE Email = '{$email}'";
                                $result = $conn->query($sql4);
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                }$u_id = $row["u_id"];

                                $sql3 = "INSERT INTO otp (auth_token, date_entry, token_expiry, u_id)
                                VALUES ( '$auth_token', '$date', '$last_date', '$u_id');";
                                    if($conn->query($sql3) === TRUE){
                                    $_SESSION['user_id'] = $u_id;
                                    $mail_sent = mail($email, $subject, $message, $headers);
                                    echo "success";
                                    }else{
                                        echo $conn->error;
                                    }
                                    
                            }else{
                                    echo "Couldn't Connect to Database Try Again Later";
                                    }
                    }else{
                        echo "Penter";
                    }
                }else{
                    echo "Pexist";
                }
            }else{
                    echo "Eexist";
            }
        }else{
            echo "Uexist";
        }
    }
    ?>