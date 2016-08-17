$(document).ready(function(){
	$("#submitUser").click(function(){
		//TODO: Validar password e email.
		var resultValue = $(this).validateForm($("#newUserForm"));
		if (!resultValue) {
			console.log(resultValue);
			return false;
		}
	});
});