<?php
/*
* Login controller class
*/

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/impl/UserDaoImpl.php');

class LoginController {

	private $daoImpl;

	function __construct()
	{
		$this->setDaoImpl(new UserDaoImpl());
	}

	public function login() {

		$userName = $_POST['userName'];
		$password = $_POST['password'];

		$dao = $this->getDaoImpl();

		if (empty($userName) || empty($password)) {
			$error = array(
				'error'=>'Usuario o password nulo',
				'code'=>'100'
			);
			return $error;
		}

		$response = $dao->getUserFromBackend($userName, $password);
		
		if (!is_array($response)) {
			session_start();
			error_log("Antes de setear usuario en sesion");
			$_SESSION['user']=$response;
			error_log($_SESSION['user']->getName());
			error_log("Despues de haber seteado el usuario en la sesion");
		}

		return json_encode($response);
		
	}

	public function logout() {

		// Initialize the session.
		session_start();

		// Unset all of the session variables.
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
			);
		}

		// Finally, destroy the session.
		session_destroy();

	}

	public function setDaoImpl($newDaoImpl) {
		$this->daoImpl = $newDaoImpl;
	}

	public function getDaoImpl() {
		return $this->daoImpl;
	}

}