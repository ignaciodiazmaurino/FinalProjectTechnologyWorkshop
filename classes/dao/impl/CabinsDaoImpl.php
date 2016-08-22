<?php
/**
* Implementation of CabinsDao
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/CabinsDao.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Cabin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Image.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/DataBaseConnector.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/impl/CabinRowMapper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/impl/ImageRowMapper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/impl/ThumbnailRowMapper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/impl/AmenityRowMapper.php');

class CabinsDaoImpl implements CabinsDao {

	//Consntants
	const SELECT_CABINS = 'SELECT CABIN_ID, CABIN_NAME, CABIN_DESCRIPTION, CABIN_MAX_OCCUPANCY FROM CABINS';
	const WHERE_CABIN_ID = 'WHERE CABIN_ID=';
	const SELECT_IMAGES ='SELECT IMAGE_ID, IMAGE_PATH, IMAGE_ALTERNATE_TEXT FROM IMAGES ';
	const SELECT_THUMBNAIL ='SELECT THUMBNAIL_ID, THUMBNAIL_PATH, THUMBNAIL_ALTERNATE_TEXT FROM THUMBNAILS ';
	const SELECT_AMENITIES = 'SELECT AMENITY_ID, AMENITY_TEXT FROM AMENITIES WHERE AMENITY_CABIN_ID=';
	const ORDER_BY_AMENITY_ID = ' ORDER BY AMENITY_ID';

	private $result;
	private $dataBaseConnector;
	private $cabins;

	//Temporary constructor method
	function __construct() {

		$this->dataBaseConnector = new DataBaseConnector();

	}

	public function getCabinsFromBackend() {

		$cabins = array();
		$rowMapper = new CabinRowMapper();
		$result = $this->dataBaseConnector->executeQuery(self::SELECT_CABINS);

		while ($row = $result->fetch_assoc()) {
			$cabin = $rowMapper->map($row);
			$this->setThumbnailToCabin($cabin);
			$this->setImagesToCabin($cabin);
			$this->setAmenitiesToCabin($cabin);
			$cabins[$cabin->getId()] = $cabin;
		} 

		return $cabins;
	}

	public function getCAbinFromBackendById($cabinId) {
		//TODO: This method has to be completed once the BBDD has been done
		error_log($cabinId);
		$cabin = $this->cabins[$cabinId];
		return $cabin;
	}

	private function setThumbnailToCabin($cabin) {
		$image = new Image();
		$rowMapper = new ThumbnailRowMapper();
		
		$result = $this->dataBaseConnector->executeQuery(self::SELECT_THUMBNAIL.self::WHERE_CABIN_ID.$cabin->getId());
		$row = $result->fetch_assoc();
		
		$image = $rowMapper->map($row);
		
		$cabin->setThumbnail($image);
	}

	private function setImagesToCabin($cabin) {
		$images = array();
		$rowMapper = new ImageRowMapper();
		$result = $this->dataBaseConnector->executeQuery(self::SELECT_IMAGES.self::WHERE_CABIN_ID.$cabin->getId());
		while ($row = $result->fetch_assoc()) {
			$image = $rowMapper->map($row);
			$images[$image->getId()] = $image;
		}
		$cabin->setImages($images);

	}
	private function setAmenitiesToCabin($cabin) {
		$amenities = array();
		$rowMapper = new AmenityRowMapper();
		$i = 0;
		$result = $this->dataBaseConnector->executeQuery(self::SELECT_AMENITIES.$cabin->getId().self::ORDER_BY_AMENITY_ID);
		while ($row = $result->fetch_assoc()) {
			$amenity = $rowMapper->map($row);
			$amenities[$i] = $amenity;
			$i++;
		}
		$cabin->setAmenities($amenities);
	}
}