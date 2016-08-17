$(document).ready(function(){
	$("#submitReservation").click(function(){
		//TODO: Validar password e email.
		var resultValue = $(this).validateForm($("#newReservationForm"));
		if (resultValue) {
			return true;
		} else {
			return false;
		}
	});
});