<?php
/*
* Declare the interface UsuarioDao
*/
interface UserDao {
	
	public function getUserFromBackend($userName, $password);

}