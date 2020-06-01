
/************ OPEN MODALS DEPENDING ON THE "DOOR" ************/

$("#door-1").click(function() {	
	$('#bl-question1').modal('show');
	$('html, body').addClass('no-scroll');
	$("#success").css('display','none');
});

$("#door-2").click(function() {
	
	if($("#door-1").hasClass("doorOpen")) {
		$('#bl-question2').modal('show');
		$('html, body').addClass('no-scroll');
	}
	
	else {
		$("#openPre").css('display','block');
		$("#success").css('display','none');
		$(window).scrollTop($('#openPre').offset().top-20);
	}
	
});

$("#door-3").click(function() {
	
	if($("#door-2").hasClass("doorOpen")) {
		$('#bl-question3').modal('show');
		$('html, body').addClass('no-scroll');
	}
	
	else {
		$("#openPre").css('display','block');
		$("#success").css('display','none');
		$(window).scrollTop($('#openPre').offset().top-20);
	}
	
});	

$("#door-4").click(function() {
	
	if($("#door-3").hasClass("doorOpen")) {
		$('#bl-question4').modal('show');
		$('html, body').addClass('no-scroll');
	}
	
	else {
		$("#openPre").css('display','block');
		$("#success").css('display','none');
		$(window).scrollTop($('#openPre').offset().top-20);
	}
	
});

/************ IF NONE CHECKBOX CHECKED = SHOW ERROR MSG - IF SUCCESS = HIDE MODAL AND INSERT DATA ************/

$(".btn-primary").click(function(e) {
	
	if ($('.sev_check:checked').length) {
		
		$(this).parent().parent().find('.error').css('display','none');
			$(this).parents('.modal').modal('hide');
			$('html, body').removeClass('no-scroll');
	}
	
	else {
		e.preventDefault()
			$(this).parent().parent().find('.error').css('display','block');	
	}
});

/************ TO TEST IF DATES ARE WORKING ************/

var date = new Date();
var year = date.getFullYear();
var month = date.getMonth();
var day = date.getDate();

/*****
	ERROR IF-STATEMENT:
	if (year == 2020 && month == 4 && day < 31) {
	
	SUCCESS IF-STATEMENT:
	if (year == 2020 && month == 5 && day < 31) {
*****

if (year == 2020 && month == 4 && day < 31) {
	alert('DATE: ' +  day + ' ' + month + ' ' + year + '\nMonth: Jan = 0, Dec = 11');
}

else {
	document.getElementById('dateError').style.display = 'block';
	document.getElementById('dateError').innerHTML = 'Lågen kan først åbnes fra <br> <strong> D. 1 juli - 31. juli </strong>';
}

**/



