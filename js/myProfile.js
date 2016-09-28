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
						$('#modalMessage').append('<p>El usuario fue removido.</p>');
						break;
					case '409':
						$(this).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<p>El usuario no puede ser removido.</p>');
						break;
					case '404':
						$(this).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<p>El usuario no existe.</p>');
						break;
					default:
						$(this).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<p>Ocurrio un error inesperado.</p>');
						break;
				}
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
						$('#modalMessage').append('<p>El usuario fue modificado.</p>');
						location.reload();
						break;
					case '304':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<p>Nada que modificar.</p>');
						break;
					case '409':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<p>El usuario no puede ser modificado <br>debido a su perfil.</p>');
						break;
					case '500':
						$(document).openModalCustom("#modalRemoveProfile");
						$('#modalMessage').append('<p>Error al modificar.</p>');
						break;
				}
			});
			}
		});
		$("#closeModalRemoveProfile").click(function(){
			$(this).closeModalCustom("#modalRemoveProfile");
			location.reload();
		});
	});
});