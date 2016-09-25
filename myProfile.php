<?php

if (!isset($_SESSION['user'])) {
	header('Location: index.php');
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h2 class="bottomLine">Mi perfil</h2>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<img src="images/bosque.jpg" class="img-responsive imageDisplayed" alt="Bosque">
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<form>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="nameInput">Nombre</label>
						<input readonly type="text" class="form-control" id="nameInput" value="Ignacio">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="nameInput">Apellido</label>
						<input readonly type="text" class="form-control" id="lastNameInput" value="Diaz">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="inputEmail">Correo electrónico</label>
						<input readonly type="email" class="form-control" id="inputEmail" value="ignaciomiguel.diaz@ucalpvirtual.edu.ar">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestAddress">Dirección</label>
						<input readonly type="text" class="form-control" id="guestAddress" value="calle falsa #123">
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
				</div>
				<div  class="col-xs-12 col-sm-12 col-md-12">
					<button id="changeProfile" type="submit" class="btn defaultButton widthHalf pull-right">Modificar</button>	
				</div>
			</div>
		</form>
	</div>
</div>