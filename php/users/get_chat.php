<?php 
    session_start();
    if(isset($_SESSION['user_id'])){
        include_once("../config/config.php");
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = mysqli_query($conn, "SELECT * FROM messages WHERE (sender_id = '{$outgoing_id}' AND  receiver_id = '{$incoming_id}') 
                                    OR (sender_id = '{$incoming_id}' AND  receiver_id = '{$outgoing_id}') ORDER BY msg_id ASC");
        if(mysqli_num_rows($sql) > 0){
            while($row = mysqli_fetch_assoc($sql)){
                if($row['sender_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                }else{
                    $sql2 = mysqli_query($conn, "SELECT * from users WHERE u_id = '{$incoming_id}'");
                    $row2 = mysqli_fetch_assoc($sql2);
                    $output .= '<div class="chat incoming">
                                    <img src="./images/'.$row2['Image'].'" alt="">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                }
            }
        } echo $output;
    }else{
        header("location: ./login.php");
    }
?>
