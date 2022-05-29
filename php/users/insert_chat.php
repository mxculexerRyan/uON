<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        include_once("../config/config.php");
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $time = date('Y-m-d H:i:s');
        $receive_time = $time;
        
        if(!empty($message)){
            if($sql = mysqli_query($conn, "INSERT INTO messages ( msg, receive_time) 
                VALUES ('{$message}', '{$time}')") OR die()){
                    $last_id = mysqli_insert_id($conn);
                    $sql2 = mysqli_query($conn, "INSERT INTO user_messages (sender_id, receiver_id, msg_id)
                        VALUES ('{$outgoing_id}', '{$incoming_id}', '{$last_id}')");
                }
            
        }
    }else{
        header("location: ./login.php");
    }
?>