<?php require('config/db.php'); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/loggedin.php'); ?>

<?php

	$login_error = false; 

	if(isset($_POST['register'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_hashed = password_hash($password, PASSWORD_DEFAULT);
		$calender_nr = '-1';
		$advent1 = '0';
		$advent2 = '0';
		$advent3 = '0';
		$advent4 = '0';
		
		$query = "SELECT * FROM users WHERE email='$email'";
		
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		
		if(mysqli_num_rows($result) > 0) {
			
			$login_error = true;
			
			echo '<div class="row mt-4">
					<div class="col-md-4 offset-4">
					  <div class="alert alert-danger">
						 <p>Emailen <strong>'. $email .'</strong> er allerede i brug </p>
					  </div>
					</div>
				  </div>';
		}
		
		else {
			
			$query = "INSERT INTO users (name, email, password, calender_nr, advent1, advent2, advent3, advent4) 
					  VALUES ('$name', '$email', '$password_hashed', '$calender_nr', '$advent1', '$advent2', '$advent3', '$advent4')";
			
			$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
			
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['email'] = $email;
			$_SESSION['id'] = $conn->insert_id;

			header("Location: index.php");

			exit();
		}
	}
?>
			
<p class="upper_spacing2 larger text-center">Registrer venligst, hvis du ikke allerede har en bruger, for at åbne lågerne i Bodylabs advents-kalender</p>

<div class="row mt-5 text-center">
	
	<div class="col-sm-12 col-md-4 offset-md-4 small-padding">

		<form class="form-register" id="registerForm" method="POST" action="">     

			<h2 class="form-register-heading">Registrer bruger</h2>
			
			<div class="input-group mb-3">

				<div class="input-group-prepend">
					<span class="input-group-text basic-addon" id="error-name"><i class="fas fa-user"></i></span>
				</div>

				<input type="text" class="form-control" name="name" placeholder="Fulde navn" autofocus="" aria-label="Name" aria-describedby="basic-addon1" id="input_name" value="<?php if($login_error == true) { echo $name; }?>"/>
				
			</div><!-- input-group -->
			
				<label class="errorMSG" id="errorMSG_name"></label>

			<div class="input-group mb-3 margin_top25">

				<div class="input-group-prepend">
					<span class="input-group-text basic-addon" id="error-email"><i class="fas fa-envelope"></i></span>
				</div>

				<input type="text" class="form-control" name="email" placeholder="Email" autofocus="" aria-label="email" aria-describedby="basic-addon1" id="input_email" value="<?php if($login_error == true) { echo $email; }?>"/>

			</div><!-- input-group -->
			
				<label class="errorMSG" id="errorMSG_email"></label>

			<div class="input-group mb-3 margin_top25">

				<div class="input-group-prepend">
					<span class="input-group-text basic-addon" id="error-password"><i class="fas fa-unlock-alt"></i></span>
				</div>

				<input type="password" class="form-control pw-pr" id="input_password" name="password" placeholder="Kodeord" aria-label="Password" aria-describedby="basic-addon1" />
				
				<div class="show_hide" id="show_hide_reg" onClick="showPW_register()"></div>

			</div><!-- input-group -->
			
				<label class="errorMSG" id="errorMSG_password"></label>
			
			<div class="input-group mb-3 margin_top25">

				<div class="input-group-prepend">
					<span class="input-group-text basic-addon" id="error-password_rep"><i class="fas fa-unlock-alt"></i></span>
				</div>
				
				<input type="password" class="form-control pw-pr" id="input_reg_password_rep" name="password_rep" placeholder="Gentag kodeord" aria-label="Password" aria-describedby="basic-addon1" /> 
				
				<div class="show_hide" id="show_hide_reg_rep" onClick="showPW_register_rep()"></div>

			</div><!-- input-group -->
			
				<label class="errorMSG" id="errorMSG_password_rep"></label>

			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="register" value="1">
					<button class="btn btn-lg btn-primary btn-primary-login btn-block margin_top25" id="register_btn" type="button">Opret bruger</button>
				</div>

				<div class="col-md-6 small-mt-10">
					<a href="login.php" class="login_register_link margin_top25">Allerede oprettet?</a>
				</div>
			</div>

		</form>
		
	</div>

</div><!-- row -->

<script src="scripts/form_val_reg.js"></script>
<script src="scripts/show-hide-password.js"></script>

<?php include('inc/footer.php'); ?>

