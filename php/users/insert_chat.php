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
            $sql = mysqli_query($conn, "INSERT INTO messages (sender_id, receiver_id, msg, receive_time) 
                                VALUES ('{$outgoing_id}', '{$incoming_id}', '{$message}', '{$time}')") OR die();
        }
    }else{
        header("location: ./login.php");
    }
?>