<?php 

	require('../../config/db.php');
	include('../notloggedin.php');

	if(isset($_POST['questions1'])) {
			
		$selected_val = $_POST['radio'];

		$query = 'UPDATE users SET advent1="'.$selected_val.'" WHERE id='.$_SESSION['id'];

		mysqli_query($conn, $query);
		
		$_SESSION['success'] = '<label id="success" style="display:block !important;"><h3 class="success">1. Advent</h3> Du er nu med i lodtrækningen om 3x <a href="https://www.bodylab.dk/shop/proteinboller-chocolate-chip-3153p.html" target="_blank" class="dark">Bodylab Protein Baking Mix</a>, hvis du har svaret rigtigt! <br> Vinderen trækkes d. 25 dec. og får besked via. email.<br> Held og lykke!</label>';
		$_SESSION['scrollDiv'] = '<script> location.href="#success"; </script>';
		
		header("location:../../index.php");	
	}

	if(isset($_POST['questions2'])) {
			
		$selected_val = $_POST['radio'];

		$query = 'UPDATE users SET advent2="'.$selected_val.'" WHERE id='.$_SESSION['id'];

		mysqli_query($conn, $query);
		
		$_SESSION['success'] = '<label id="success" style="display:block !important;"><h3 class="success">2. Advent</h3> Du er nu med i lodtrækningen om 3x <a href="https://www.bodylab.dk/shop/clear-whey-ice-tea-peach-3663p.html" target="_blank" class="dark">Bodylab Clear Whey - Ice Tea Peach</a>, hvis du har svaret rigtigt! <br> Vinderen trækkes d. 25 dec. og får besked via. email.<br> Held og lykke!</label>';
		$_SESSION['scrollDiv'] = '<script> location.href="#success"; </script>';
		
		header("location:../../index.php");	
	}

	if(isset($_POST['questions3'])) {
			
		$selected_val = $_POST['radio'];

		$query = 'UPDATE users SET advent3="'.$selected_val.'" WHERE id='.$_SESSION['id'];

		mysqli_query($conn, $query);
		
		$_SESSION['success'] = '<label id="success" style="display:block !important;"><h3 class="success">3. Advent</h3> Du er nu med i lodtrækningen om 3x <a href="https://www.bodylab.dk/shop/bodylab-bcaa-instant-3071p.html" target="_blank" class="dark">Bodylab BCAA Instant - Passion Mango</a>, hvis du har svaret rigtigt! <br> Vinderen trækkes d. 25 dec. og får besked via. email.<br> Held og lykke!</label>';
		$_SESSION['scrollDiv'] = '<script> location.href="#success"; </script>';
		
		header("location:../../index.php");	
	}

	if(isset($_POST['questions4'])) {
			
		$selected_val = $_POST['radio'];

		$query = 'UPDATE users SET advent4="'.$selected_val.'" WHERE id='.$_SESSION['id'];

		mysqli_query($conn, $query);
		
		$_SESSION['success'] = '<label id="success" style="display:block !important;"><h3 class="success">4. Advent</h3> Du er nu med i lodtrækningen om 1x <a href="https://www.bodylab.dk/shop/string-bag-black-3676p.html" target="_blank" class="dark">Bodylab String Bag - Black</a> fyldt med tilfældige produkter, hvis du har svaret rigtigt! <br> Vinderen trækkes d. 25 dec. og får besked via. email.<br> Held og lykke!</label>';
		$_SESSION['scrollDiv'] = '<script> location.href="#success"; </script>';
		
		header("location:../../index.php");	
	}

?>
