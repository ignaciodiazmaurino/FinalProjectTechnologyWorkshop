<?php
/**
* 
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/UserService.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/ReservationConstants.php');

class UserServiceImpl implements UserService {

	private $daoImpl;
	
	function __construct() {
		$this->setDaoImpl(new UserDaoImpl());
	}

	function createUser($userName, $userLastName, $userEmail, $userAddress, $userPassword) {

		$response= array();

		$dao = $this->getDaoImpl();
		if ($dao->userExists($userEmail)) {
			$response['code'] = ReservationConstants::RESPONSE_409;
			$response['message'] = 'The user already exists';
		} else {
			try {
				$dao->createUser($userName, $userLastName, $userEmail, $userAddress, $userPassword);
				$response['code'] = ReservationConstants::RESPONSE_201;
				$response['message'] = 'User created';
			} catch (Exception $e) {
				$response['code'] = ReservationConstants::RESPONSE_500;
				$response['message'] = 'server error';
			}
			
		}
		return $response;

	}

	public function setDaoImpl($newDaoImpl) {
		$this->daoImpl = $newDaoImpl;
	}

	public function getDaoImpl() {
		return $this->daoImpl;
	}
}