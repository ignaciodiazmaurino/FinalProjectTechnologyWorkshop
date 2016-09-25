<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Cabin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/RowMapper.php');

/**
* Class to map the cabins returned from the backend.
*/
class CabinRowMapper implements RowMapper
{
	
	public function map($row) {
		$cabin = new Cabin();
		$cabin->setId($row{'CABIN_ID'});
		$cabin->setName($row{'CABIN_NAME'});
		$cabin->setDescription($row{'CABIN_DESCRIPTION'});
		$cabin->setMaxPeople($row{'CABIN_MAX_OCCUPANCY'});
		return $cabin;
	}
	
}