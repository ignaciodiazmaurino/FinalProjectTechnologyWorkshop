<?php
/**
* Abstract class to work with data of an Image.
*/
class Image {

	private $id;
	private $path;
	private $alternateText;

	public function setId($newId) {
		$this->id = $newId;
	}
	public function getId() {
		return $this->id;
	}

	public function setPath($newPath) {
		$this->path = $newPath;
	}
	public function getPath() {
		return $this->path;
	}

	public function setAlternateText($newAlternateText) {
		$this->alternateText = $newAlternateText;
	}
	public function getAlternateText() {
		return $this->alternateText;
	}

}