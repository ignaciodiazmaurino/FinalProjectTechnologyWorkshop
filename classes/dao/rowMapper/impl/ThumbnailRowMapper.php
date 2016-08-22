<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Image.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/RowMapper.php');

/**
* Class to map the cabins returned from the backend.
*/
class ThumbnailRowMapper implements RowMapper
{
	
	public function map($row) {
		$image = new Image();
		$image->setId($row{'THUMBNAIL_ID'});
		$image->setPath($row{'THUMBNAIL_PATH'});
		$image->setAlternateText($row{'THUMBNAIL_ALTERNATE_TEXT'});

		return $image;
	}
	
}