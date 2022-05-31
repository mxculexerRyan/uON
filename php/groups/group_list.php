<?php 
    session_start();
    include_once "../config/config.php";
    $outgoing_id = $_SESSION['user_id'];
    $sql = mysqli_query($conn, "SELECT groups.group_id, groups.group_name, groups.g_image, groups.g_status, group_messages.sender_id, 
    group_messages.receiver_id, MAX(group_messages.gmsg_id), group_members.group_id, group_members.u_id, group_members.role FROM groups, 
    group_messages, group_members WHERE ((groups.group_id = group_messages.receiver_id) AND ((groups.group_id = group_members.group_id) && 
    (group_members.u_id = '{$outgoing_id}'))) GROUP BY groups.group_id ORDER BY MAX(group_messages.gmsg_id) DESC;");
    $output = "";
    if(mysqli_num_rows($sql) <= 0){
        $output .="You have No groups Yet";
    }elseif(mysqli_num_rows($sql) > 0){
        include "../../includes/data/group_data.php";
    }  
    echo $output;
?>