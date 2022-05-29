<?php 
    session_start();
    include_once "../config/config.php";
    $outgoing_id = $_SESSION['user_id'];
    // $sql = mysqli_query($conn,"SELECT * FROM users WHERE (NOT u_id = '{$outgoing_id}')" );
    $sql = mysqli_query($conn, "SELECT users.u_id, FName, lName, Username, Image, user_messages.sender_id, 
        user_messages.receiver_id, MAX(user_messages.msg_id) FROM users,user_messages WHERE 
        (((NOT u_id = '{$outgoing_id}') AND ((user_messages.sender_id= '{$outgoing_id}') OR 
        (user_messages.receiver_id = '{$outgoing_id}'))) AND ((users.u_id = user_messages.sender_id) 
        OR (users.u_id = user_messages.receiver_id))) 
        GROUP BY users.u_id ORDER BY MAX(user_messages.msg_id) DESC;");
    $output = "";
    if(mysqli_num_rows($sql) == 0){
        $output .="No Users Found";
    }elseif(mysqli_num_rows($sql) > 0){
        include "../../includes/data/data.php";
    }  
    echo $output;
?>