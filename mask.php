<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cropper.js</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.3/cropper.css">
  <style>
    .container {
      margin: 20px auto;
    }

    img {
      max-width: 100%;
    }
  </style>
</head>
<body>
  <div class="container">
    <div>
      <img id="image" src="photo.jpg" alt="Picture" height="600px">
    </div>
    <p>Data: <span id="data"></span></p>
    <p>Crop Box Data: <span id="cropBoxData"></span></p>
    <p>
      <button type="button" id="button">Crop</button>
    </p>
    <div id="result"></div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.4.3/cropper.js"></script>
  <script>
    window.addEventListener('DOMContentLoaded', function () {
      var image = document.querySelector('#image');
      var data = document.querySelector('#data');
      var cropBoxData = document.querySelector('#cropBoxData');
      var button = document.getElementById('button');
      var result = document.getElementById('result');

      var cropper = new Cropper(image, {
        dragMode: 'move',
        aspectRatio: 15 / 21,
        autoCropArea: 0.65,
        restore: false,
        guides: true,
        center: false,
        highlight: true,
        cropBoxMovable: true,
        cropBoxResizable: true,
        toggleDragModeOnDblclick: false,

        ready: function (event) {
          // Zoom the image to its natural size
          cropper.zoomTo(1);
        },

        crop: function (event) {
          data.textContent = JSON.stringify(cropper.getData());
          cropBoxData.textContent = JSON.stringify(cropper.getCropBoxData());
        },

        zoom: function (event) {
          // Keep the image in its natural size
          if (event.detail.oldRatio === 1) {
            event.preventDefault();
          }
        },
      });

      button.onclick = function () {
        result.innerHTML = '';
        result.appendChild(cropper.getCroppedCanvas());
      };
    });
  </script>
</body>
</html>
