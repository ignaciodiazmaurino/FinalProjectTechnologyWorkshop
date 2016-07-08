<?php
/*
* Declare the interface Cabin Dao
*/
interface CabinsDao {

	public function getCabinsFromBackend();

	public function getCAbinFromBackendById($cabinId);

}