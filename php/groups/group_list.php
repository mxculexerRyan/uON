<?php 
    session_start();
    include_once "../config/config.php";
    $sql = mysqli_query($conn,"SELECT * FROM groups" );
    $output = "";
    if(mysqli_num_rows($sql) <= 0){
        $output .="You have No groups Yet";
    }elseif(mysqli_num_rows($sql) > 0){
        include "../../includes/data/group_data.php";
    }  
    echo $output;
?>