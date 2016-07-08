<?php
class Reservation {

	private $reservationId;
	private $user;
	private $arrivalDate;
	private $departureDate;
	private $numberOfPeople;
	private $cabinId;
	private $address;
	private $emailAddress;
	private $details;

	public function setReservationId($newReservationId) {
		$this->reservationId = $newReservationId;
	}
	public function getReservationId() {
		return $this->reservationId;
	}

	public function setUser($newUser) {
		$this->user = $newUser;
	}
	public function getUser() {
		return $this->user;
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

}