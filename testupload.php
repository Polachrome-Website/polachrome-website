 <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>       
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    	<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
	
      </head>
      <body>
	  <div class="container">
			<br />
				<h3 align="center">How to Upload a File using Dropzone.js with PHP</h3>
			<br />
			
			<form action="testuploadsend.php" class="dropzone" id="dropzoneFrom">

			</form>
			
				
			</form>
			<br />
			<br />
			<div align="center">
				<button type="submit" class="btn btn-info" id="submit-all">Upload</button>
			</div>
			<br />
			<br />
			<div id="preview"></div>
			<br />
			<br />
			</div>
<script>
  Dropzone.discover();

//   $(document).ready(function(){
// 	Dropzone.options.dropzoneForm = {
// 		autoProcessQueue: false,
// 		acceptedFiles: ".png, .jpg, .gif, .bmp, .jpeg",
// 		init: function(){
// 			var submitButton = document.querySelector('#submit-all');
// 			myDropzone = this;
// 			submitButton.addEventListener("click", function(){
// 				myDropzone.processQueue();
// 			});
// 			this.on("complete", function(){
// 				if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0){
// 					var _this = this;
// 					_this.removeAllFiles();
// 				}
// 				list_image();
// 			});
// 		},
// 	};

// 	list_image();

// 	function list_image(){
// 		$.ajax({
// 			url:"testuploadsend.php",
// 			success:function(data){
// 				$('#preview').html(data);
// 			}
// 		});
// 	}

// 	$(document).on('click', '.remove_image', function(){
// 		var name = $(this).attr('id');
// 			$.ajax({
// 			url:"upload.php",
// 			method:"POST",
// 			data:{name:name},
// 			success:function(data)
// 			{
// 				list_image();
// 			}
// 	})
//  });

//   });

// var QuoteDropzone = new Dropzone('#dropzoneForm', {
// 	init: function () {
// 		var dropzone = this;

// 		$("#removeAllFiles").click(function () {
//         	dropzone.removeAllFiles();
//     	});

//     	$('#submit-all').click(function () {
//         	QuoteDropzone.processQueue();
//     	});
// 	},
// 	autoProcessQueue: false,
// 	url:"testuploadsend.php".
// 	type: 'POST',
// 	success: function () {
//     	toastr.success('<h3>Success</h3><p>Files Uploaded</p>');
// 	},
// 	error: function() {
//     toastr.error('<h3>Error</h3><p>Files Not Uploaded</p>');
// 	}

// });


Dropzone.options.dropzoneForm = {
	autoProcessQueue: false,
  	uploadMultiple: false,
	maxFiles: 2,

	// The setting up of the dropzone
	init: function() {
    var myDropzone = this;

    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue();
    });

	}
}


</script>
      </body>
      </html>