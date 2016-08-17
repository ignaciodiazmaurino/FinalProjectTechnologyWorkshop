<?php
/**
* The controller to manage the reservations.
*/

require_once('../dao/impl/ReservationsDaoImpl.php');
require_once('../model/Reservation.php');
class ReservationController {

	private $reservationDao;

	function __construct()
	{
		$this->setReservationDao(new ReservationsDaoImpl());
	}

	/**
	* Create reservation
	*/
	public function createReservation() {

		$reservationId = $this->getReservationId();
		$name = $_POST['userName'];
		$lastName = $_POST['lastName'];
		$arrivalDate = $_POST['arrivalDate'];
		$departureDate = $_POST['departureDate'];
		$people = $_POST['people'];
		$cabinId = $_POST['cabinId'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$details = $_POST['details'];

		$reservation = new Reservation();
		$reservation->setReservationId($reservationId);
		//$reservation->setUser($newUser);
		$reservation->setArrivalDate($arrivalDate);
		$reservation->setDepartureDate($departureDate);
		$reservation->setNumberOfPeople($people);
		$reservation->setCabinId($cabinId);
		$reservation->setAddress($address);
		$reservation->setEmailAddress($email);
		$reservation->setDetails($details);

		$this->getReservationDao()->createReservation($reservation);

	}

	/**
	* Read reservation
	*/
	public function getAllReservations() {

	}
	public function getReservation () {
		$reservationId;
	}

	/**
	* Update reservation
	*/
	public function updateReservation() {
		
	}

	/**
	* Delete reservation
	*/
	public function deleteReservation() {

	}

	/**
	* return the possible number of people.
	*/
	public function getPeople() {

	}

	private function getReservationId() {
		//TODO: recuperar el ultimo id de la base de datos y devolver el siguiente, haciendolo autoincremental
		return rand(1, 9999);
	}


	public function setReservationDao($newReservationDao) {
		$this->reservationDao = $newReservationDao;
	}

	public function getReservationDao() {
		return $this->reservationDao;
	}
}