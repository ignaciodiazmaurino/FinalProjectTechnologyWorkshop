<?php

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h2 class="bottomLine">Reservas</h2>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
<?php
		require_once('classes/controllers/ReservationController.php');
		require_once('classes/util/ReservationConstants.php');

		$controller = new ReservationController();

		$response = $controller->getAllReservations();

		if ($response['code'] == ReservationConstants::RESPONSE_204) {
			echo '<h3>No fueron encontradas reservas</h3>';
		} else {
			echo '
				<table class="table">
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th>Cabaña</th>
							<th>Fecha de arribo</th>
							<th>Fecha salida</th>
							<th>Id reserva</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody>';
			foreach ($response['reservations'] as $key => $reservation) {
				$cabin = $response['cabins'][$reservation->getCabinId()];

			echo 		'<tr>';
			echo 			'<td>
								<img src="'.$cabin->getThumbnail()->getPath().
								'" class="img-responsive imageDisplayed" alt="'.
								$cabin->getThumbnail()->getAlternateText().'">
							</td>';
			echo 		   '<td>'.$cabin->getName().'</td>';
			echo 		   '<td>'.$reservation->getArrivalDate().'</td>';
			echo 		   '<td>'.$reservation->getDepartureDate().'</td>';
			echo 		   '<td>'.$reservation->getReservationId().'</td>';
			echo 		   '<td>'.$reservation->getStatus().'</td>';
			echo 		'</tr>';
			}
			echo	'</tbody>
				</table>
			';
		}

?>
		</div>
	</div>			
</div>