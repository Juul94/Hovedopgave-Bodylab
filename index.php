<?php require('config/db.php'); ?>
<?php include('inc/notloggedin.php'); ?>
<?php include('inc/header.php'); ?>

<div class="mobile">
	<a href="signout.php" class="signout_link">Log ud</a>

	<p class="mb-0 mobile-size">Velkommen</p>
	<p class="mobile-size">
		<?php
			$email = $_SESSION['email'];

			$query = "SELECT * FROM users WHERE email='$email'";

			$result = mysqli_query($conn, $query);

			while($row = mysqli_fetch_assoc($result)) {
				echo $row['name'];
			}
		?>
	</p>
</div>

<h1 class="upper_spacing">Adventskalender</h1>

<p class="larger text-center">Åbn en låge hver advent og vær med i lodtrækningen om lækre præmier fra Bodylab!</p>

<div class="row">
	<div class="col-sm-12 col-md-6 margin-auto">
		<label id="openPre">Åbn venligst lågerne i rækkefølge</label>
		<label id="dateError"></label>
		<?php 
			if (isset($_SESSION['scrollDiv'])) {
				echo $_SESSION['scrollDiv']; unset($_SESSION['scrollDiv']); echo '<script>$("#openPre").css("display","none");</script>';
			}
		
			if (isset($_SESSION['success'])) { 
				echo $_SESSION['success']; unset($_SESSION['success']);
			} 
		?>
	</div>
</div>

<div class="row text-center" id="door_div">

	<div class="row col-sm-12 margin-auto">
		<div class="col-sm-12 col-md-6">
			<div id="door-1" class="door uppercase">1. Advent</div>

			<div class="backDoor bd1"></div>
		</div>
		
		<div class="col-sm-12 col-md-6 mobile-mt5" id="advent1"></div>
	</div>
	
	<div class="row col-sm-12 mt-5 margin-auto">		
		<div class="col-sm-6 small-mb-20 d-none d-sm-none d-md-block" id="advent2"></div>
		
		<div class="col-sm-6">
			<div id="door-2" class="door uppercase">2. Advent</div>

			<div class="backDoor bd2"></div>
		</div>
		
		<div class="col-sm-6 mobile-mt5 d-block d-sm-block d-md-none" id="advent2"></div>
	</div>
	
	<div class="row col-sm-12 mt-5 margin-auto">
		<div class="col-sm-6">
			<div id="door-3" class="door uppercase">3. Advent</div>

			<div class="backDoor bd3"></div>
		</div>
		
		<div class="col-sm-6 mobile-mt5" id="advent3"></div>
	</div>
	
	<div class="row col-sm-12 mt-5 margin-auto">
		<div class="col-sm-6 mobile-mt5 d-none d-sm-none d-md-block" id="advent4"></div>
		
		<div class="col-sm-6">
			<div id="door-4" class="door uppercase">4. Advent</div>

			<div class="backDoor bd4"></div>
		</div>
		
		<div class="col-sm-6 small-mb-20 mobile-mt5" id="advent4"></div>
	</div>

</div><!-- row -->

<?php include('inc/questions/question1.php'); ?>
<?php include('inc/questions/question2.php'); ?>
<?php include('inc/questions/question3.php'); ?>
<?php include('inc/questions/question4.php'); ?>

<script src="scripts/openDoors.js"></script>
<script src="scripts/noHashTag.js"></script>

<?php include('inc/footer.php'); ?>
	
<?php
	$query = "SELECT calender_nr FROM users WHERE id = ".$_SESSION['id'];

	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) == 1) {
		$selectedVal = $result->fetch_object()->calender_nr;
	}
?>

<?php if (isset($selectedVal)) { ?> 

<script>
	
	/*** OPEN THE CALENDAR DOORS ***/

	var selectedVal = <?php echo $selectedVal ?>;
	var door = document.querySelectorAll(".door");
	
	/*** FOR LOOP SOM TJEKKER FOR HVERT ELEMENT (LÅGER I VORES TILFÆLDE, 4 STK.) OG ÅBNER DEN NÅR MAN KLIKKER ***/
	for(i=0; i<=selectedVal; i++) {			
		door[i].classList.add("doorOpen");
		door[i].nextElementSibling.classList.add("doorOpened");
	}
	
	/*** IGEN BENYTTER VI ET FOR LOOP FOR AT TJEKKE  ***/
	for(i=0; i<door.length; i++) {

		door[i].setAttribute('data-index',i);

		/*** HVIS INGEN LÅGER ER ÅBNET SÆT ***/
		if(i!=0) {				
			door[i].setAttribute('data-index-pre',i-1);
		}

		/*** NÅR MAN KLIKKER PÅ EN DØR SKAL STYLINGEN UDFØRES (SÅ DÅREN ÅBNER OG DET INDEN I VISES) ***/
		door[i].addEventListener('click', function(event) {

			document.getElementById('openPre').style.display = 'none';

			ind = this.getAttribute('data-index');

			if(ind == 0) {					
				update(ind);
				this.classList.toggle("doorOpen");
				this.nextElementSibling.classList.toggle("doorOpened");
			}

			else {

				indpre = this.getAttribute('data-index-pre');
				el = document.querySelectorAll(".door")[indpre];

				if(el.classList.contains('doorOpen')) {						
					update(ind);
					this.classList.toggle("doorOpen");
					this.nextElementSibling.classList.toggle("doorOpened");
				}

				else {
					
					if($('#success:visible').length == 0 && window.location.hash) {
						history.pushState(null, null, ' ');
					}
					
					document.getElementById('openPre').style.display = 'block';
					$(window).scrollTop($('#openPre').offset().top-20);
				}
			}
		});
	}

	/*** HER SENDER VI VORES DATA MED AJAX VIA XHTTP DER SENDER DATA UDEN AT SKULLE REFRESH SIDEN ***/
	function update(val) {
		/*** HER OPRETTER VI EN VARIABEL OG STARTER EN NY REQUEST TIL AT SENDE DATAEN ***/
		var xhttp = new XMLHttpRequest();
		
		/*** 
			ALLER FØRST ÅBNER VI VORES FORBINDELSE.
			MED VORES VARIABEL/REQUEST KAN VI NU SENDE VORES DATA LIGESOM I PHP:
			XMLHttpRequest.open(method, url, SEND OR NOT WITH true/false)
		***/
		xhttp.open("POST", "update.php", true);
		
		/*** 
			FØR AT DATAEN KAN SENDES SKAL DEN FØRST FORBI HEADEREN.
			
			XMLHttpRequest.setRequestHeader(header, value):
			
			header: VORES HEADER DER SKAL INDSTILLES
					DET ER VORES CONTENT, SÅ DERFOR BENYTTER VI CONTENT-TYPE
			
			value: VORES VÆRDI DER SKAL INDSTILLES SOM BODY AF HEADEREN
				   application/x-www-form-urlencoded: REPRÆSENTERER EN URL KODET FORM SÅ VI KAN LÆSE VORES VÆRDI VIA EN SKJULT URL.
		***/
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
		/*** TIL SIDST SENDER VI VORES VÆRDI VIDERE SÅ VI KAN BENYTTE DEN I PHP OG GEMME DATAEN/VÆRDIEN ***/
		xhttp.send("val="+val);
	}

</script>

<?php } ?>

