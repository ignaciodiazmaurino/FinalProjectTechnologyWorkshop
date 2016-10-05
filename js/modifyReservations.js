$(".containerMainSection").addClass("minHeight");
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
													'<input type="text" class="form-control" id="arrivalDateIenput" value="' + reservationData.reservation.arrivalDate + '">' +
												'</div>' +
											'</div>' +
											'<div class="col-xs-12 col-sm-6 col-md-6">' +
												'<div class="form-group">' +
													'<label for="departureDateIenput">Fecha de partida</label>' +
													'<input type="text" class="form-control" id="departureDateIenput" value="' + reservationData.reservation.departureDate + '">' +
												'</div>' +
											'</div>' +
										'</div>' +
										'<div class="row">' +
											'<div class="col-xs-12 col-sm-12 col-md-12">' +
												'<div class="form-group">' +
													'<select class="form-control" id="statusList">' +
														'<option>ON_HOLD</option>' +
														'<option>CANCELED</option>' +
													'</select>' +
												'</div>' +
											'</div>' +
										'</div>' +
									'</div>' +
								'</form>' +
							'</div>' +
							'<div class="row">' +
								'<div  class="col-xs-12 col-sm-12 col-md-12">' +
									'<button id="submitModification" type="submit" class="btn defaultButton centered widthHalf">Guardar cambios</button>' +
								'</div>' +
							'</div>'
						);
						if (reservationData.guest.role === 'ADMINISTRATOR') {
							$('#statusList').append('<option>CONFIRMED</option>');
						}
						
						$("select option").filter(function() {
							return $(this).text() == reservationData.guest.role; 
							}).prop('selected', true);
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
									var status = $("#statusList").find(":selected").text();
									$.ajax(
										{
											url: "classes/controllers/AjaxControllerHandler.php",
											type: "post",
											data: {
												action: "updateReservation",
												controllerclass: 'ReservationController',
												reservationId: reservationId,
												arrivalDate: arrivalDate,
												departureDate: departureDate,
												status: status
											}
										}
									).success(function(data) {
										var response = JSON.parse(data);
										switch (response.code) {
											case '202':
												$(document).openModalCustom("#modalModifyReservationResult");
												$('#modalConfirmation').append('<h2>Reserva modificada.</h2>');
												$('#modalConfirmation').append('<p>' + response.code + " - " + response.message + '</p>');
												$('#modalConfirmation').append('<button id="acceptModalModifyReservation" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
												break;
											case '304':
												$(document).openModalCustom("#modalModifyReservationResult");
												$('#modalConfirmation').append('<h2>Nada para modificar.</h2>');
												$('#modalConfirmation').append('<p>' + response.code + " - " + response.message + '</p>');
												$('#modalConfirmation').append('<button id="acceptModalModifyReservation" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
												break;
											default:
												$(document).openModalCustom("#modalModifyReservationResult");
												$('#modalConfirmation').append('<h2>Error al intentar guardar los datos</h2>');
												$('#modalConfirmation').append('<p>' + response.code + " - " + response.message + '</p>');
												$('#modalConfirmation').append('<button id="acceptModalModifyReservation" type="submit" class="btn defaultButton centered widthHalf">Aceptar</button>');
												break;
										}
										$("#acceptModalModifyReservation").click(function(){
											$(this).closeModalCustom("#modalModifyReservation");
											location.reload();
										});
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