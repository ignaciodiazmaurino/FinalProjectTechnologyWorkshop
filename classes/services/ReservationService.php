<?php
/**
* ReservationService interface.
*/
interface ReservationService {
	
	/**
	* Create the reservation and store it in the database.
	*/
	public function createReservation($user, $userName, $userLastName, $arribalDate, $departureDate, 
		$people, $cabinId, $userAddress, $userEmail, $details);

	/**
	* Returns the reservation based on the reservationId passed by parameter.
	*/
	public function getReservation($reservationId);

	/**
	* Returns all the reservations.
	*/
	public function getReservations($user);

	/**
	* Update reservation
	*/
	public function updateReservation($reservationId, $arrivalDate, $departureDate, $status);

}