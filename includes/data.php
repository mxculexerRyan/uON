<?php
    while($row = mysqli_fetch_assoc($sql)){
        $output .= '<a href="#" onclick="loadDoc();">
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