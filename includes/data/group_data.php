<?php
    $gid = "";
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = mysqli_query($conn, "SELECT * FROM group_messages WHERE (receiver_id = '{$row['g_id']}') ORDER BY gmsg_id DESC LIMIT 1");
            $row2 = mysqli_fetch_assoc($sql2);
            if(mysqli_num_rows($sql2) > 0){
                $result = $row2['msg'];
                ($outgoing_id == $row2['sender_id']) ? $you = "You: " : $you = " ";
            }else{
                $result = "Tap to start Conversation Here";
                $you = "";
            }

            // trimming the message if the word is more tha 28 characters
            (strlen($result)  > 35) ? $msg = substr($result, 0, 35).'...' : $msg = $result;

        $gid= $row['g_id'];
        $output .= '<div onclick="showgrp('.$gid.');" class="list">
                    <div class="content">
                        <img src="./images/oga.jpg" alt="">
                        <div class="details text-black">
                            <span>'.$row['group_name'].'</span>
                            <p>'.$you.$msg.'</p>
                        </div>
                    </div>
                    <div class="time text-black">
                        <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                    </div>
                </div>';
    }
?>