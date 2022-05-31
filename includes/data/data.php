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
                $result = "No Message to display here yet!";
                $send_time = "";
                $you = "";
            }

            // trimming the message if the word is more tha 28 characters
            (strlen($result)  > 35) ? $msg = substr($result, 0, 35).'...' : $msg = $result;
            
        $uid= $row['u_id'];
        $output .= '<div onclick="loadDoc('.$uid.');" class="list">
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
?>