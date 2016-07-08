<?php
/**
* Add context to the page and redirect
*/

require_once('model/PageContext.php');
require_once('model/MenuOption.php');

class Redirect {

	private $pagesContext;
	
	function __construct()
	{
		$menuOptions = array();

		$menuOption = new MenuOption();
		$menuOption->setOptionId('mainPage');
		$menuOption->setOptionTextValue('Home');
		$menuOption->setUserRole('any');
		$menuOptions[0] = $menuOption;

		$menuOption = new MenuOption();
		$menuOption->setOptionId('cabins');
		$menuOption->setOptionTextValue('Cabañas');
		$menuOption->setUserRole('any');
		$menuOptions[1] = $menuOption;

		$menuOption = new MenuOption();
		$menuOption->setOptionId('newReservation');
		$menuOption->setOptionTextValue('Hacer una reserva');
		$menuOption->setUserRole('any');
		$menuOptions[2] = $menuOption;

		$menuOption = new MenuOption();
		$menuOption->setOptionId('reservations');
		$menuOption->setOptionTextValue('Listado de reservas');
		$menuOption->setUserRole('loggedIn');
		$menuOptions[3] = $menuOption;

		$menuOption = new MenuOption();
		$menuOption->setOptionId('searchReservation');
		$menuOption->setOptionTextValue('Buscar reserva');
		$menuOption->setUserRole('loggedIn');
		$menuOptions[4] = $menuOption;

		$indexPage = new PageContext();
		$indexPage->setTitle('La Cabaña');
		$indexPage->setPageBody('mainPage');
		$indexPage->setMenuOptions($menuOptions);
		$scripts = Array();
		$indexPage->setScripts($scripts);
		$styles = Array();
		$indexPage->setStyles($styles);

		$cabinsPage = new PageContext();
		$cabinsPage->setTitle('La Cabaña');
		$cabinsPage->setPageBody('cabins');
		$cabinsPage->setMenuOptions($menuOptions);
		$scripts = Array();
		$cabinsPage->setScripts($scripts);
		$styles = Array();
		$cabinsPage->setStyles($styles);

		$newReservationPage = new PageContext();
		$newReservationPage->setTitle('La Cabaña');
		$newReservationPage->setPageBody('newReservation');
		$newReservationPage->setMenuOptions($menuOptions);
		$scripts = Array('jquery-ui','datePickerFunctions','reservationScript');
		$newReservationPage->setScripts($scripts);
		$styles = Array('jquery-ui');
		$newReservationPage->setStyles($styles);

		$reservationsPage = new PageContext();
		$reservationsPage->setTitle('La Cabaña');
		$reservationsPage->setPageBody('reservations');
		$reservationsPage->setMenuOptions($menuOptions);
		$scripts = Array();
		$reservationsPage->setScripts($scripts);
		$styles = Array();
		$reservationsPage->setStyles($styles);

		$findReservationPage = new PageContext();
		$findReservationPage->setTitle('La Cabaña');
		$findReservationPage->setPageBody('searchReservation');
		$findReservationPage->setMenuOptions($menuOptions);
		$scripts = Array();
		$findReservationPage->setScripts($scripts);
		$styles = Array();
		$findReservationPage->setStyles($styles);

		$myProfilePage = new PageContext();
		$myProfilePage->setTitle('La Cabaña');
		$myProfilePage->setPageBody('myProfile');
		$myProfilePage->setMenuOptions($menuOptions);
		$scripts = Array();
		$myProfilePage->setScripts($scripts);
		$styles = Array();
		$myProfilePage->setStyles($styles);

		$newUserPage = new PageContext();
		$newUserPage->setTitle('La Cabaña');
		$newUserPage->setPageBody('newUser');
		$newUserPage->setMenuOptions($menuOptions);
		$scripts = Array();
		$newUserPage->setScripts($scripts);
		$styles = Array();
		$newUserPage->setStyles($styles);

		$pages = array();
		$pages['mainPage'] = $indexPage;
		$pages['cabins'] = $cabinsPage;
		$pages['newReservation'] = $newReservationPage;
		$pages['reservations'] = $reservationsPage;
		$pages['searchReservation'] = $findReservationPage;
		$pages['myProfile'] = $myProfilePage;
		$pages['newUser'] = $newUserPage;

		$this->pagesContext = $pages;
	}

	/**
	* this functions receive a parameter and redirect to the correct page
	* If the parameter is null or empty redirects to the index page.
	*/
	public function redirect($pageParameter) {

		if (!isset($pageParameter) || trim($pageParameter) === '') {
			$page = $this->pagesContext['mainPage'];
		} else {
			$page = $this->pagesContext[$pageParameter];
		}
		require_once ('template.php');

	}

}