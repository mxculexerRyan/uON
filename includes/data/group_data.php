<?php
    $gid = "";
    while($row = mysqli_fetch_assoc($sql)){
        $gid= $row['group_id'];
        $output .= '<div onclick="showgrp('.$gid.');" class="list">
                    <div class="content">
                        <img src="./images/oga.jpg" alt="">
                        <div class="details text-black">
                            <span>'.$row['group_name'].'</span>
                            <p>Last Message</p>
                        </div>
                    </div>
                    <div class="time text-black">
                        <p>11:00 <span><i class="fas fa-angle-right"></i></span> </p>
                    </div>
                </div>';
    }
?>