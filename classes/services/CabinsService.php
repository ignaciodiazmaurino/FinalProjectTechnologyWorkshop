<?php
/**
* Interface that has the methods to operate with cabins
*/
Interface CabinsService {
	
	/**
	* Return the cabin based on its id.
	*/
	public function getCabinById($cabinId);

	/**
	* Return all cabins.
	*/
	public function getCabins();
}