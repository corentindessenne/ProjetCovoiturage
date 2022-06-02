<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/cropper.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css">
</head>
<body>
	<input type="file" name="fileUpload" id="fileUpload" />
    <div id="uploadedImage"></div>
    <hr />
    <div>
      <img id="croppedImage" /><br />
      <button id="cropButton">crop</button>
    </div>
    <div id="cropResult"></div>
	


	<script type="text/javascript">

		const uploadedImageDiv = document.getElementById("uploadedImage");
		const fileUpload = document.getElementById("fileUpload");
		fileUpload.addEventListener("change", getImage, false);
		let cropper = null;
		const cropButton = document.getElementById("cropButton");
		cropButton.addEventListener("click", cropImage);
		let myGreatImage = null;
		const croppedImage = document.getElementById("croppedImage");

		function getImage() {
		  console.log("images", this.files[0]);
		  const imageToProcess = this.files[0];

		  // display uploaded image
		  let newImg = new Image(imageToProcess.width, imageToProcess.height);
		  newImg.src = imageToProcess;
		  newImg.src = URL.createObjectURL(imageToProcess);
		  newImg.id = "myGreatImage";
		  uploadedImageDiv.appendChild(newImg);
		  myGreatImage = document.getElementById("myGreatImage");

		  processImage();
		}

		function processImage() {
		  cropButton.style.display = "block";
		  cropper = new Cropper(myGreatImage, {
		    aspectRatio: 1,
		    crop(event) {
		      console.log(
		        Math.round(event.detail.width),
		        Math.round(event.detail.height)
		      );
		      const canvas = this.cropper.getCroppedCanvas();
		      croppedImage.src = canvas.toDataURL("image/png");
		    }
		  });
		}

		function cropImage() {
		  const imgurl = cropper.getCroppedCanvas().toDataURL();
		  const img = document.createElement("img");
		  img.src = imgurl;
		  document.getElementById("cropResult").appendChild(img);
		}
	</script>
</body>
</html>