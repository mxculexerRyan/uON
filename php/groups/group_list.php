<?php 
    session_start();
    include_once "../config/config.php";
    $outgoing_id = $_SESSION['user_id'];
    $sql = mysqli_query($conn,"SELECT groups.group_id AS g_id, group_members.group_id AS GID, group_name, created_at, owner_id, group_members.u_id, group_members.role FROM groups,group_members 
                WHERE ((groups.group_id = group_members.group_id) && group_members.u_id = '{$outgoing_id}');" );
    $output = "";
    if(mysqli_num_rows($sql) <= 0){
        $output .="You have No groups Yet";
    }elseif(mysqli_num_rows($sql) > 0){
        include "../../includes/data/group_data.php";
    }  
    echo $output;
?>