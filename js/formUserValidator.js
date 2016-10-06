$(document).ready(function(){
	$("#submitUser").click(function(e){

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
				$('#modalMessage').append('<h2>Ocurrio un error tratando de crear el usuario</h2>');
				$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
				$('#modalMessage').append('<button id="acceptModalNewUserConfirmation" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
			} else {
				$(this).openModalCustom("#modalNewUserConfirmation");
				$('#modalMessage').append('<h2>El usuario se creo correctamente</h2>');
				$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
				$('#modalMessage').append('<button id="acceptModalNewUserConfirmation" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
			}
			$("#acceptModalNewUserConfirmation").click(function(){
				$(this).closeModalCustom("#modalNewUserConfirmation");
				location.reload();
			});
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