<?php

/**
* Abstract class to work with data of a Person.
*/
require_once('Person.php');

class Guest extends Person implements JsonSerializable {

	private $email;
	private $address;
	private $phoneNumber;

	public function setEmail($newEmail) {
		$this->email = $newEmail;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setAddress($newAddress) {
		$this->address = $newAddress;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setPhoneNumber($newPhoneNumber) {
		$this->phoneNumber = $newPhoneNumber;
	}

	public function JsonSerialize()
    {
        $vars = get_object_vars($this);
        unset($vars['password']);
        
        return $vars;
    }

}