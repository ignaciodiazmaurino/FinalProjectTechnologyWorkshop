<?php
/*
* Declare the interface UsuarioDao
*/
interface UserDao {
	
	public function getUserFromBackend($userName, $password);

	public function createUser();

	public function modifyUser($userId);

}