<?php
    $uid = "";
    while($row = mysqli_fetch_assoc($sql)){

        $sql2 = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id = '{$row['u_id']}'
                OR sender_id = '{$row['u_id']}') AND (sender_id = {$outgoing_id}
                OR receiver_id = '{$outgoing_id}') ORDER BY msg_id DESC LIMIT 1");
            $row2 = mysqli_fetch_assoc($sql2);
            if(mysqli_num_rows($sql2) > 0){
                $result = $row2['msg'];
                ($outgoing_id == $row2['sender_id']) ? $you = "You: " : $you = " ";
            }else{
                $result = "No Message to display here yet!";
                $you = "";
            }

            // trimming the message if the word is more tha 28 characters
            (strlen($result)  > 35) ? $msg = substr($result, 0, 35).'...' : $msg = $result;
        
        $uid= $row['u_id'];
        $output .= '<div onclick="loadDoc('.$uid.');" class="list">
                    <div class="content">
                        <img src="./images/sied.jpg" alt="">
                        <div class="details text-black">
                            <span>'.$row['FName']. " " .$row['lName']. '</span>
                            <p>'.$you.$msg.'</p>
                        </div>
                    </div>
                    <div class="time text-black">
                        <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                    </div>
                </div>';
    }
?>