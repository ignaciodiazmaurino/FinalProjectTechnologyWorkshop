<?php
/**
* The controller to manage the reservations.
*/

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/impl/ReservationServiceImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Reservation.php');

class ReservationController {

	private $reservationService;

	function __construct()
	{
		$this->setReservationService(new ReservationServiceImpl());
	}

	/**
	* Create reservation
	*/
	public function createReservation() {

		session_start();

		if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
			$user = $_SESSION['user'];
		} else {
			$user = "";
		}

		$name = $_POST['userName'];
		$lastName = $_POST['lastName'];
		$arrivalDate = $_POST['arrivalDate'];
		$departureDate = $_POST['departureDate'];
		$people = $_POST['people'];
		$cabinId = $_POST['cabinId'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$details = $_POST['details'];

		return $this->getReservationService()->createReservation($user, $name, $lastName, 
			$arrivalDate, $departureDate, $people, $cabinId, $address, $email, $details);

	}

	/**
	* Return all reservations
	*/
	public function getAllReservations() {

		$user = $_SESSION['user'];
		return $this->getReservationService()->getReservations($user);

	}
	public function getReservation () {

		$reservationId = $_POST['reservationId'];
		return $this->getReservationService()->getReservation($reservationId);

	}

	/**
	* Update reservation
	*/
	public function updateReservation() {

		session_start();
		$user = $_SESSION['user'];

		$reservationId = $_POST['reservationId'];
		$arrivalDate = $_POST['arrivalDate'];
		$departureDate = $_POST['departureDate'];

		return $this->getReservationService()->updateReservation($reservationId, $arrivalDate, $departureDate);
	}

	/**
	* Delete reservation
	*/
	public function cancelReservation() {

	}

	public function setReservationService($newReservationService) {
		$this->reservationService = $newReservationService;
	}

	public function getReservationService() {
		return $this->reservationService;
	}
}