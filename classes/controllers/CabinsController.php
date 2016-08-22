<?php
/*
* Login controller class
*/

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/impl/CabinsDaoImpl.php');

class CabinsController {

	private $dao;

	function __construct() {
		$this->setDao(new CabinsDaoImpl());
	}

	/**
	* Return all cabins
	*/
	public function getCabins() {
		return $this->getDao()->getCabinsFromBackend();
	}
	public function getCabinById() {
		$cabinId = $_POST['cabinId'];
		$cabin = $this->getDao()->getCAbinFromBackendById($cabinId);
		return json_encode($cabin);
	}

	public function setDao($newDao) {
		$this->dao = $newDao;
	}
	public function getDao() {
		return $this->dao;
	}

}