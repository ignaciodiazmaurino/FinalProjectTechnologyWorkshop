<?
/**
* Implementation of CabinsDao.
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/ReservationsDao.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Reservation.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/SQLUtils.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/DataBaseConnector.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/impl/ReservationRowMapper.php');

class ReservationsDaoImpl implements ReservationsDao {

	const INSERT_RESERVATION = "INSERT INTO RESERVATIONS (RESERVATION_GUEST_ID, RESERVATION_USER_ID, 
														  RESERVATION_GUEST_NAME, RESERVATION_GUEST_LASTNAME, 
														  RESERVATION_CABIN_ID, RESERVATION_ARRIVAL_DATE, 
														  RESERVATION_DEPARTURE_DATE, RESERVATION_STATE, 
														  RESERVATION_GUEST_EMAIL, RESERVATION_GUEST_ADDRESS, 
														  RESERVATION_QUANTITY, RESERVATION_DETAILS) 
									 VALUES (:guestId, :userId, ':userName', ':userLastName', :cabinId, CAST(':arrivalDate' AS DATE),
									 		CAST(':departureDate' AS DATE), ':status', ':email', ':address',
									 		:people, ':details')";

	const SELECT_RESERVATIONS = 'SELECT RESERVATION_ID, RESERVATION_GUEST_ID, 
										RESERVATION_GUEST_NAME, RESERVATION_GUEST_LASTNAME, 
									  	RESERVATION_USER_ID, RESERVATION_CABIN_ID, 
									  	RESERVATION_ARRIVAL_DATE, RESERVATION_DEPARTURE_DATE, 
									  	RESERVATION_STATE, RESERVATION_GUEST_EMAIL, 
									  	RESERVATION_GUEST_ADDRESS, RESERVATION_QUANTITY, 
									  	RESERVATION_DETAILS 
								   FROM RESERVATIONS ';
	const BY_ID = ' WHERE RESERVATION_ID=:reservationId';
	
	const BY_USERID = ' WHERE RESERVATION_GUEST_ID=:userId';

	const UPDATE_RESERVATION = "UPDATE RESERVATIONS 
								   SET RESERVATION_ARRIVAL_DATE = CAST(':arrivalDate' AS DATE), 
									   RESERVATION_DEPARTURE_DATE = CAST(':departureDate' AS DATE),
									   RESERVATION_STATE = ':status'
								 WHERE RESERVATION_ID = :reservationId";

	private $dataBaseConnector;

	function __construct() {

		$this->dataBaseConnector = new DataBaseConnector();

	}


	/**
	* Store the reservation in the database.
	*/
	public function createReservation($reservation) {

		$parameters = array(
			$reservation->getGuestId(),
			$reservation->getUserId(),
			$reservation->getCabinId(),
			$reservation->getGuestName(),
			$reservation->getGuestLastName(),
			$reservation->getArrivalDate(),
			$reservation->getDepartureDate(),
			$reservation->getStatus(),
			$reservation->getEmailAddress(),
			$reservation->getAddress(),
			$reservation->getNumberOfPeople(),
			$reservation->getDetails()
		);

		$keys = array(
			":guestId",
			":userId",
			":cabinId",
			':userName',
			':userLastName',
			":arrivalDate",
			":departureDate",
			":status",
			":email",
			":address",
			":people",
			":details"

		);

		$result = $this->dataBaseConnector->executeQuery(SQLUtils::buildSqlStatement(self::INSERT_RESERVATION, $keys, $parameters));

		return $result;

	}

	public function getReservation($reservationId) {

		$rowMapper = new ReservationRowMapper();

		$parameters = array($reservationId);
		$keys = array(":reservationId");
		$result = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement(
				self::SELECT_RESERVATIONS.
				self::BY_ID, 
				$keys, $parameters
			)
		);
		$reservation = null;

		while ($row = $result->fetch_assoc()) {
			$reservation = $rowMapper->map($row);
		}

		return $reservation;

	}

	public function getReservations() {
		$reservations = array();
		$rowMapper = new ReservationRowMapper();
		$result = $this->dataBaseConnector->executeQuery(self::SELECT_RESERVATIONS);

		while ($row = $result->fetch_assoc()) {
			$reservation = $rowMapper->map($row);
			
			$reservations[$reservation->getReservationId()] = $reservation;
		} 

		return $reservations;
	}

	public function getReservationsByUserId($userId) {
		$reservations = array();
		$rowMapper = new ReservationRowMapper();

		$parameters = array($userId);
		$keys = array(":userId");
		
		$result = $this->dataBaseConnector->executeQuery(
				SQLUtils::buildSqlStatement(
					self::SELECT_RESERVATIONS.
					self::BY_USERID, 
					$keys, $parameters
				)
			);

		while ($row = $result->fetch_assoc()) {
			$reservation = $rowMapper->map($row);
			
			$reservations[$reservation->getReservationId()] = $reservation;
		} 

		return $reservations;
	}

	public function updateReservation($reservationId, $arrivalDate, $departureDate, $status) {
		
		$parameters = array($reservationId, $arrivalDate, $departureDate, $status);
		$keys = array(":reservationId", ":arrivalDate", ":departureDate", ":status");

		$result = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement(self::UPDATE_RESERVATION, $keys, $parameters)
		);
		return $result;
	}

	public function deleteReservation($reservationID) {

	}

}