<?php

/**
* Abstract class to work with data of a Person.
*/
abstract class Person implements JsonSerializable{

	protected $name;
	protected $lastName;
	protected $role;
	protected $password;

	public function setName($newName) {
		$this->name = $newName;
	}

	public function getName() {
		return $this->name;
	}

	public function setLastName($newLastName) {
		$this->lastName = $newLastName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setRole($newRole) {
		$this->role = $newRole;
	}

	public function getRole() {
		return $this->role;
	}

	public function setPassword($newPassword) {
		$this->password = $newPassword;
	}

	public function getPassword() {
		return $this->password;
	}
}