<?
/*
* Declare the interface Reservations Dao
*/
interface ReservationsDao {

	/**
	* Store a new reservation in the data base.
	*/
	public function createReservation($data);

	/**
	* Return a reservation by its ID.
	*/
	public function getReservation($reservationId);

	/**
	* Return a reservation by its ID and the ID of the user.
	*/
	public function getReservationGuest($reservationId, $userId);

	/**
	* Return all the reservations.
	*/
	public function getReservations();

	/**
	* Update the data of a reservation.
	*/
	public function updateReservation($reservationId, $arrivalDate, $departureDate, $status);

	/**
	* Remove a reservation from the database.
	*/
	public function deleteReservation($reservationId);

	/**
	* Remove a reservation from the database.
	*/
	public function getReservationsByUserId($userId);

}