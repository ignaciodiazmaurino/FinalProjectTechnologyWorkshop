<?php
/**
* UserService interface.
*/
interface UserService {
	
	/**
	* Validate and store the user into the database.
	*/
	function createUser($userName, $userLastName, $userEmail, $userAddress, $userPassword);

}