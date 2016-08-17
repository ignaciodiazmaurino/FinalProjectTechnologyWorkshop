<?php

require_once('classes/controllers/CabinsController.php');

$cabinsController = new CabinsController();

$cabins = $cabinsController->getCabins();

echo '
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h2 class="bottomLine">Hace tu reserva</h2>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<img src="images/beach.png" class="img-responsive imageDisplayed" alt="Playa">
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<form id="newReservationForm">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="nameInput">Nombre</label>
						<input type="text" class="form-control" id="nameInput">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="nameInput">Apellido</label>
						<input type="text" class="form-control" id="lastNameInput">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="arrivalDateIenput">Fecha de llegada</label>
						<input type="text" class="form-control" id="arrivalDateIenput">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="departureDateIenput">Fecha de partida</label>
						<input type="text" class="form-control" id="departureDateIenput">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3">
					<div class="form-group">
						<label for="numberOfPersons">Personas</label>
						<select id="peopleSelection" class="form-control"></select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-9 col-md-9">
					<div class="form-group">
						<label for="departureDateIenput">Cabaña</label>
						<select id="cabinDropdownMenu" class="form-control">';
						foreach ($cabins as $key => $cabin) {
							echo '<option value="'.$cabin->getId().'">'.$cabin->getName().'</option>';
						}
						echo '</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestAddress">Dirección</label>
						<input type="text" class="form-control" id="guestAddress">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="inputEmail">Correo electrónico</label>
						<input type="email" class="form-control" id="inputEmail">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestMessage">Detalles</label>
						<textarea type="textarea" class="form-control" id="guestMessage"></textarea>
					</div>
				</div>
				<div  class="col-xs-12 col-sm-12 col-md-12">
					<button id="submitReservation" type="submit" class="btn defaultButton centered widthHalf">Crear</button>	
				</div>
			</div>
		</form>
	</div>
</div>';
?>

<!-- popup confirm new reservation -->
<div id="modalNewReservation" class="modalBackGround">
	<div>
		<span id="closeModalNewReservation" class="close">X</span>
			<div id="modalMessage">
				
			</div>
	</div>
</div>