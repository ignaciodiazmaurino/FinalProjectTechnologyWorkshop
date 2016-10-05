$(document).ready(function(){
	$('#changeProfile').click(function(){
		$('#myProfileForm *').removeAttr("readonly");
		$('#changeProfile').remove();
		$('#myProfileButtonSection').append(
			'<button id="changeProfile" type="button" class="btn btn-success widthHalf pull-right">Guardar</button>' +
			'<button id="removeProfile" type="button" class="btn btn btn-danger widthHalf pull-right">Eliminar</button>'
		);
		$('#removeProfile').click(function() {
			$.ajax({
				url: "classes/controllers/AjaxControllerHandler.php",
				type: "post",
				data: {
					action: "removeUser",
					controllerclass: 'UserController'
				}
			}).success(function(data) {
				var response = JSON.parse(data);

				switch (response.code) {
					case '202':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>El usuario fue removido.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
					case '409':
						$(this).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>El usuario no puede ser removido.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
					case '404':
						$(this).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>El usuario no existe.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
					default:
						$(this).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>Ocurrio un error inesperado.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
				}
				$("#acceptModalRemoveProfile").click(function(){
					$(this).closeModalCustom("#modalRemoveProfile");
					location.reload();
				});
			});
		});
		$('#changeProfile').click(function() {

			var userName = $('#nameInput').val();
			var lastName = $('#lastNameInput').val();
			var email = $('#inputEmail').val();
			var address = $('#guestAddress').val();
			var password= $('#guestPassword').val();

			var resultValue = $(this).validateForm($("#myProfileForm"));
			if (resultValue) {
				$.ajax({
				url: "classes/controllers/AjaxControllerHandler.php",
				type: "post",
				data: {
					action: "updateUser",
					controllerclass: 'UserController',
					userName : userName,
					lastName : lastName,
					email : email,
					address : address,
					password : password
				}
			}).success(function(data) {
				var response = JSON.parse(data);
				switch (response.code) {
					case '202':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>El usuario fue modificado.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						location.reload();
						break;
					case '304':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>Nada que modificar.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
					case '409':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>El usuario no puede ser modificado <br>debido a su perfil.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
					case '500':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<h2>Error al modificar.</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalRemoveProfile" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
				}
				$("#acceptModalRemoveProfile").click(function(){
					$(this).closeModalCustom("#modalRemoveProfile");
					location.reload();
				});
			});
			}
		});
		$("#closeModalRemoveProfile").click(function(){
			$(this).closeModalCustom("#modalRemoveProfile");
			location.reload();
		});
	});
});