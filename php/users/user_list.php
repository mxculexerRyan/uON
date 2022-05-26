<?php 
    session_start();
    include_once "../config/config.php";
    $outgoing_id = $_SESSION['user_id'];
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE NOT u_id = '{$outgoing_id}'" );
    $output = "";
    if(mysqli_num_rows($sql) == 1){
        $output .="No Users Found";
    }elseif(mysqli_num_rows($sql) > 0){
        include "../../includes/data/data.php";
    }  
    echo $output;
?>