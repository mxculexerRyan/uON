<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        include_once("../config/config.php");
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        // $sql = mysqli_query($conn, "SELECT * FROM group_messages WHERE (receiver_id = '{$incoming_id}')");
        $sql = mysqli_query($conn, "SELECT gmsg_id, sender_id, receiver_id, msg, send_time, receive_time, 
            users.Username AS uname, users.u_id, users.Image FROM group_messages, users WHERE ((sender_id = users.u_id)
            && (receiver_id = '{$incoming_id}')) ORDER BY gmsg_id ASC");

        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql)){
                $time = substr($row['send_time'],11,5);
                if($row['sender_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['msg'].'<br>
                                            <span class="out-time">'.$time.'</span>
                                        </p>
                                    </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                    <img src="./images/'.$row['Image'].'" alt="">
                                    <div class="details">
                                        <p>
                                            <b><span>'.$row['uname'].': </span></b>
                                            <br>'.$row['msg'].'<br>
                                            <span class="out-time">'.$time.'</span>
                                        </p>
                                    </div>
                                </div>';
                }
            }
        } echo $output;
    }else{
        header("location: ./login.php");
    }
?>
