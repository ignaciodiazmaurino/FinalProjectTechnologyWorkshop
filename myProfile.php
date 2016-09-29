<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/ReservationConstants.php');

if (isset($_SESSION['user'])) {
	
	$user = $_SESSION['user'];
echo '
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h2 class="bottomLine">Mi perfil</h2>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<img src="images/bosque.jpg" class="img-responsive imageDisplayed" alt="Bosque">
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<form id="myProfileForm">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="nameInput">Nombre</label>
						<input readonly type="text" class="form-control" id="nameInput" value="'.$user->getName().'">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="nameInput">Apellido</label>
						<input readonly type="text" class="form-control" id="lastNameInput" value="'.$user->getLastName().'">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="inputEmail">Correo electrónico</label>
						<input readonly type="email" class="form-control" id="inputEmail" value="'.$user->getEmail().'">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestAddress">Dirección</label>
						<input readonly type="text" class="form-control" id="guestAddress" value="'.$user->getAddress().'">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestPassword">Contraseña</label>
						<input readonly type="text" class="form-control" id="guestPassword">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestPassword">Confirmar contraseña</label>
						<input readonly type="text" class="form-control" id="guestPassword">
					</div>
				</div>';
			if ($user->getRole() != ReservationConstants::ADMIN) {

echo			'<div  id="myProfileButtonSection" class="col-xs-12 col-sm-12 col-md-12">
					<button id="changeProfile" type="button" class="btn defaultButton widthHalf pull-right">Modificar</button>
				</div>';

			}
echo		'</div>
		</form>
	</div>
</div>';
} else {
	header('Location: index.php');
}
?>

<!-- popup confirm new reservation -->
<div id="modalRemoveProfile" class="modalBackGround">
	<div>
		<span id="closeModalRemoveProfile" class="close">X</span>
			<div id="modalMessage">
				
			</div>
	</div>
</div>