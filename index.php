<?php

require_once("classes/Redirect.php");

if (!isset($_GET['page']) || trim($_GET['page']) === '') {
	$page='mainPage';
} else {
	$page=$_GET['page'];
}

$controller = new Redirect();
$controller->redirect("$page");
