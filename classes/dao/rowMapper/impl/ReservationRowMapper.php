<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Reservation.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/RowMapper.php');

/**
* Class to map the reservations returned from the backend.
*/
class ReservationRowMapper implements RowMapper
{
	
	public function map($row) {

		$reservation = new Reservation();

		$reservation->setReservationId($row{'RESERVATION_ID'});
		$reservation->setGuestId($row{'RESERVATION_GUEST_ID'});
		$reservation->setUserId($row{'RESERVATION_USER_ID'});
		$reservation->setCabinId($row{'RESERVATION_CABIN_ID'});
		$reservation->setArrivalDate($row{'RESERVATION_ARRIVAL_DATE'});
		$reservation->setDepartureDate($row{'RESERVATION_DEPARTURE_DATE'});
		$reservation->setStatus($row{'RESERVATION_STATE'});
		$reservation->setEmailAddress($row{'RESERVATION_GUEST_EMAIL'});
		$reservation->setAddress($row{'RESERVATION_GUEST_ADDRESS'});
		$reservation->setNumberOfPeople($row{'RESERVATION_QUANTITY'});
		$reservation->setDetails($row{'RESERVATION_DETAILS'});

		return $reservation;
	}
	
}