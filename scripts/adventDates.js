
var date = new Date();
var year = date.getFullYear();
var month = date.getMonth();
var day = date.getDate();

var door = document.querySelectorAll(".door");

/*** 1. ADVENT - 29 NOV. - ENDS 24 DEC. ***/

if (year == 2020 && month == 10 || month == 11 && day >= 29 || day < 24) {
	
	$("#door-1").click(function() {	
		$('#bl-question1').modal('show');
		$('html, body').addClass('no-scroll');
		$("#success").css('display','none');

		/***
			AND HERE IT SHOULD RUN THE JS CODE AND GET THE DATA AND SEND IT TO PHP VIA AN AJAX CALL
		
			door.classList.add("doorOpen");
			door.nextElementSibling.classList.add("doorOpened");
		
			AND MORE AS IN index.php
		***/
	});
}

else {
	$("#dateError").css('display','block');
	$("#success").css('display','none');
	$("#openPre").css('display','none');
	$(window).scrollTop($('#dateError').offset().top-20);
}

/*** 2. ADVENT - 06 DEC. - ENDS 24 DEC. ***/

if (year == 2020 && month == 11 && day >= 6 && day < 24) {
	
	$("#door-2").click(function() {

		if($("#door-1").hasClass("doorOpen")) {
			$('#bl-question2').modal('show');
			$('html, body').addClass('no-scroll');

			/***
				AND HERE IT SHOULD RUN THE JS CODE AND GET THE DATA AND SEND IT TO PHP VIA AN AJAX CALL

				door.classList.add("doorOpen");
				door.nextElementSibling.classList.add("doorOpened");

				AND MORE AS IN index.php
			***/
		}
	});
}

else {
	$("#dateError").css('display','block');
	$("#success").css('display','none');
	$("#openPre").css('display','none');
	$(window).scrollTop($('#dateError').offset().top-20);
}

/*** 3. ADVENT - 13 DEC. - ENDS 24 DEC. ***/

if (year == 2020 && month == 11 && day >= 13 && day < 24) {

	$("#door-3").click(function() {
		
		if($("#door-2").hasClass("doorOpen")) {
			$('#bl-question3').modal('show');
			$('html, body').addClass('no-scroll');

			/***
				AND HERE IT SHOULD RUN THE JS CODE AND GET THE DATA AND SEND IT TO PHP VIA AN AJAX CALL

				door.classList.add("doorOpen");
				door.nextElementSibling.classList.add("doorOpened");

				AND MORE AS IN index.php
			***/
		}
	});
}

else {
	$("#dateError").css('display','block');
	$("#success").css('display','none');
	$("#openPre").css('display','none');
	$(window).scrollTop($('#dateError').offset().top-20);
}

/*** 4. ADVENT - 20 DEC. - ENDS 24 DEC. ***/

if (year == 2020 && month == 11 && day >= 20 && day < 24) {

	$("#door-4").click(function() {
		
		if($("#door-3").hasClass("doorOpen")) {
			$('#bl-question4').modal('show');
			$('html, body').addClass('no-scroll');

			/***
				AND HERE IT SHOULD RUN THE JS CODE AND GET THE DATA AND SEND IT TO PHP VIA AN AJAX CALL

				door.classList.add("doorOpen");
				door.nextElementSibling.classList.add("doorOpened");

				AND MORE AS IN index.php
			***/
		}
	});
}

else {
	$("#dateError").css('display','block');
	$("#success").css('display','none');
	$("#openPre").css('display','none');
	$(window).scrollTop($('#dateError').offset().top-20);
}






