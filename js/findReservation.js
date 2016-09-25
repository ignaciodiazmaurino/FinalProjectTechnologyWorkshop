$(document).ready(function(){
	$("#findReservationId").click(
		function(event){
			$("#reservationResults").empty();
			event.preventDefault();
			var reservationId = $("#searchReservationInput").val();
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
			)
			.success(
				function(data) {
					var response = JSON.parse(data);
					switch (response.code) {
						case '200':
							$('#reservationResults').append(
								'<div class="row">' + 
									'<h3 class="bottomLine">Datos de la reserva</h3>' +
									'<div class="col-xs-12 col-sm-12 col-md-12">' +
										'<table class="table">' +
											'<thead>' +
												'<tr>' +
													'<th>Fecha ingreso</th>' +
													'<th>Fecha salida</th>' +
													'<th>Estado</th>' +
												'</tr>' +
											'</thead>' +
											'<tbody>' +
												'<tr>' +
													'<td>'+ response.reservation.arrivalDate +'</td>' +
													'<td>'+ response.reservation.departureDate +'</td>' +
													'<td>'+ response.reservation.status +'</td>' +
												'</tr>' +
											'<tbody>' +
										'</table>' +
									'</div>' +
								'</div>'
							);
							$('#reservationResults').append(
								'<div class="row">' + 
									'<h3 class="bottomLine">Datos del huesped</h3>' +
									'<div class="col-xs-12 col-sm-12 col-md-12">' +
										'<table class="table">' +
											'<thead>' +
												'<tr>' +
													'<th>Nombre</th>' +
													'<th>Apellido</th>' +
												'</tr>' +
											'</thead>' +
											'<tbody>' +
												'<tr>' +
													'<td>'+ response.guest.name +'</td>' +
													'<td>'+ response.guest.lastName +'</td>' +
												'</tr>' +
											'<tbody>' +
										'</table>' +
									'</div>' +
								'</div>'
							);
							$('#reservationResults').append(
								'<div class="row">' + 
									'<h3 class="bottomLine">Datos de la cabaña</h3>' +
									'<div class="col-xs-12 col-sm-12 col-md-12">' +
										'<h4>'+ response.cabin.name +'</h4>' + '<br>' +
										'<p>' + response.cabin.description + '</p>' +
									'</div>' +
								'</div>'
							);
							break;
						case '404':
							$('#reservationResults').append(
								'<div class="row">' + 
									'<h3 class="bottomLine">Datos de la cabaña</h3>' +
									'<div class="col-xs-12 col-sm-12 col-md-12">' +
										'<h4>'+ 'Reserva no encontrada' +'</h4>' + '<br>' +
										'<p>' + response.message + '</p>' +
									'</div>' +
								'</div>'
							);
							break;
						default:
							$('#reservationResults').append(
								'<div class="row">' + 
									'<h3 class="bottomLine">Datos de la cabaña</h3>' +
									'<div class="col-xs-12 col-sm-12 col-md-12">' +
										'<h4>'+ 'Error inesperado' +'</h4>' + '<br>' +
										'<p>' + 'Ocurrio un error inesperado tratando ' +
											'de buscar la reserva. Intente más tarde.' + 
										'</p>' +
									'</div>' +
								'</div>'
							);
							break;
					}
				}
			)
			.fail(
				function() {
					$('#reservationResults').append(
						'<div class="row">' + 
							'<h3 class="bottomLine">Datos de la cabaña</h3>' +
							'<div class="col-xs-12 col-sm-12 col-md-12">' +
								'<h4>Error al tratar de buscar la reserva</h4>' +
							'</div>' +
						'</div>'
					);
				}
			);
		});
});