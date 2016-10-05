<?php
/*
* Login controller class
*/

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/impl/UserServiceImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/ReservationConstants.php');

class LoginController {

	private $service;

	function __construct()
	{
		$this->setService(new UserServiceImpl());
	}

	public function login() {

		$userName = $_POST['userName'];
		$password = $_POST['password'];

		$userService = $this->getService();

		if (empty($userName) || empty($password)) {
			$error = array(
				'error'=>'Usuario o password nulo',
				'code'=>'100'
			);
			return $error;
		}

		$response = $userService->getUser($userName, $password);
		/*if ($response['code'] == ReservationConstants::RESPONSE_200) {
			session_start();
			$_SESSION['user']=$user;
		}*/

		return $response;
		
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

	public function setService($newService) {
		$this->service = $newService;
	}

	public function getService() {
		return $this->service;
	}

}