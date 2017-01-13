<?php
require_once 'inc/session.php';
require_once 'inc/connection.php';
require_once 'inc/crud.php';

// redirect back to login with error if user didn't enter email
if ( empty($_POST['email']) ) {
	$_SESSION['errors'][] = 'Fout: Geen e-mail ingevuld.';
}

// redirect back to login with error if user didn't enter pass
if ( empty($_POST['wachtwoord']) ) {
	$_SESSION['errors'][] = 'Fout: Geen wachtwoord ingevuld.';
}

// check if user can be found
if (empty($_SESSION['errors'])) $result = CheckUserIsValid($db, $_POST['email'], $_POST['wachtwoord']);

if ( $result == false ) {
	header('Location: login.php');
	exit;
}
else 
{

	// als gebruiker heeft aangevinkt "onthou mij", bewaar userId en Gebruikersnaam dan in cookie
	if ( isset($_POST['remember']) && $_POST['remember'] == "checked") {
		RememberCookie();
	}

	header('Location: main.php');
	exit;	
}
