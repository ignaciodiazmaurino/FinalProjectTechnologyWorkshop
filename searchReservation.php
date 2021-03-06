<?php

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<img src="images/cabin1.jpg" class="img-responsive" alt="Cabaña">
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<form class="form-inline">
			<div class="form-group">
				 <label for="searchReservationInput">Número de reserva</label>
				 <input type="text" class="form-control" id="searchReservationInput" placeholder="ej: 0001">
			</div>
			<button id="findReservationId" type="submit" class="btn defaultButton">Buscar</button>
			<div id="findError" class="errorMessage"></div>
			<div id="reservationResults">
			</div>
		</form>
	</div>
</div>