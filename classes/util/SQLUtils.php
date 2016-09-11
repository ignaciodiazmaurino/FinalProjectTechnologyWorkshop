<?php

/**
* Class that provides methods to operate with SQL statements.
*/
class SQLUtils {
	
	/**
	* This function provides the final sql statement to operate with the DDBB.
	**/
	public static function buildSqlStatement($sqlStatement, $keys, $parameters) {
		return str_replace($keys, $parameters, $sqlStatement);
	}
}
