<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/impl/UserServiceImpl.php');

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

	public function setUserService($newService) {
		$this->service = $newService;
	}

	public function getUserService() {
		return $this->service;
	}
}