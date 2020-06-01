
var toTopBTN = document.getElementById("toTop");

window.onscroll = function() { scrollFunction(); };

function scrollFunction() {

	if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
		toTopBTN.style.opacity = "1";
	}

	else {
		toTopBTN.style.opacity = "0";
	}
}

function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}