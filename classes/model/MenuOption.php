<?php
/**
* Data to construct menu options.
*/
class MenuOption {

	private $optionId;
	private $optionTextValue;
	private $userRole;

	public function setOptionId($newOptionId) {
		$this->optionId = $newOptionId;
	}

	public function getOptionId() {
		return $this->optionId;
	}

	public function setOptionTextValue($newOptionTextValue) {
		$this->optionTextValue = $newOptionTextValue;
	}

	public function getOptionTextValue() {
		return $this->optionTextValue;
	}

	public function setUserRole($neUserRole) {
		$this->userRole = $neUserRole;
	}

	public function getUserRole() {
		return $this->userRole;
	}

}