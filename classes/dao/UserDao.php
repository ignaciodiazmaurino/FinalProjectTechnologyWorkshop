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
	public function modifyUser($userId, $userName, $userLastName, $userEmail, $userAddress, $userPassword);

	/**
	* Returns true if the user exists based on the username and password.
	*/
	public function userExists($userEmail);

}