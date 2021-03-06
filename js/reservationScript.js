$(document).ready(function(event){

	internalFunctions = {
		getCabinById : function() {
			var cabinId = $('#cabinDropdownMenu option:selected').val();
			$.ajax({
				url: "classes/controllers/AjaxControllerHandler.php",
				type: "post",
				data: {
					action: "getCabinById",
					controllerclass: 'CabinsController',
					cabinId: cabinId
				}
			}).success(
				function(response) {
					$('#peopleSelection').find('option').remove();
					cabin = JSON.parse(response);
					for (var i = 1 ; i <= cabin.maxPeople; i++) {
						$('#peopleSelection').append($('<option>', { value : i }).text(i));
					};
				}
			).fail(function(jqXHR, textStatus, errorThrown){
				$(this).getHttpError(jqXHR, textStatus, errorThrown);
				return false;
			});
		},
		createReservation : function() {

			var userName = $('#nameInput').val();
			var lastName = $('#lastNameInput').val();
			var arrivalDate = $('#arrivalDateIenput').val();
			var departureDate = $('#departureDateIenput').val();
			var people = $('#peopleSelection option:selected').val();
			var cabinId = $('#cabinDropdownMenu option:selected').val();
			var address = $('#guestAddress').val();
			var email = $('#inputEmail').val();
			var details = $('#guestMessage').val();

			$.ajax({
				url: "classes/controllers/AjaxControllerHandler.php",
				type: "post",
				data: {
					action: "createReservation",
					controllerclass: 'ReservationController',
					userName: userName,
					lastName: lastName,
					arrivalDate: arrivalDate,
					departureDate: departureDate,
					people: people,
					cabinId: cabinId,
					address: address,
					email: email,
					details: details
				}
			}).success(function(data) {
				var response = JSON.parse(data);
				switch (response.code) {
					case '201':
						$(this).openModalCustom("#modalNewReservation");
						$('#modalMessage').append('<h2>La reserva se creo correctamente</h2>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalNewReservation" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
					case '407':
						$(this).openModalCustom("#modalNewReservation");
						$('#modalMessage').append('<p>Para poder hacer una reserva,<br>el usuario debe estar logeado</p>');
						$('#modalMessage').append('<p>' + response.code + " - " + response.message + '</p>');
						$('#modalMessage').append('<button id="acceptModalNewReservation" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
						break;
				}
				$("#acceptModalNewReservation").click(function(){
					$(this).closeModalCustom("#modalNewReservation");
					location.reload();
				});
			}).fail(function(){
				$(this).openModalCustom("#modalNewReservation");
				$('#modalMessage').append('<p>Hubo un problema al realizar la solicitud. Por favor intente más tarde</p>');
				$("#acceptModalNewReservation").click(function(){
					$(this).closeModalCustom("#modalNewReservation");
					location.reload();
				});
			});
			return false;
		}
	}

	$("#closeModalNewReservation").click(function(){
		$(this).closeModalCustom("#modalNewReservation");
		var url = "index.php?page=mainPage";
		$(location).attr('href',url);
	});

	internalFunctions.getCabinById();

	$('#cabinDropdownMenu').click(function(){
		internalFunctions.getCabinById();
	});
	$("#submitReservation").click(function(event){
		//TODO: Validar password e email.
		var resultValue = $(this).validateForm($("#newReservationForm"));
		if (resultValue) {
			event.preventDefault();
			internalFunctions.createReservation();
			return false;
		} else {
			return false;
		}
	});
});