<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }
    include_once("./php/config.php"); 
?>
<div class="chat-area">
    <div class="header">
        <div>
            <span class="btn btn-outline-info m-2" onclick="stopld()">
                <i class="fas fa-arrow-left fa-lg"></i>
            </span>
            <img src="./images/zai.jpg" alt="">
            <?php
                $u_id = $_REQUEST["q"];
                $sql = "SELECT * FROM users where  u_id = '{$u_id}'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()){
                }
            ?>
        </div>
        <div class="header-details">
            <span><?php echo $row["FName"]." ".$row["lName"] ?></span>
            <p><?php echo $row["Email"]; ?></p>
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
                    <p>Loremg elit labore odit </p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="./images/zai.jpg" alt="">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur </p>
                </div>
            </div>

            <div class="chat outgoing">
                <div class="details">
                    <p>Loremg elit labore odit </p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="./images/zai.jpg" alt="">
                <div class="details">
                    <p>excepturi, Quia magnam numquam tenetur delectus</p>
                </div>
            </div>

            <div class="chat outgoing">
                <div class="details">
                    <p>excepturi, Quia magnam </p>
                </div>
            </div>

            <div class="chat incoming">
                <img src="./images/zai.jpg" alt="">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsum mollitia veritatis amet odit incidunt porro commodi nisi provident quisquam! Ullam placeat ipsa velit, repellendus facere necessitatibus dolor in debitis?</p>
                </div>
            </div>
            <div class="chat outgoing">
                <div class="details">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, facilis. Voluptatibus culpa vitae, similique nobis dolor ex voluptatem minus. Dolore cumque vitae, a dolorem ipsa officiis in ipsum ipsam harum.</p>
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