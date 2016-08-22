<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/RowMapper.php');

/**
* Class to map the cabins returned from the backend.
*/
class AmenityRowMapper implements RowMapper
{
	
	public function map($row) {
		$amenity = $row{'AMENITY_TEXT'};	
		return $amenity;
	}
	
}