<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }
    // include_once("../php/config.php"); 
    include_once("../php/config/config.php"); 
?>
<div class="chat-area">
    <div class="header">
        <div>
            <span class="btn btn-outline-info m-2" onclick="grp_back()">
                <i class="fas fa-arrow-left fa-lg"></i>
            </span>
            <img src="./images/oga.jpg" alt="">
            <?php
                $g_id = $_REQUEST["q"];
                $sql = "SELECT * FROM groups where  group_id = '{$g_id}'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()){
                }
            ?>
        </div>
        <div class="header-details">
            <span class="text-center"><?php echo $row["group_name"]?></span>
        </div>
            <div class="content">
                <div class="details text-black">
                </div>
            </div>
        <span class="btn btn-outline-info m-2">
            <i class="fas fa-ellipsis-vertical fa-lg"></i>
        </span>
    </div>

    <div class="chat-box bg-base">
        <div class="chat-view">
            <div class="chat outgoing">
                <div class="details">
                    <p>Hello group Welcome</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="./images/oga.jpg" alt="">
                <div class="details">
                    <p>Hello i am oga</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="./images/zai.jpg" alt="">
                <div class="details">
                    <p>Hello i am Zai</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="./images/ayo.jpg" alt="">
                <div class="details">
                    <p>Helo i am Ayo</p>
                </div>
            </div>
            <div class="chat outgoing">
                <div class="details">
                    <p>anyone yet to introduce</p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="./images/sied.jpg" alt="">
                <div class="details">
                    <p>Helo i am sied Am new here</p>
                </div>
            </div>
        </div>

        <div>
            <form action="#">
                <div class="row my-2">
                    <div class="col-10 mr-0 pr-0">
                        <input type="text" class="form-control" placeholder="Your Text Here...." id="text">
                    </div>
                    <div class="col-2 ml-0">
                        <span class="btn btn-outline-info">
                            <i class="fab fa-telegram-plane fa-lg"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>