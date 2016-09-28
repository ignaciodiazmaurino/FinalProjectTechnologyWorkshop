<?php
/**
* Service that have the logic to work with reservations
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/impl/ReservationsDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/impl/CabinsDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/impl/UserDaoImpl.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Reservation.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/services/ReservationService.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/ReservationConstants.php');

class ReservationServiceImpl implements ReservationService {

	private $dao;
	private $userDao;
	private $cabinDao;

	function __construct()
	{
		$this->setDao(new ReservationsDaoImpl());
		$this->setUserDao(new UserDaoImpl());
		$this->setCabinDao(new CabinsDaoImpl());
	}

	public function createReservation($user, $userName, $userLastName, $arribalDate, $departureDate, 
		$people, $cabinId, $userAddress, $userEmail, $details) {

		$response= array();

		if ($user == "") {
			error_log("User not logged in");
			$response['code'] = ReservationConstants::RESPONSE_407;
			$response['message'] = 'User must be authenticated';
		} else {
			error_log("User Exists");
			//If the email of the reservation exists as a user email, then the reservation is
			//assigned to this user. If not, the reservation is assigned to the user logged.
			if($this->getUserDao()->userExists($userEmail)) {
				$guestId = $this->getUserDao()->getGuestId($userEmail);
			} else {
				$guestId = $user->getId();
			}

			$reservation = new Reservation();
			$reservation->setGuestId($guestId);
			$reservation->setUserId($user->getId());
			$reservation->setCabinId($cabinId);
			$reservation->setArrivalDate(date('Y-m-d', strtotime($arribalDate)));
			$reservation->setDepartureDate(date('Y-m-d', strtotime($departureDate)));
			$reservation->setStatus(ReservationConstants::ON_HOLD);
			$reservation->setEmailAddress($userEmail);
			$reservation->setAddress($userAddress);
			$reservation->setNumberOfPeople((int)$people);
			$reservation->setDetails($details);

			$code = $this->getDao()->createReservation($reservation);

			if($code) {
				$response['code'] = ReservationConstants::RESPONSE_201;
				$response['message'] = 'Reservation created';
			} else {
				$response['code'] = ReservationConstants::RESPONSE_409;
				$response['message'] = "Reservation couldn't be created";
			}
			
		}

		return json_encode($response);

	}

	public function getReservation($reservationId) {
		$response = array();

		$reservation = $this->getDao()->getReservation($reservationId);
		if (null != $reservation) {
			$guest = $this->getUserDao()->getUserById($reservation->getGuestId());
			$cabin = $this->getCabinDao()->getCAbinFromBackendById($reservation->getCabinId());

			$response['code'] = ReservationConstants::RESPONSE_200;
			$response['reservation'] = $reservation;
			$response['guest'] = $guest;
			$response['cabin'] = $cabin;
		} else {
			$response['code'] = ReservationConstants::RESPONSE_404;
			$response['message'] = 'Resource not found';
		}

		return json_encode($response);

	}

	public function getReservations($user) {
		
		$response = array();
		$reservations = array();

		switch ($user->getRole()) {
			case ReservationConstants::ADMIN:
				$reservations = $this->getDao()->getReservations();
				break;
			
			default:
				$reservations = $this->getDao()->getReservationsByUserId($user->getId());
				break;
		}

		if (count($reservations) == 0) {
			$response['code'] = ReservationConstants::RESPONSE_204;
			$response['mseeage'] = 'No resources found';
		} else {
			$cabins = $this->getCabinDao()->getCabinsFromBackend();
			$response['reservations'] = $reservations;
			$response['cabins'] = $cabins;
			$response['code'] = ReservationConstants::RESPONSE_202;
		}
		return $response;
	}

	public function setDao($newDao) {
		$this->dao = $newDao;
	}

	public function getDao() {
		return $this->dao;
	}

	public function setUserDao($newUserDao) {
		$this->userDao = $newUserDao;
	}

	public function getUserDao() {
		return $this->userDao;
	}

	public function setCabinDao($newCabinDao) {
		$this->cabinDao = $newCabinDao;
	}

	public function getCabinDao() {
		return $this->cabinDao;
	}
}