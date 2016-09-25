<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/impl/CabinsDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/CabinsService.php');
/**
* This is the service that have the logic to work with cabins
*/
class CabinsServiceImpl implements CabinsService {
	
	private $dao;

	function __construct() {
		$this->setDao(new CabinsDaoImpl());
	}

	/**
	* Return the cabin based on its id.
	*/
	public function getCabinById($cabinId) {
		return $this->getDao()->getCabinFromBackendById($cabinId);
	}

	/**
	* Return all cabins.
	*/
	public function getCabins() {
		$cabins = $this->getDao()->getCabinsFromBackend();
		return $cabins;
	}

	public function setDao($newDao) {
		$this->dao = $newDao;
	}
	public function getDao() {
		return $this->dao;
	}
}