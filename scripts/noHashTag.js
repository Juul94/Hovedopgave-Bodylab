
/*** REMOVES THE #success IN THE URL IF THE SUCCESS MSG DIV IS GONE/DISPLAY=NONE ***/

$(document).ready(function() {
	if($('#success:visible').length == 0 && window.location.hash) {
		history.pushState(null, null, ' ');
	}
});