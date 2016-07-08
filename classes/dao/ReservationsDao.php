<?
/*
* Declare the interface Reservations Dao
*/
interface ReservationsDao {

	public function createReservation($data);

	public function getReservation($reservationID);

	public function updateReservation($data);

	public function deleteReservation($reservationID);

}