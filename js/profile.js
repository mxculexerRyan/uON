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