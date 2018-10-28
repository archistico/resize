<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>TagliaFisso</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.3/cropper.css">
  <style>
    .container {
      max-width: 640px;
      margin: 20px auto;
    }

    img {
      max-width: 100%;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Cropper with fixed crop box</h1>
    <div>
      <img id="image" src="photo.jpg" alt="Picture">
    </div>
    <button type="button" id="button">OK</button>
    <div id="result"></div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.3/cropper.js"></script>
  <script>
    window.addEventListener('DOMContentLoaded', function () {
      var image = document.querySelector('#image');
      var cropper = new Cropper(image, {
        dragMode: 'move',
        aspectRatio: 15 / 21,
        autoCropArea: 0.65,
        restore: false,
        guides: false,
        center: false,
        highlight: true,
        cropBoxMovable: false,
        cropBoxResizable: true,
        toggleDragModeOnDblclick: false,
      });
    });

    window.addEventListener('DOMContentLoaded', function () {
      var image = document.getElementById('image');
      var button = document.getElementById('button');
      var result = document.getElementById('result');
      var croppable = false;
      var cropper = new Cropper(image, {
        viewMode: 0,
        guides: true,
        center: true,
        highlight: true,
        cropBoxMovable: true,
        cropBoxResizable: true,
        ready: function () {
          croppable = true;
        },
      });
      button.onclick = function () {
        var croppedCanvas;
        var maskedCanvas;
        var maskedImage;
        if (!croppable) {
          return;
        }
        // Crop
        croppedCanvas = cropper.getCroppedCanvas();
        // Mask
        maskedCanvas = getMaskedCanvas(croppedCanvas, image, cropper);
        // Show
        maskedImage = document.createElement('img');
        maskedImage.src = maskedCanvas.toDataURL();
        result.innerHTML = '';
        result.appendChild(maskedImage);
      };
    });
  </script>
</body>
</html>
