<?php
if(basename($_SERVER['REQUEST_URI']) == basename(__FILE__)){
    header("location: ../access/access_denied.php");
    exit();
};
?>

<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }
    include_once("../php/config/config.php"); 
?>
<div class="chat-area">
    <div class="header">
        <div>
            <span class="btn btn-outline-info m-2" onclick="grp_back()">
                <i class="fas fa-arrow-left fa-lg"></i>
            </span>
            <?php
                $g_id = $_REQUEST["q"];
                $sql = "SELECT * FROM groups where  group_id = '{$g_id}'";
                $result = $conn->query($sql);
                if ($row = $result->fetch_assoc()){
                }
            ?>
            
        <img src="./images/<?php echo $row['g_image'] ?>" alt="">
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
        <div class="chat-view" id="chat-view">
                
        </div>

        <div>
            <form action="#" id="typing-area" autocomplete="off">
                <div class="row my-2">
                    <div class="col-10 mr-0 pr-0">
                        <input type="text" class="form-control" placeholder="Your Text Here...." id="input-field" name="message">
                        <input type="text" name="outgoing_id" id="outgoing_id" value="<?php echo $_SESSION['user_id'];?>" hidden>
                        <input type="text" name="incoming_id" id="incoming_id" value="<?php echo $g_id;?>" hidden>
                    </div>
                    <div class="col-2 ml-0">
                        <button type="submit" class="btn btn-outline-info" id="sendBtn"><i class="fab fa-telegram-plane fa-lg"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>