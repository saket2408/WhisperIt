<?php   include "header.php"?>
	<div class="container note">
		
		<div class="row ">
			<div class="col-md-6">
				<h1 align="center">WhisperIt</h1>
				<img src="download.svg">
			</div>
			<div class="col-md-6">
				<?php
					if(isset($_GET["registrationsuccess"])) {
						echo "<b>You have been registered.</b>";
					}

					if(isset($_GET["error"])) {
						echo "<b>Incorrect credentials.</b>";
					}
				 ?>
				<h3>Login</h3>
				<form action="dologin.php" method="post">
									
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required value="">
					</div>					
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					
					<input type="submit" name="" class="btn btn-primary" value="Login">
				</form>
			</div>
		</div>

	</div>

</body>
</html>