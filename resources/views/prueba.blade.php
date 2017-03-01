<!DOCTYPE html>
<html>
  <head>
    <title>cropit</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="js/jquery.cropit.js"></script>

    <style>
      .cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        margin-top: 7px;
        width: 250px;
        height: 250px;
      }
      .cropit-preview-image-container {
        cursor: move;
      }
      .image-size-label {
        margin-top: 10px;
      }
      input, .export {
        display: block;
      }
      button {
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    <!-- <form enctype="multipart/form-data" name='imageform' role="form" id="imageform" method="post" action="ajax.php"> -->
    <div class="image-editor">
      <input type="file"  name="images" id="images" class="cropit-image-input">
      <div class="cropit-preview"></div>
      <div class="image-size-label">
        Resize image
      </div>
      <input type="range" class="cropit-image-zoom-input">
      <button class="rotate-ccw">Rotate counterclockwise</button>
      <button class="rotate-cw">Rotate clockwise</button>
        <input type="hidden" name="image-data" value="" class="hidden-image-data" />
      <button class="export" name="image_upload" id="image_upload">Export</button>
    </div>
    <!-- </form> -->

    <script src="js/script.js"></script>
    <script>
      $(function() {
        $('.image-editor').cropit({
          imageState: {
            src: 'http://lorempixel.com/500/400/',
          },
        });
        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });
         

        // $('.export').click(function() {
           // var imageData = $('.image-editor').cropit('export');
         // alert(imageData);
    
         $('.export').click(function() {
    var imageData = $('.image-editor').cropit('export');
    $.ajax({
        type: "POST",
        url: "cropit.php?",
        data: "imageData="+ imageData,
        success: function(data){
            swal({
              title: "awesome!",
              text: "Your image has been updated.",
              type: "success",
              showCancelButton: false,
              closeOnConfirm: true
            },
            function(){
              //location.reload();
            });     
        }
    });
});
      
    
           });
    </script>
  </body>
</html>