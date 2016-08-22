<?php
/**
* This class is used to connect to the database
*/

class DataBaseConnector {

	function executeQuery($query) {

		$properties = parse_ini_file(getcwd()."/classes/properties/database.ini");

		$hostname=$properties['hostname'];
		$username=$properties['username'];
		$password=$properties['password'];
		$portNumber=$properties['portnumber'];
		$database=$properties['database'];
		
		try {
			//Connection to the database
			$dbConnection = new mysqli($hostname, $username, $password, $database, $portNumber);
			
			//set charset
			$dbConnection->set_charset($properties['encoding']);

			//Query creation
			$result = mysqli_query($dbConnection,$query);

			//Close connection
			$dbConnection->close();

			return $result;

		} catch (mysqli_sql_exception $e) {
			echo 'There was an error trying to connect to the Data base. Please try again in a few minutes';
			throw $e;
			
		}
	}

}