<?php
/*
* Declare the interface UsuarioDao
*/
interface UserDao {
	
	/**
	* Returns the user from the backend based on the userName and the password.
	*/
	public function getUserFromBackend($userName, $password);

	/**
	* Add the user into the database.
	*/
	public function createUser($userName, $userLastName, $userEmail, $userAddress, $userPassword);

	/**
	* Update the data related to the user.
	*/
	public function modifyUser($user, $userId);

	/**
	* Returns true if the user exists based on the username and password.
	*/
	public function userExists($userEmail);

	/**
	* Returns the id of the user based on its email.
	*/
	public function getGuestId($userEmail);

	/**
	* Returns the id of the user based on its id.
	*/
	public function getUserById($userId);

	/**
	* Remove a user based on the id pased by parameter.
	*/
	public function removeUser($userId);

	/**
	* Check if the password is the same than this one stored in the database.
	*/
	public function checkPassword($userId, $password);

}