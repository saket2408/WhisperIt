<?php 
include "header.php";
?>
		<div class="row maincontent">
			<div class="col-xs-6">
				<h1 align="center">WhisperIt</h1><br><br>
				<img id="logo" src="http://localhost/twitter/logo.png">
			</div>
			<div class="col-xs-6">
				<h3><b>just one more step to go!!</b></h3><br><br>
				
						<form action="upload_pic.php?email=<?php echo $_GET['email'];?>" method="post" enctype="multipart/form-data">
									<div id="image-preview">
											  <label for="image-upload" id="image-label">Choose Profile photo</label>
									  <input type="file" name="image" id="image-upload" />
									</div><br>
			    <div class="form-group">
				  <label >Add your Bio:</label>
				  <textarea class="form-control" rows="5" name="Bio"></textarea>
				</div>
			    <input type="submit" name="" class="btn btn-primary" value="done">
			</form>
			
				

				
			</div>
		</div>
<script type="text/javascript">
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose profile pic",   // Default: Choose File
    label_selected: "Change pic",  // Default: Change File
    no_label: false                 // Default: false
  });
});
</script>
<?php 
include "footer.php";
?>