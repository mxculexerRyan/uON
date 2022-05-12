<?php
    session_start();
    include_once("./config/config.php");
    $logid = mysqli_real_escape_string($conn, ($_POST['logid']));
    $passwd = mysqli_real_escape_string($conn, ($_POST['passwd']));
        $sql = "SELECT * FROM users WHERE (Email = '$logid' or Username = '$logid') LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if($result ->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($passwd, $row['Password'])){
                $_SESSION['user_id'] = $row['u_id'];
                echo "success";
            }
            else{
            echo "Incorrect Em-us-pas";
            }
        }else{
            echo "Sorry Account Doesn't Exist";
        }
        
    ?>