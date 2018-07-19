<?php 
include "header.php";
?>
		<div class="row maincontent">
			<div class="col-md-6">
				<h1 align="center">WhisperIt</h1>
				<img src="download.svg">
			</div>
			<div class="col-md-6">
				<h3><b>just one more step to go!!</b></h3><br><br>
				
						<form action="upload_pic.php?email=<?php echo $_GET['email'];?>" method="post" enctype="multipart/form-data">
							 <div class="form-group">
			   <label for="fileToUpload"> Select profile picture  to upload:</label>
			    <input type="file" name="fileToUpload" id="fileToUpload">
			</div><br>
			    <div class="form-group">
				  <label >Add your Bio:</label>
				  <textarea class="form-control" rows="5" name="Bio"></textarea>
				</div>
			    <input type="submit" name="" class="btn btn-primary" value="done">
			</form>
			
				

				
			</div>
		</div>

<?php 
include "footer.php";
?>