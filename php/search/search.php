<?php
session_start();
include_once "../config/config.php";
$outgoing_id = $_SESSION['user_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT u_id = '{$outgoing_id}' AND FName LIKE '%{$searchTerm}%' OR LName LIKE '%{$searchTerm}%' ");
    
    $sql1 = mysqli_query($conn,"SELECT * FROM groups,group_members 
                WHERE ((groups.group_id = group_members.group_id) && ((group_members.u_id = '{$outgoing_id}') OR (g_status = 'public') )) AND group_name LIKE '%{$searchTerm}%'" );
    // $sql1 = mysqli_query($conn, "SELECT * FROM groups WHERE group_name LIKE '%{$searchTerm}%'");
    if(mysqli_num_rows($sql) > 0){
        include "../../includes/data/search_data.php";
    }else if(mysqli_num_rows($sql1) > 0){
        include "../../includes/data/search_data.php";
    }
    // else{
    //     $output .= "No User or group Found that Matches your Search querry";
    // }
    echo $output;
?>