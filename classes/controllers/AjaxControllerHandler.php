<?php

/**
*Ajax action dispatcher
*/

//List of actions
require_once('LoginController.php');
require_once('CabinsController.php');
require_once('ReservationController.php');
require_once('UserController.php');

$className = $_POST['controllerclass'];
$classMethod = $_POST['action'];

$action = new $className;
print $action->$classMethod();