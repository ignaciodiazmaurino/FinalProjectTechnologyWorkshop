<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/impl/UserServiceImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/controllers/LoginController.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Guest.php');
/**
* User controller class
*/
class UserController {

	private $userService;
	
	function __construct() {
		$this->setUserService(new UserServiceImpl());
	}

	public function createUser() {

		$service = $this->getUserService();

		$userName = $_POST['userName'];
		$userLastName = $_POST['userLastName'];
		$userEmail = $_POST['userEmail'];
		$userAddress = $_POST['userAddress'];
		$userPassword = $_POST['userPassword'];

		$response = $service->createUser($userName, $userLastName, $userEmail, $userAddress, $userPassword);

		return json_encode($response);

	}
	public function removeUser() {
		session_start();
		$user = $_SESSION['user'];
		$response = $this->getUserService()->removeUser($user);
		return json_encode($response);
	}

	public function updateUser() {

		session_start();
		$user = $_SESSION['user'];

		$newUser = new Guest();
		$newUser->setName($_POST['userName']);
		$newUser->setLastName($_POST['lastName']);
		$newUser->setEmail($_POST['email']);
		$newUser->setAddress($_POST['address']);
		$newUser->setPassword($_POST['password']);

		$response = $this->getUserService()->updateUser($user, $newUser);
		return json_encode($response);
	}

	public function setUserService($newService) {
		$response = $this->service = $newService;
	}

	public function getUserService() {
		return $this->service;
	}
}