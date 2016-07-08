<?php
/**
* Implementation of CabinsDao
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/page/classes/dao/CabinsDao.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/page/classes/model/Cabin.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/page/classes/model/Image.php');

class CabinsDaoImpl implements CabinsDao {

	//Temporary attribute
	private $cabins;

	//Temporary constructor method
	function __construct() {

		$cabinOne = new Cabin();
		$cabinOne->setId('cab001');
		$cabinOne->setName('Cabaña 1');
		$cabinOne->setDescription("Cabaña para cuatro personas ideal para disfrutar tus vacaciones en familia. Cuenta con amplia sala de estar con estufa hogar y sillones; Cocina con vajilla completa, cocina, horno a microhondas, horno electrico; dos habitaciones, una de ellas con cama matrimonial y la restante con dos camas de una plaza. Posee equipos de aire acondicionado en todas las habitaciones.");
		
		$image = new Image();
		$image->setPath('images/cabin2.jpg');
		$image->setAlternateText('Cabaña1');

		$cabinOne->setThumbnail($image);

		$imagesArray = Array();

		$image = new Image();
		$image->setPath('images/cabin2.jpg');
		$image->setAlternateText('Cabaña1');

		$imagesArray[0] = $image;

		$image = new Image();
		$image->setPath('images/cabin2_int1.jpg');
		$image->setAlternateText('Sala de estar');

		$imagesArray[1] = $image;

		$image = new Image();
		$image->setPath('images/cabin2_int2.jpg');
		$image->setAlternateText('Dormitorio');

		$imagesArray[2] = $image;

		$image = new Image();
		$image->setPath('images/cabin2_int3.jpg');
		$image->setAlternateText('Baño');

		$imagesArray[3] = $image;

		$cabinOne->setImages($imagesArray);
		$amenities = Array();
		
		$amenities[0]='reposeras para todos los ocupantes';
		$amenities[1]='seis bicicletas';
		$amenities[2]='dos sombrillas';
		$cabinOne->setAmenities($amenities);
		$cabinOne->setMaxPeople(4);


		$cabinTwo = new Cabin();
		$cabinTwo->setId('cab002');
		$cabinTwo->setName('Cabaña 2');
		$cabinTwo->setDescription('Cabaña para seis personas ideal para disfrutar tus vacaciones en familia. Cuenta con amplia sala de estar con estufa hogar y sillones; Cocina con vajilla completa, cocina, horno a microhondas, horno electrico; tres habitaciones, una de ellas con cama matrimonial y baño en suite con bañera para hidromasajes. Posee equipos de aire acondicionado en todas las habitaciones.');
		
		$image = new Image();
		$image->setPath('images/cabin1.jpg');
		$image->setAlternateText('Cabaña');

		$cabinTwo->setThumbnail($image);

		$imagesArray = Array();

		$image = new Image();
		$image->setPath('images/cabin1.jpg');
		$image->setAlternateText('Cabaña1');

		$imagesArray[0] = $image;

		$image = new Image();
		$image->setPath('images/cabin1_int1.jpg');
		$image->setAlternateText('Sala de estar');

		$imagesArray[1] = $image;

		$image = new Image();
		$image->setPath('images/cabin1_int2.jpg');
		$image->setAlternateText('Dormitorio');

		$imagesArray[2] = $image;

		$image = new Image();
		$image->setPath('images/cabin1_int3.jpg');
		$image->setAlternateText('Baño');

		$imagesArray[3] = $image;

		$cabinTwo->setImages($imagesArray);
		$amenities = Array();
		
		$amenities[0]='reposeras para todos los ocupantes';
		$amenities[1]='seis bicicletas';
		$amenities[2]='dos sombrillas';
		$cabinTwo->setAmenities($amenities);
		$cabinTwo->setMaxPeople(6);

		$cabinsArray = array();
		$cabinsArray['cab001'] = $cabinOne;
		$cabinsArray['cab002'] = $cabinTwo;

		$this->cabins = $cabinsArray;

	}

	public function getCabinsFromBackend() {
		//TODO: This method has to be completed once the BBDD has been done
		return $this->cabins;
	}
	public function getCAbinFromBackendById($cabinId) {
		//TODO: This method has to be completed once the BBDD has been done
		error_log($cabinId);
		$cabin = $this->cabins[$cabinId];
		return $cabin;
	}
}