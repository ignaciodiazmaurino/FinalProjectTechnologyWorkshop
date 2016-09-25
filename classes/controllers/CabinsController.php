<?php
/*
* Login controller class
*/

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/impl/CabinsServiceImpl.php');

class CabinsController {

	private $service;

	function __construct() {
		$this->setService(new CabinsServiceImpl());
	}

	/**
	* Returns all cabins.
	*/
	public function getCabins() {
		return $this->getService()->getCabins();
	}
	/**
	* Return the cabin based on its id.
	*/
	public function getCabinById() {
		$cabinId = $_POST['cabinId'];
		$cabin = $this->getService()->getCabinById($cabinId);
		return json_encode($cabin);
	}

	public function setService($newService) {
		$this->service = $newService;
	}
	public function getService() {
		return $this->service;
	}

}