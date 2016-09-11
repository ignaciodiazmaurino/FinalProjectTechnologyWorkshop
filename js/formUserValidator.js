$(document).ready(function(){
	$("#submitUser").click(function(e){
		//TODO: Validar password e email.

		e.preventDefault();
		var userName = $("#nameInput").val();
		var userLastName = $("#lastNameInput").val();
		var userEmail = $("#inputEmail").val();
		var userAddress = $("#guestAddress").val();
		var userPassword = $("#guestPassword").val();

		var resultValue = $(this).validateForm($("#newUserForm"));
		
		if (!resultValue) {
			console.log(resultValue);
			return false;
		}

		$.ajax(
			{
				url: "classes/controllers/AjaxControllerHandler.php",
				type: "POST",
				//dataType: "json"
				data: {
					action: "createUser",
					controllerclass: 'UserController',
					userName: userName,
					userLastName: userLastName,
					userEmail: userEmail,
					userAddress: userAddress,
					userPassword: userPassword
				}
			}
		).success(function(response){
			var response = JSON.parse(response);
			if(response.code != '201') {
				$(this).openModalCustom("#modalNewUserConfirmation");
				$('#modalMessage').append(
					'<p>Ocurrio un error tratando de crear el usuario</br>'+
					response.code + " - " + response.message +
					'</p>');
			} else {
				$(this).openModalCustom("#modalNewUserConfirmation");
				$('#modalMessage').append('<p>El usuario se creo correctamente</br>'+
					response.code + " - " + response.message +
					'</p>');
			}
			
		}).fail(function(){
			$(this).getHttpError(jqXHR, textStatus, errorThrown);
			return false;
		});
	});

	$("#closeModalNewUser").click(function(){
		$(this).closeModalCustom("#modalNewUserConfirmation");
		location.reload();
	});
});