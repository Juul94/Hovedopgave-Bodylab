
var registerButton = document.getElementById('btn_login');

registerButton.addEventListener('click', function(e) {
	
	var email = document.getElementById('input_email');
	var password = document.getElementById('input_password');
	
	var errorMSG_email = document.getElementById('errorMSG_email');
	var errorMSG_password = document.getElementById('errorMSG_password');
	
	var errorCOLOR_email = document.getElementById('error-email');
	var errorCOLOR_password = document.getElementById('error-password');
	
	var errorEmail = false;
	var errorPassword = false;

	// ************************
	// * VALIDATION FOR EMAIL *
	// ************************
	
	if(email.value === null || email.value === "") {
		errorMSG_email.style.display = "block";
		errorMSG_email.innerHTML = "Udfyld venligst din email";
		errorCOLOR_email.style.backgroundColor = "#f5c6cb";
	}
	
	else {
		errorMSG_email.style.display = "none";
		errorMSG_email.innerHTML = "";
		errorCOLOR_email.style.backgroundColor = "#e9ecef";
		
		var errorEmail = true;
	}
	
	// ***************************
	// * VALIDATION FOR PASSWORD *
	// ***************************
	
	if(password.value === null || password.value === "") {
		errorMSG_password.style.display = "block";
		errorMSG_password.innerHTML = "Udfyld venligst dit kodeord";
		errorCOLOR_password.style.backgroundColor = "#f5c6cb";
	}
	
	else {
		errorMSG_password.style.display = "none";
		errorMSG_password.innerHTML = "";
		errorCOLOR_password.style.backgroundColor = "#e9ecef";
		
		var errorPassword = true;
	}
	
	if (errorEmail == true && errorPassword == true) {
		document.getElementById('signin').submit();
	}
	
});

