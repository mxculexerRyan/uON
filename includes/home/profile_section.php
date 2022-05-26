<h4 class="float-left text-info">My Profile</h4><br><br>
<div class="row float-left m-2"></div>

<?php
include_once("./php/config/config.php");
$sql = mysqli_query($conn, "SELECT * FROM users WHERE u_id = '{$_SESSION['user_id']}'");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}

?>
    <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
        <div class="upload">
            <?php
            $id = $row["u_id"];
            $name = $row["Username"];
            $image = $row["Image"];
            ?>
            <img src="../../../uON/images/<?php echo $image; ?>" width = 300 height = 300 title="<?php echo $image; ?>">
            <div class="round">
                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
                <i class = "fa fa-camera" style = "color: #fff;"></i>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        document.getElementById("image").onchange = function(){
            document.getElementById("form").submit();
        };
    </script>
    <?php
    if(isset($_FILES["image"]["name"])){
        $img_name = $_FILES['image']['name']; //getting user uploaded image name
        $tmp_name = $_FILES['image']['tmp_name']; //getting temporary image adress

    // exploadin image name to get file extension
        $img_explode = explode('.', $img_name);
        $img_ext = end($img_explode); //here we get the extension of an image

        $extension = ['jpg', 'png', 'jpeg', 'PNG', 'JPEG', 'JPG']; //here is a list of the accepted extensions
        if(in_array($img_ext, $extension) === true){ //if user image extension is matched
        $time = time(); //will return the current time .. 
                        // needed as we rename img after uploading
                        //making all img to have unique time
        //here we mve the uploaded file to our image folder to reserve
        $new_image_name = $time.$img_name;
        
        if(move_uploaded_file($tmp_name, "./images/".$new_image_name)){ 
            $query = "UPDATE users SET image = '$new_image_name' WHERE u_id = $id";
            mysqli_query($conn, $query);
            move_uploaded_file($tmp_name, './img/'.$new_image_name);
            echo "Please Refresh to view Uploaded Image";
        }else{
            echo "couldn't Move Image";
        }

        }else{
            echo "Please Upload a Valid Image";
        }
    }
    ?>
