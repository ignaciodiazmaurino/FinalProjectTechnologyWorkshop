<?
/**
* 
*/

require_once('../dao/ReservationsDao.php');
require_once('../model/Reservation.php');

class ReservationsDaoImpl implements ReservationsDao {

	public function createReservation($data) {
		$reservation = $data;
		error_log(
		$reservation->getReservationId().
		$reservation->getUser().
		$reservation->getArrivalDate().
		$reservation->getDepartureDate().
		$reservation->getNumberOfPeople().
		$reservation->getCabinId().
		$reservation->getAddress().
		$reservation->getEmailAddress().
		$reservation->getDetails()
		);

	}

	public function getReservation($reservationID) {

	}

	public function getReservations() {

	}

	public function updateReservation($data) {

	}

	public function deleteReservation($reservationID) {

	}

}