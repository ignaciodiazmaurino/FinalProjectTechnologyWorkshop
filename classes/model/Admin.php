<?php

/**
* Abstract class to work with data of a Person.
*/
require_once('Person.php');

class Admin extends Person implements JsonSerializable {

	private $adminId;

	public function setAdminId($newAdminId) {
		$this->adminId = $newAdminId;
	}
	public function getAdminId() {
		return $this->adminId;
	}

	public function JsonSerialize() {
        $vars = get_object_vars($this);
        unset($vars['password']);

        return $vars;
    }

}