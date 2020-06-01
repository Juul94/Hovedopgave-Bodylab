
var registerButton = document.getElementById('register_btn');

registerButton.addEventListener('click', function(e) {

	var name = document.getElementById('input_name');
	var email = document.getElementById('input_email');
	var password = document.getElementById('input_password');
	var password_rep = document.getElementById('input_reg_password_rep');

	var errorMSG_name = document.getElementById('errorMSG_name');
	var errorMSG_email = document.getElementById('errorMSG_email');
	var errorMSG_password = document.getElementById('errorMSG_password');
	var errorMSG_password_rep = document.getElementById('errorMSG_password_rep');

	var errorCOLOR_name = document.getElementById('error-name');
	var errorCOLOR_email = document.getElementById('error-email');
	var errorCOLOR_password = document.getElementById('error-password');
	var errorCOLOR_password_rep = document.getElementById('error-password_rep');

	var regex_letters_space = /^[a-zA-ZæøåÆØÅ\s]*$/;
	var regex_noSpace = /^\S*$/;
	var regex_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]+$/;

	var errorName = false;
	var errorEmail = false;
	var errorPassword = false;
	var errorPasswordrep = false;


	// ***********************
	// * VALIDATION FOR NAME *
	// ***********************

	if(name.value === null || name.value === "") {
		errorMSG_name.style.display = "block";
		errorMSG_name.innerHTML = "Udfyld venligst dit fulde navn";
		errorCOLOR_name.style.backgroundColor = "#f5c6cb";
	}

	else if(name.value.length < 2) {
		errorMSG_name.style.display = "block";
		errorMSG_name.innerHTML = "Navnet skal minimum indeholde 2 bogstaver";
		errorCOLOR_name.style.backgroundColor = "#f5c6cb";
	}

	else if(!regex_letters_space.test(name.value)) {
		errorMSG_name.style.display = "block";
		errorMSG_name.innerHTML = "Navnet må kun indeholde bogstaver";
		errorCOLOR_name.style.backgroundColor = "#f5c6cb";
	}

	else {
		errorMSG_name.style.display = "none";
		errorMSG_name.innerHTML = "";
		errorCOLOR_name.style.backgroundColor = "#e9ecef";

		var errorName = true;
	}

	// ************************
	// * VALIDATION FOR EMAIL *
	// ************************

	if(email.value === null || email.value === "") {
		errorMSG_email.style.display = "block";
		errorMSG_email.innerHTML = "Udfyld venligst din email";
		errorCOLOR_email.style.backgroundColor = "#f5c6cb";
	}

	else if(!regex_noSpace.test(email.value)) {
		errorMSG_email.style.display = "block";
		errorMSG_email.innerHTML = "Emailen må ikke indeholde mellemrum";
		errorCOLOR_email.style.backgroundColor = "#f5c6cb";
	}

	else if(!regex_email.test(email.value)) {
		errorMSG_email.style.display = "block";
		errorMSG_email.innerHTML = "Indtast venligst en gyldig email";
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
		errorMSG_password.innerHTML = "Udfyld venligst et kodeord";
		errorCOLOR_password.style.backgroundColor = "#f5c6cb";
	}

	else if(password.value.length < 3 || password.value.length > 15) {
		errorMSG_password.style.display = "block";
		errorMSG_password.innerHTML = "Dit kodeord skal være mellem 3-15 karakterer";
		errorCOLOR_password.style.backgroundColor = "#f5c6cb";
	}

	else if(!regex_noSpace.test(password.value)) {
		errorMSG_password.style.display = "block";
		errorMSG_password.innerHTML = "Dit kodeord må ikke indeholde mellemrum";
		errorCOLOR_password.style.backgroundColor = "#f5c6cb";
	}

	else {
		errorMSG_password.style.display = "none";
		errorMSG_password.innerHTML = "";
		errorCOLOR_password.style.backgroundColor = "#e9ecef";

		var errorPassword = true;
	}

	// *********************************
	// * VALIDATION FOR PASSWORD MATCH *
	// *********************************

	if(password_rep.value === null || password_rep.value === "") {
		errorMSG_password_rep.style.display = "block";
		errorMSG_password_rep.innerHTML = "Udfyld venligst et kodeord igen";
		errorCOLOR_password_rep.style.backgroundColor = "#f5c6cb";
	}

	else if(password.value != password_rep.value) {
		errorMSG_password_rep.style.display = "block";
		errorMSG_password_rep.innerHTML = "Dit kodeord matcher ikke";

		errorCOLOR_password.style.backgroundColor = "#f5c6cb";
		errorCOLOR_password_rep.style.backgroundColor = "#f5c6cb";
	}

	else {
		errorMSG_password_rep.style.display = "none";
		errorMSG_password_rep.innerHTML = "";
		
		errorCOLOR_password.style.backgroundColor = "#e9ecef";
		errorCOLOR_password_rep.style.backgroundColor = "#e9ecef";

		var errorPasswordrep = true;
	}

	if (errorName == true && errorEmail == true && errorPassword == true && errorPasswordrep == true) {
		document.getElementById('registerForm').submit();
	}
	
});

