<header>
	<div class="container-full row">
		<!-- Logo header -->
		<div id="headerLogo" class="col-sm-6 col-md-2">
			<img src="images/logoHeader.png" class="img-responsive" alt="logo">
		</div>

		<!-- Title header -->
		<div id="headerCentralSection" class="col-xs-12 col-sm-6 col-md-8 text-centered"><h1>Establecimiento <strong>La Cabaña</strong></h1></div>

		<!-- Login header-->
		<div id="headerLoginSection" class="col-xs-12 col-sm-6 col-md-2">
			<div id="login" class="headerlogin text-centered">

			<?php
			if (isset($_SESSION['user'])) {

				$user=$_SESSION['user'];
				echo '<span id="idRegistrarse">';
				echo $user->getName();
				echo '</span> | <span id="idEntrar">Salir</span>';
			
			} else {
				echo '<span id="idRegistrarse">Registrarse</span> | <span id="idEntrar">Entrar</span>';
			}
			?>
				
			</div>
		</div>
	</div>
</header>

<!-- popup login -->
<div id="modalLogin" class="modalBackGround">
	<div>
		<span id="closeLogin" class="close">X</span>
		<form>
			<div class="form-group">
				<label for="userLoginForm">Usuario</label>
				<input type="text" class="form-control" id="userLoginForm" placeholder="Usuario">
				<div id="userError" class="errorMessage"></div>
			</div>
			<div class="form-group">
				<label for="passwordLoginForm">Contraseña</label>
				<input type="password" class="form-control" id="passwordLoginForm" placeholder="Contraseña">
				<div id="passError" class="errorMessage"></div>
			</div>
			<div  class="form-group">
				<button id="submitLogin" type="submit" class="btn defaultButton widthAll">Entrar</button>
			</div>
		</form>
	</div>
</div>