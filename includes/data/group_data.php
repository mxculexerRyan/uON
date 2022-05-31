<?php
    $gid = "";
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = mysqli_query($conn, "SELECT * FROM group_messages WHERE (receiver_id = '{$row['group_id']}') ORDER BY gmsg_id DESC LIMIT 1");
            $row2 = mysqli_fetch_assoc($sql2);
            if(mysqli_num_rows($sql2) > 0){
                $result = $row2['msg'];
                $time = $row2['send_time'];
                $send_date = substr($time, 0, 10);
                $now = date("Y-m-d");
                
                $date1=date_create($send_date);
                $date2=date_create($now);
                $diff=date_diff($date1,$date2);
                $days = $diff->format("%a");

                if($days == 0){
                    $send_time = "today";
                }elseif ($days == 1) {
                    $send_time = "Yesteday";
                }elseif ($days > 1 AND $days < 8 ) {
                    $send_time = date("l", strtotime($send_date));
                }else{
                    $send_time = $send_date;
                }
                ($outgoing_id == $row2['sender_id']) ? $you = "You: " : $you = " ";
            }else{
                $result = "Tap to start Conversation Here";
                $you = "";
                $send_time = "";
            }

            // trimming the message if the word is more tha 28 characters
            (strlen($result)  > 35) ? $msg = substr($result, 0, 35).'...' : $msg = $result;

        $gid= $row['group_id'];
        $output .= '<div onclick="showgrp('.$gid.');" class="list">
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