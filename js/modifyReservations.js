$(document).ready(function(){
	$(".btnModClass").click(function(){
		var reservationId = $(this).attr('name');
		$.ajax(
			{
				url: "classes/controllers/AjaxControllerHandler.php",
				type: "post",
				data: {
					action: "getReservation",
					controllerclass: 'ReservationController',
					reservationId: reservationId
				}
			}
		).success(
			function(data) {
				alert(data);
				var reservationData = JSON.parse(data);
				switch (reservationData.code) {
					case '200':
						$("#modalMessageModify").append(
							'<div class="row">' +
								'<form id="modifyReservationForm">' +
									'<div class="col-xs-12 col-sm-12 col-md-12">' +
										'<h2 class="bottomLine">Modificar reserva <span id="idSpanReservation">'+ reservationData.reservation.reservationId +'</span></h2>' +
										'<div class="row">' +
											'<div class="col-xs-12 col-sm-6 col-md-6">' +
												'<div class="form-group">' +
													'<label for="arrivalDateIenput">Fecha de llegada</label>' +
													'<input type="text" class="form-control" id="arrivalDateIenput">' +
												'</div>' +
											'</div>' +
											'<div class="col-xs-12 col-sm-6 col-md-6">' +
												'<div class="form-group">' +
													'<label for="departureDateIenput">Fecha de partida</label>' +
													'<input type="text" class="form-control" id="departureDateIenput">' +
												'</div>' +
											'</div>' +
										'</div>' +
									'</div>' +
								'</div>' +
							'</div>' +
							'<div class="row">' +
								'<div  class="col-xs-12 col-sm-12 col-md-12">' +
									'<button id="submitModification" type="submit" class="btn defaultButton centered widthHalf">Guardar cambios</button>' +
								'</div>' +
							'</div>'
						);
						$(this).openModalCustom("#modalModifyReservation");
						$("#arrivalDateIenput").datepicker();
						$("#departureDateIenput").datepicker();
						$("#submitModification").click(
							function(){
								var resultValidation = $(this).validateForm($("#modifyReservationForm"));

								if(resultValidation) {
									var arrivalDate = $('#arrivalDateIenput').val();
									var departureDate = $('#departureDateIenput').val();
									var reservationId = $('#idSpanReservation').text();
									$.ajax(
										{
											url: "classes/controllers/AjaxControllerHandler.php",
											type: "post",
											data: {
												action: "updateReservation",
												controllerclass: 'ReservationController',
												reservationId: reservationId,
												arrivalDate: arrivalDate,
												departureDate: departureDate
											}
										}
									).success(function(data) {
										var response = JSON.parse(data);
										switch (response.code) {
											case '202':
												$(document).openModalCustom("#modalModifyReservationResult");
												$('#modalConfirmation').append('<p>Reserva modificada.</p>');
												break;
											default:
												$(document).openModalCustom("#modalModifyReservationResult");
												$('#modalConfirmation').append('<p>Error al intentar guardar los datos</p>');
												break;
										}
									});
								}
							}
						);
						break;
				}
			}
		);
	});
	$("#closeModalModifyReservation").click(function(){
		$(this).closeModalCustom("#modalModifyReservation");
		location.reload();
	});
	$("#closeModalModifyReservationResult").click(function(){
		$(this).closeModalCustom("#modalModifyReservationResult");
		location.reload();
	});
});