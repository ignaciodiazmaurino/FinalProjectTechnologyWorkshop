<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Image.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/RowMapper.php');

/**
* Class to map the cabins returned from the backend.
*/
class ImageRowMapper implements RowMapper
{
	
	public function map($row) {
		$image = new Image();
		$image->setId($row{'IMAGE_ID'});
		$image->setPath($row{'IMAGE_PATH'});
		$image->setAlternateText($row{'IMAGE_ALTERNATE_TEXT'});

		return $image;
	}
	
}