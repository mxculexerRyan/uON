<?php
    session_start();
    include_once("./config/config.php");
    $phone = mysqli_real_escape_string($conn, ($_POST['phone']));
    $passwd = mysqli_real_escape_string($conn, ($_POST['passwd']));
    $auth_token = rand(100000,999999);
        $sql = "SELECT * FROM users WHERE Phone_number = '$phone' LIMIT 1";
        $result = $conn->query($sql);
        if($result ->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($passwd, $row['Password'])){

                $_SESSION['user_id'] = $row['u_id'];
                // $count = $row['token_count'];
                $sql1 = "UPDATE otp SET auth_token = '{$auth_token}', token_count = token_count + 1 WHERE otp_id='{$_SESSION['user_id']}'";
                if ($conn->query($sql1) === TRUE) {
                    echo "success";
                  } else {
                    echo "Error updating record: " . $conn->error;
                  }
            }
            else{
            echo "Incorrect Em-us-pas";
            }
        }else{
            echo "Sorry Account Doesn't Exist";
        }
        
    ?>