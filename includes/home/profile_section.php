<script type="text/javascript">
    $(document).ready(function(){
        var $modal = $('#modal_crop');
        var crop_image = document.getElementById('sample_image');
        var cropper;
        $('#upload_image').change(function(event){
            var files = event.target.files;
            var done = function (url){
                crop_image.src = url;
                $modal.modal('show');
            };
            if(files && files.length > 0){
                reader = new FileReader();
                reader.onload = function(event){
                    done(reader.result);
                };
                reader.readAsDataURL(files[0]);
            }
        });
        $modal.on('shown.bs.modal', function(){
            cropper = new Cropper(crop_image, {
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function(){
            cropper.destroy();
            cropper = null;
        });

        $('#crop_and_upload').click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 400,
                height: 400
            });
            canvas.toBlob(function(blob){
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function(){
                    var base64data = reader.result;
                    $.ajax({
                        url: 'crop_upload.php',
                        method: 'POST',
                        data:{crop_image:base64data},
                        success:function(data){
                            $modal.modal('hide');
                        }
                    });
                };
            });
        });
    });
</script>
<style>
    .img-container img{
        display: block;
        max-width: 100%
    }
    .preview{
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
    .modal-lg{
        max-width: 1000px !important;
        max-height: 10px !important;
    }
</style>

<h4 class="float-left text-info">My Profile</h4><br><br>
<div class="row float-left m-2"></div>

<?php
include_once("./php/config/config.php");
$sql = mysqli_query($conn, "SELECT * FROM users WHERE u_id = '{$_SESSION['user_id']}'");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
}
?>
    <form class="form" id = "form" action="#" enctype="multipart/form-data" method="post">
        <div class="upload">
            <img src="../../../uON/images/<?php echo $row["Image"]; ?>" width = 300 height = 300 title="<?php echo $row["Image"]; ?>">
            <div class="round">
                <!-- <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png"> -->
                <input type="file" name="crop_image" id="upload_image" class="crop_image">
                <i class = "fa fa-camera" style = "color: #fff;"></i>
            </div>
        </div>
    </form>

    <!-- The Modal -->
    <div class="modal" id="modal_crop">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Crop image Before Upload</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="img-container">
                <div class="row">
                    <div class="col-md-8">
                        <img src="" alt="" id="sample_image">
                    </div>
                    <div class="col-md-4">
                        <div class="preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" id="crop_and_upload" class="btn btn-primary">Crop</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Canel</button>
        </div>

        </div>
    </div>
    </div>
