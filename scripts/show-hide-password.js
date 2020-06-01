
// IF WE'RE ON THE RIGSTER PAGE
if(window.location.href.indexOf("register") > -1) {
	$(document).ready(function() {
		var div_reg = document.getElementById('show_hide_reg');
		div_reg.style.backgroundImage = "url('images/show_pass_icon_open.png')";

		var div_reg_rep = document.getElementById('show_hide_reg_rep');
		div_reg_rep.style.backgroundImage = "url('images/show_pass_icon_open.png')";
	});
}

// IF WE'RE ON THE LOGIN PAGE
if(window.location.href.indexOf("login") > -1) {
	$(document).ready(function() {
		var div_login = document.getElementById('show_hide_login');
		div_login.style.backgroundImage = "url('images/show_pass_icon_open.png')";
	});
}

////////// LOGIN

// IF INPUT FIELD IS type="text" IT CHANGES IT TO type="password"
function showPW_login() {

	var pw_input_login = document.getElementById('input_password');
	var div_login = document.getElementById('show_hide_login');

	if(pw_input_login.type == 'text') {
		pw_input_login.type = 'password';	
		div_login.style.backgroundImage = "url('images/show_pass_icon_open.png')";
	}

	else {
		pw_input_login.type = 'text';
		div_login.style.backgroundImage = "url('images/show_pass_icon_close.png')";
	}
}

////////// REGISTER: PASSWORD

function showPW_register() {

	var pw_input_reg = document.getElementById('input_password');
	var div_reg = document.getElementById('show_hide_reg');

	if(pw_input_reg.type == 'text') {
		pw_input_reg.type = 'password';	
		div_reg.style.backgroundImage = "url('images/show_pass_icon_open.png')";
	}

	else {
		pw_input_reg.type = 'text';
		div_reg.style.backgroundImage = "url('images/show_pass_icon_close.png')";
	}
}

////////// REGISTER: PASSWORD REPEAT

function showPW_register_rep() {

	var pw_input_reg_rep = document.getElementById('input_reg_password_rep');
	var div_reg_rep = document.getElementById('show_hide_reg_rep');

	if(pw_input_reg_rep.type == 'text') {
		pw_input_reg_rep.type = 'password';	
		div_reg_rep.style.backgroundImage = "url('images/show_pass_icon_open.png')";
	}

	else {
		pw_input_reg_rep.type = 'text';
		div_reg_rep.style.backgroundImage = "url('images/show_pass_icon_close.png')";
	}
}


