<?php
	require_once 'inc/session.php';
	require_once 'inc/connection.php';
	require_once 'inc/crud.php';


	if ( empty($_POST['email']) ) {
		 $_SESSION['errors'][] = 'Geen mail ingevuld.';
	}

	if ( empty($_POST['wachtwoord']) ) {
		$_SESSION['errors'][] = 'Geen wachtwoord ingevuld.';
	}

if (empty($_SESSION['errors'])) $resultarray = CheckUserIsValid($db, $_POST['email'], $_POST['wachtwoord']);

if ( $resultarray['result'] == 1 ) {
	 LoginSession($resultarray['id'], $resultarray['email'], $resultarray['gebruikersnaam']);

	if ( isset($_POST['remember']) && $_POST['remember'] == "checked") { 
 		RememberCookie($resultarray['id'], $resultarray['email'], $resultarray['gebruikersnaam']); 
 	} 

	header('Location: main.php');
	exit;
}
else
{
	$_SESSION['errors'][] = 'Combinatie van email en wachtwoord niet gevonden.';
	header('Location: login.php');
	exit;
}