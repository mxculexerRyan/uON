<?php
    $uid = "";
    while($row = mysqli_fetch_assoc($sql)){

        $sql2 = mysqli_query($conn, "SELECT * FROM messages, user_messages WHERE ((user_messages.msg_id = messages.msg_id) and ((receiver_id = '{$row['u_id']}'
                OR sender_id = '{$row['u_id']}') AND (sender_id = {$outgoing_id}
                OR receiver_id = '{$outgoing_id}'))) ORDER BY us_msgID DESC LIMIT 1");
            $row2 = mysqli_fetch_assoc($sql2);
            if(mysqli_num_rows($sql2) > 0){
                $result = $row2['msg'];
                $time = $row2['send_time'];
                $send_time = substr($time, 11,5);
                ($outgoing_id == $row2['sender_id']) ? $you = "You: " : $you = " ";
            }else{
                $result = "No Message to display here yet!";
                $send_time = "";
                $you = "";
            }

            // trimming the message if the word is more tha 28 characters
            (strlen($result)  > 35) ? $msg = substr($result, 0, 35).'...' : $msg = $result;
            
        $uid= $row['u_id'];
        $output .= '<div onclick="loadsearch('.$uid.');" class="list">
                    <div class="content">
                        <img src="./images/'.$row['Image'].'" alt="">
                        <div class="details text-black">
                            <span>'.$row['FName']. " " .$row['lName']. '</span>
                            <p>'.$you.$msg.'</p>
                        </div>
                    </div>
                    <div class="time text-black">
                        <p>'.$send_time.' <span><i class="fas fa-angle-right"></i></span> </p>
                    </div>
                </div>';
    }

    $gid = "";
    while($row = mysqli_fetch_assoc($sql1)){
        $sql2 = mysqli_query($conn, "SELECT * FROM group_messages WHERE (receiver_id = '{$row['group_id']}') ORDER BY gmsg_id DESC LIMIT 1");
            $row2 = mysqli_fetch_assoc($sql2);
            if(mysqli_num_rows($sql2) > 0){
                $result = $row2['msg'];
                $time = $row2['send_time'];
                $send_time = substr($time, 11,5);
                ($outgoing_id == $row2['sender_id']) ? $you = "You: " : $you = " ";
            }else{
                $result = "Tap to start Conversation Here";
                $you = "";
                $send_time = "";
            }

            // trimming the message if the word is more tha 28 characters
            (strlen($result)  > 35) ? $msg = substr($result, 0, 35).'...' : $msg = $result;

        $gid= $row['group_id'];
        $output .= '<div onclick="searchgrp('.$gid.');" class="list">
                    <div class="content">
                        <img src="./images/'.$row['g_image'].'" alt="">
                        <div class="details text-black">
                            <span>'.$row['group_name'].'</span>
                            <p>'.$you.$msg.'</p>
                        </div>
                    </div>
                    <div class="time text-black">
                        <p>'.$send_time.' <span><i class="fas fa-angle-right"></i></span> </p>
                    </div>
                </div>';
    }
?>