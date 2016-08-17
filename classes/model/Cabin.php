<?php
/**
* Abstract class to work with data of a Cabin.
*/

class Cabin implements JsonSerializable {

	private $id;
	private $name;
	private $description;
	private $thumbnail;
	private $images;
	private $amenities;
	private $maxPeople;

	public function JsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }

	public function setId($newId) {
		$this->id = $newId;
	}
	public function getId() {
		return $this->id;
	}

	public function setName($newName) {
		$this->name = $newName;
	}
	public function getName() {
		return $this->name;
	}

	public function setDescription($newDescription) {
		$this->description = $newDescription;
	}
	public function getDescription() {
		return $this->description;
	}

	public function setThumbnail($newThumbnail) {
		$this->thumbnail = $newThumbnail;
	}
	public function getThumbnail() {
		return $this->thumbnail;
	}

	public function setImages($newImages) {
		$this->images = $newImages;
	}
	public function getImages() {
		return $this->images;
	}

	public function setAmenities($newAmenities) {
		$this->amenities = $newAmenities;
	}
	public function getAmenities() {
		return $this->amenities;
	}

	public function setMaxPeople($newMaxPeople) {
		$this->maxPeople = $newMaxPeople;
	}
	public function getMaxPeople() {
		return $this->maxPeople;
	}
}