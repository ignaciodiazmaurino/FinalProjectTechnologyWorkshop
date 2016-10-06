<?php
/**
* UserService interface.
*/
interface UserService {
	
	/**
	* Validate and store the user into the database.
	*/
	public function createUser($userName, $userLastName, $userEmail, $userAddress, $userPassword);

	/**
	* Remove the user by the id.
	*/
	public function removeUser($user);

	/**
	* Update user.
	*/
	public function updateUser($user, $newUser);

	/**
	* Get user.
	*/
	public function getUser($userName, $password);

}