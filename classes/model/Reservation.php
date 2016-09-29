<?php
class Reservation  implements JsonSerializable {

	private $reservationId;
	private $guestId;
	private $guestName;
	private $guestLastName;
	private $userId;
	private $arrivalDate;
	private $departureDate;
	private $numberOfPeople;
	private $cabinId;
	private $address;
	private $emailAddress;
	private $details;
	private $status;

	public function setReservationId($newReservationId) {
		$this->reservationId = $newReservationId;
	}
	public function getReservationId() {
		return $this->reservationId;
	}

	public function setGuestId($newGuestId) {
		$this->guestId = $newGuestId;
	}
	public function getGuestId() {
		return $this->guestId;
	}

	public function setGuestName($newGuestName) {
		$this->guestName = $newGuestName;
	}
	public function getGuestName() {
		return $this->guestName;
	}

	public function setGuestLastName($newGuestLastName) {
		$this->guestLastName = $newGuestLastName;
	}
	public function getGuestLastName() {
		return $this->guestLastName;
	}

	public function setUserId($newUserId) {
		$this->userId = $newUserId;
	}
	public function getUserId() {
		return $this->userId;
	}

	public function setArrivalDate($newArrivalDate) {
		$this->arrivalDate = $newArrivalDate;
	}
	public function getArrivalDate() {
		return $this->arrivalDate;
	}

	public function setDepartureDate($newDepartureDate) {
		$this->departureDate = $newDepartureDate;
	}
	public function getDepartureDate() {
		return $this->departureDate;
	}

	public function setNumberOfPeople($newNumberOfPeople) {
		$this->numberOfPeople = $newNumberOfPeople;
	}
	public function getNumberOfPeople() {
		return $this->numberOfPeople;
	}

	public function setCabinId($newCabinId) {
		$this->cabinId = $newCabinId;
	}
	public function getCabinId() {
		return $this->cabinId;
	}

	public function setAddress($newAddress) {
		$this->address = $newAddress;
	}
	public function getAddress() {
		return $this->address;
	}

	public function setEmailAddress($newEmailAddress) {
		$this->emailAddress = $newEmailAddress;
	}
	public function getEmailAddress() {
		return $this->emailAddress;
	}

	public function setDetails($newDetails) {
		$this->details = $newDetails;
	}
	public function getDetails() {
		return $this->details;
	}

	public function setStatus($newStatus) {
		$this->status = $newStatus;
	}
	public function getStatus() {
		return $this->status;
	}

	public function JsonSerialize() {
        $vars = get_object_vars($this);
        return $vars;
    }
}