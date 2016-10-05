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

/*Para otros tipos de sentencias SQL, tales como INSERT, UPDATE, DELETE, DROP, etc, mysql_query()
 devuelve TRUE en caso de éxito o FALSE en caso de error.*/
	public function removeUser($user) {
		
		$response= array();
		$dao = $this->getDaoImpl();
		if ($user->getRole()== ReservationConstants::ADMIN) {
			$response['code'] = ReservationConstants::RESPONSE_409;
			$response['message'] = "The user can not be deleted";
		} else {
			$code = $dao->removeUser($user->getId());
			if($code) {
				$response['code'] = ReservationConstants::RESPONSE_202;
				$response['message'] = 'Deletion successfully';
				session_destroy();
			} else {
				$response['code'] = ReservationConstants::RESPONSE_404;
				$response['message'] = 'The user does not exists in the database';
			}
		}
		return $response;
	}

	public function updateUser($user, $newUser) {

		$response= array();
		$dao = $this->getDaoImpl();

		if ($user->getRole()== ReservationConstants::ADMIN) {
			$response['code'] = ReservationConstants::RESPONSE_409;
			$response['message'] = "The user can not be updated.";
		} else {
			if ( 
				$newUser->getName() == $user->getName() &&
				$newUser->getLastName() == $user->getLastName() &&
				$newUser->getEmail() == $user->getEmail() &&
				$newUser->getAddress() == $user->getAddress() &&
				$dao->checkPassword($user->getId(), $newUser->getPassword())
			) {
				$response['code'] = ReservationConstants::RESPONSE_304;
				$response['message'] = "Nothing to update.";
			} else {
				$code = $dao->modifyUser($newUser, $user->getId());
				if($code) {
					$response['code'] = ReservationConstants::RESPONSE_202;
					$response['message'] = 'Updated';
				} else {
					$response['code'] = ReservationConstants::RESPONSE_500;
					$response['message'] = 'Error trying to update.';
				}
			}
			
		}
		return $response;
	}

	public function getUser($userName, $password){
		error_log("-------------> service init");
		$response= array();
		$dao = $this->getDaoImpl();
		try {
			$user = $dao->getUserFromBackend($userName, $password);
			$response['code'] = ReservationConstants::RESPONSE_200;
			$response['message'] = 'Logged in';
			session_start();
			$_SESSION['user']=$user;
		} catch (Exception $e) {
			$response['code'] = ReservationConstants::RESPONSE_500;
			$response['message'] = 'Internal server error - '.$e->getMessage();
		}
		error_log(json_encode($user));
		error_log("-------------> service end");
		return json_encode($response);
	}

	public function setDaoImpl($newDaoImpl) {
		$this->daoImpl = $newDaoImpl;
	}

	public function getDaoImpl() {
		return $this->daoImpl;
	}
}