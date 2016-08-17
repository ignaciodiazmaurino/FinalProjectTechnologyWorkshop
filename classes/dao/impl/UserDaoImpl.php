<?php
/*
* 
*/
require_once('../dao/UserDao.php');
require_once('../model/Guest.php');
require_once('../model/Admin.php');

class UserDaoImpl implements UserDao {

	//Temporary attribute
	private $users;

	//Temporary constructor method
	function __construct() {

		$adminUser = new Admin();
		$adminUser->setAdminId('12345');
		$adminUser->setName('Ignacio');
		$adminUser->setLastName('Diaz');
		$adminUser->setRole('admin');
		$adminUser->setPassword('sarasa');

		$guestUser = new Guest();
		$guestUser->setName('Pedrito');
		$guestUser->setLastName('Sarasa');
		$guestUser->setRole('guest');
		$guestUser->setPassword('sarasa');
		$guestUser->setEmail('ignaciodiazmaurino@hotmail.com');
		$guestUser->setAddress('calle falsa 123');
		$guestUser->setPhoneNumber('0221 234567');

		$usersArray = array();
		$usersArray['Ignacio'] = $adminUser;
		$usersArray['Pedrito'] = $guestUser;

		$this->users = $usersArray;

	}
	
	public function getUserFromBackend($userName, $password) {
		//TODO: this function has to be coded once the table has been created in the data base.
		return $this->returnUser($userName, $password);
	}

	//Temporal method
	private function returnUser($userName, $password) {

		
		$user = $this->users[$userName];

		if (is_null($user)) {
			error_log("usuario no se pudo recuperar del arreglo de usuarios");
			$error = array(

			);
			return null;
		} else {
			error_log("usuario distinto de null recuperado del arreglo de usuarios");
			if ($password == $user->getPassword()) {
				return $user;
			} else {
				return null;
			}
		}
	}
}