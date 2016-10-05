<?
/*
* Declare the interface Reservations Dao
*/
interface ReservationsDao {

	public function createReservation($data);

	public function getReservation($reservationId);

	public function getReservationGuest($reservationId, $userId);

	public function getReservations();

	public function updateReservation($reservationId, $arrivalDate, $departureDate, $status);

	public function deleteReservation($reservationId);

	public function getReservationsByUserId($userId);

}