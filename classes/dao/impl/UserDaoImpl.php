<?php
/*
* Implements UserDao 
*/
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/UserDao.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/dao/rowMapper/impl/UserRowMapper.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/model/Guest.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/SQLUtils.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/FinalProjectTechnologyWorkshop/classes/util/DataBaseConnector.php');

class UserDaoImpl implements UserDao {

	const USER_ROLE_ID = 1; //Only guest users can be created by the application. Admin users are created by a BA.
	const INSERT_USER = "INSERT INTO USERS 
									 (USER_NAME, USER_LAST_NAME, USER_ROLE_ID, 
									 USER_PASSWORD, USER_EMAIL, USER_ADDRESS) 
							  VALUES (':userName', ':userLastName', :roleId,
							  		 ':userPassword', ':userEmail', ':userAddress')";
	const USER_EXISTS = "SELECT COUNT(*) AS total
						   FROM USERS 
						  WHERE USER_EMAIL= ':userEmail'";

	const GET_USER = "SELECT USER_ID, USER_NAME, USER_LAST_NAME, ROLE_NAME,
	                         USER_PASSWORD, USER_EMAIL, USER_ADDRESS
                        FROM USERS 
                   LEFT JOIN ROLES
	                      ON USERS.USER_ROLE_ID = ROLES.ROLE_ID
	                   WHERE USER_NAME= ':userName' 
		                 AND USER_PASSWORD=':password'";

	const GET_USER_BY_ID = "SELECT USER_ID, USER_NAME, USER_LAST_NAME, ROLE_NAME,
	                        	   USER_PASSWORD, USER_EMAIL, USER_ADDRESS
                        	  FROM USERS 
                   		 LEFT JOIN ROLES
	                     		ON USERS.USER_ROLE_ID = ROLES.ROLE_ID
	                   		 WHERE USER_ID = ':userId'";

	const GET_USER_ID = "SELECT USER_ID
						   FROM USERS 
						  WHERE USER_EMAIL= ':userEmail'";

	const REMOVE_USER = "DELETE FROM USERS 
							  WHERE USER_ID = :userId";

	const UPDATE_USER = "UPDATE USERS 
							SET USER_NAME = ':userName', 
						   		USER_LAST_NAME = ':userLastName',
								USER_EMAIL = ':userEmail',
								USER_ADDRESS = ':userAddress',
								USER_PASSWORD = ':userPassword'
						  WHERE USER_ID = :userId";

	const CHECK_PASSWORD = "SELECT COUNT(*) AS total
							  FROM USERS 
							 WHERE USER_ID = :userId
							   AND USER_PASSWORD = :userPassword";

	private $dataBaseConnector;

	function __construct() {

		$this->dataBaseConnector = new DataBaseConnector();

	}
	
	public function getUserFromBackend($userName, $password) {

		$rowMapper = new UserRowMapper();

		$parameters = array($userName,$password);
		$keys = array(":userName",":password");

		$result = $this->dataBaseConnector->executeQuery(SQLUtils::buildSqlStatement($this::GET_USER, $keys, $parameters));
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$user = $rowMapper->map($row);
			}
		} else {
			$user ='';
		}
		
		return $user;
	}

	public function createUser($userName, $userLastName, $userEmail, $userAddress, $userPassword) {

		$parameters = array(
			$userName,
			$userLastName,
			self::USER_ROLE_ID,
			$userPassword,
			$userEmail,
			$userAddress
		);
		$keys = array(
			':userName',
			':userLastName',
			':roleId',
			':userPassword',
			':userEmail',
			':userAddress');

		return $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement($this::INSERT_USER, $keys, $parameters)
		);

	}

	public function modifyUser($user, $userId) {

		$parameters = array(
			$user->getName(),
			$user->getLastName(),
			$user->getEmail(),
			$user->getAddress(),
			$user->getPassword(),
			$userId
		);

		$keys = array(
			':userName',
			':userLastName',
			':userEmail',
			':userAddress',
			':userPassword',
			':userId');

		$result = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement($this::UPDATE_USER, $keys, $parameters)
		);
		return $result;
		
	}

	public function userExists($userEmail) {

		$parameters = array($userEmail);
		$keys = array(':userEmail');

		$rs = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement(self::USER_EXISTS, $keys, $parameters)
		);

		while($row = $rs->fetch_assoc()) {
			$result=$row{'total'};
		}

		return $result;
	}

	public function getGuestId($userEmail) {
	
		$parameters = array($userEmail);
		$keys = array(':userEmail');

		$rs = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement(self::GET_USER_ID, $keys, $parameters)
		);

		while($row = $rs->fetch_assoc()) {
			$result=$row{'USER_ID'};
		}

		return $result;
	}

	public function getUserById($userId) {

		$rowMapper = new UserRowMapper();

		$parameters = array($userId);
		$keys = array(":userId");

		$result = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement($this::GET_USER_BY_ID, $keys, $parameters)
		);

		while ($row = $result->fetch_assoc()) {
			$user = $rowMapper->map($row);
		}
		return $user;
	}

	public function removeUser($userId) {
		$parameters = array($userId);
		$keys = array(':userId');
		$result = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement($this::REMOVE_USER, $keys, $parameters)
		);
		return $result;
	}

	public function checkPassword($userId, $password) {

		$parameters = array($userId, $password);
		$keys = array(':userId', ':userPassword');
		$rs = $this->dataBaseConnector->executeQuery(
			SQLUtils::buildSqlStatement($this::CHECK_PASSWORD, $keys, $parameters)
		);

		while($row = $rs->fetch_assoc()) {
			$result=$row{'total'};
		}
		return $result;
	}

}