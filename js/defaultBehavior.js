$(document).ready(function(){

	$("#idEntrar").click(function(){
		if ($("#idEntrar").text()=="Entrar") {
			$(this).resetErrorMessages(["#userError","#passError"]);
			$(this).openModalCustom("#modalLogin");
		} else {
			$.ajax(
				{
					url: "classes/controllers/AjaxControllerHandler.php",
					type: "post",
					data: {
						action: "logout",
						controllerclass: 'LoginController'
					}
				}
			).fail(
				function(){
					$(this).getHttpError(jqXHR, textStatus, errorThrown);
					return false;
				}
			).always(
				function(){
					location.reload();
				}
			);
		}
		
	});

	$("#idRegistrarse").click(function(){
		window.location.href="index.php?page=newUser";
	});
	
	$("#closeLogin").click(function(){
		$(this).closeModalCustom("#modalLogin");
	});

	//Valida el form del login
	$("#submitLogin").click(function(){
		//Remueve los mensajes de error;
		$(this).resetErrorMessages(["#userError","#passError"]);

		var user = $("#userLoginForm").val();
		var password = $("#passwordLoginForm").val();

		//Valido las entradas;
		if (user.length<6) {
			var errorUser = "El usuario no puede tener menos de 6 caracteres";
			$(this).showErrorDivMessage({divId: "#userError",message: errorUser});
		}

		if (password.length<6) {
			var errorPassword = "La contraseña no puede tener menos de 6 caracteres";
			$(this).showErrorDivMessage({divId: "#passError",message: errorPassword});
		}
		if (user.length<6 || password.length<6) {
			return false;
		}
		//Llamado para loguear usuario
		$.ajax(
			{
				url: "classes/controllers/AjaxControllerHandler.php",
				type: "post",
				data: {
					action: "login",
					controllerclass: 'LoginController',
					userName: user,
					password: password
				}
			}
		).success(
			function(user){
				//TODO: Definir que hacer aca
			}
		).fail(
			function(){
				$(this).getHttpError(jqXHR, textStatus, errorThrown);
				return false;
			}
		);

	});

});