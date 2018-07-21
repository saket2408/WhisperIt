<?php 
include "header.php";
?>
		<div class="row maincontent">
			<div class="col-xs-6">
				<h1 align="center">WhisperIt</h1><br><br>
				<img id="logo" src="http://localhost/twitter/logo.png">
			</div>
			<div class="col-xs-6">
				<?php

                if(isset($_GET["error"])){
					echo "<h3><b>password doesn't match</b></h3>";
				}
				?>
				
				<h3>Register Now</h3>
				<form action="register.php" method="post">
									
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required value="">
					</div>		
					<div class="form-group">
						<label>Whisper Handle</label>
						<input type="text" name="handle" class="form-control" required value="">
					</div>					
					
					<div class="form-group">
						<label>Date Of Birth</label>
						<input type="date" name="dob" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="Email" name="email" class="form-control" required value="">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="password" class="form-control" required value="">
					</div>					
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="Password" name="cpassword" class="form-control" required value="">
					</div>	
					<div class="form-group">
  							<label for="sel1">Security Question:</label>
						  	<select class="form-control" id="sel1" name="security_question">
						    <option>What was your childhood nickname?</option>
						    <option>What was your birth month?</option>
						    <option>What is your First School Name?</option>
						    <option>What is your favorite movie?</option>
						    <option>What was the First Novel I ever read</option>
						  </select>
						</div>	
						<div class="form-group">
						<label>Answer</label>
						<input type="text" name="answer" class="form-control" required value="">
					</div>	

							
					

					
					<input type="submit" name="" class="btn btn-primary" value="Next">
				</form>
			</div>
		</div>

<?php 
include "footer.php";
?>