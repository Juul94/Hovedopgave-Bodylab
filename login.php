<?php require('config/db.php'); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/loggedin.php'); ?>

<?php 
	$login_error = false;

	$errorWrong = "";
	$errorWrongPass = "";

	if(isset($_POST['email']) && isset($_POST['logind'])) {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "SELECT * FROM users WHERE email='$email' limit 1";

		$result = mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1) {
			
			while($row = mysqli_fetch_array($result)) {
				
				 if(password_verify($password, $row["password"])) {

					$_SESSION['loggedin'] = true;
					$_SESSION['email'] = $email;
					$_SESSION['id'] = $row['id'];

					header("Location: index.php");

					exit(); 
				 }

				else {
					$login_error = true;
					$errorWrongPass = '<label class="errorMSG2" id="errorWrongPass"> Forkert kodeord </label>';
				}
				
			}
		}

		else {
			$login_error = true;
			$errorWrong = '<label class="errorMSG2" id="errorWrong"> Denne email eksisterer ikke </label>';
		}
	}
?>
			
<p class="upper_spacing2 larger text-center">Log venligst ind for at åbne lågerne i Bodylabs advents-kalender</p>

<div class="row mt-5 text-center">
	
	<div class="col-sm-12 col-md-4 offset-md-4 small-padding">

		<form class="form-signin" id="signin" method="POST" action="">       

			<h2 class="form-signin-heading">Log ind</h2>

			<div class="input-group mb-2">

				<div class="input-group-prepend">
					<span class="input-group-text basic-addon" id="error-email"><i class="fas fa-envelope"></i></span>
				</div>

				<input type="text" class="form-control" id="input_email" name="email" placeholder="Email" required="" autofocus="" aria-label="Email" aria-describedby="basic-addon1" value="<?php if($login_error == true) { echo $email; } ?>"/>

			</div><!-- input-group -->
			
			<label class="errorMSG" id="errorMSG_email"></label>
			<?php echo $errorWrong; ?>

			<div class="input-group mb-3 margin_top25">

				<div class="input-group-prepend">
					<span class="input-group-text basic-addon" id="error-password"><i class="fas fa-unlock-alt"></i></span>
				</div>

				<input type="password" class="form-control pw-pr" id="input_password" name="password" placeholder="Kodeord" required="" aria-label="Password" aria-describedby="basic-addon1" id="input_login_pass"/> 
				
				<div class="show_hide" id="show_hide_login" onClick="showPW_login()"></div>

			</div><!-- input-group -->
			
			<label class="errorMSG" id="errorMSG_password"></label>
			<?php echo $errorWrongPass; ?>
			
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="logind" value="1">
					<button class="btn btn-lg btn-primary btn-primary-login btn-block margin_top25" id="btn_login" type="button">Log ind</button>
				</div>

				<div class="col-md-6 small-mt-10">
					<a href="register.php" class="login_register_link margin_top25">Opret bruger</a>
				</div>
			</div>
			
		</form>
		
	</div>

</div><!-- row -->

<script src="scripts/form_val_login.js"></script>
<script src="scripts/show-hide-password.js"></script>

<?php include('inc/footer.php'); ?>

