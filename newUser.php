<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h2 class="bottomLine">Crea tu usuario</h2>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<img src="images/bosque.jpg" class="img-responsive imageDisplayed" alt="Playa">
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<form id="newUserForm">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="nameInput">Nombre</label>
						<input type="text" class="form-control" id="nameInput">
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<label for="lastNameInput">Apellido</label>
						<input type="text" class="form-control" id="lastNameInput">
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
						<label for="guestAddress">Dirección</label>
						<input type="text" class="form-control" id="guestAddress">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestPassword">Contraseña</label>
						<input type="password" class="form-control" id="guestPassword">
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<label for="guestPasswordToValidate">Confirmar contraseña</label>
						<input type="password" class="form-control" id="guestPasswordToValidate">
					</div>
				</div>
				<div  class="col-xs-12 col-sm-12 col-md-12">
					<button id="submitUser" type="submit" class="btn defaultButton widthHalf pull-right">Crear</button>	
				</div>
			</div>
		</form>
	</div>
</div>

<!-- new user confirmation popup -->
<div id="modalNewUserConfirmation" class="modalBackGround">
	<div>
		<span id="closeModalNewUser" class="close">X</span>
			<div id="modalMessage">
				
			</div>
	</div>
</div>