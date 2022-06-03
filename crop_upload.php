<?php
    session_start();
    include_once("../uON/php/config/config.php");
    $outgoing_id = $_SESSION['user_id'];
    if(isset($_POST['crop_image'])){
        $data = $_POST['crop_image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $base64_decode = base64_decode($image_array_2[1]);
        $path_img = './images/'.time().'.png';
        $imagename = ''.time().'.png';
        file_put_contents($path_img, $base64_decode);

        // $sql2 = "INSERT INTO upload(imagename) VALUES ('$imagename')";
        // $conn->query($sql2);
        $sql2 = "UPDATE users SET image = '$imagename' WHERE u_id = '{$outgoing_id}'";
        $conn->query($sql2);
    }
?>