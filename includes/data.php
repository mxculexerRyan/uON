<?php
    $uid = "";
    while($row = mysqli_fetch_assoc($sql)){
        $uid= $row['u_id'];
        $output .= '<a href="#" onclick="loadDoc('.$uid.');">
                    <div class="content">
                        <img src="./images/zai.jpg" alt="">
                        <div class="details text-black">
                            <span>'.$row['FName']. " " .$row['lName']. '</span>
                            <p>Message</p>
                        </div>
                    </div>
                    <div class="time text-black">
                        <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                    </div>
                </a>';
    }
?>