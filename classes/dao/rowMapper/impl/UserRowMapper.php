<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Guest.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/RowMapper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/ReservationConstants.php');

/**
* Class to map the User returned from the backend.
*/
class UserRowMapper implements RowMapper {
	
	public function map($row) {

		$user = new Guest();
		$user->setEmail($row{'USER_EMAIL'});
		$user->setAddress($row{'USER_ADDRESS'});
		$user->setId($row{'USER_ID'});
		$user->setName($row{'USER_NAME'});
		$user->setLastName($row{'USER_LAST_NAME'});
		$user->setrole($row{'ROLE_NAME'});

		return $user;
	}
}