<?php
require_once 'inc/crud.php';
require 'inc/connection.php';
require 'inc/session.php';


$Voornaam = $_POST['voornaam'];
$Voorvoegsel = $_POST['tussenvoegsel'];
$Achternaam = $_POST['achternaam'];
$Gebruikersnaam = $_POST['gebruikersnaam'];
$Email = $_POST['email'];
$Wachtwoord = $_POST['wachtwoord'];
$Herhaal_wachtwoord = $_POST['wachtwoord2'];
$IsAdmin = $_POST['ja'];
$IsGebruiker = $_POST['nee'];
$Hash = md5($Wachtwoord);

if ( empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['gebruikersnaam']) || empty($_POST['email']) || empty($_POST['wachtwoord']) || empty($_POST['wachtwoord2'])) {
	$_SESSION['errors'][] = 'Één van de velden of meer zijn niet ingevuld.';
	header('Location: create_user.php');
	exit;
}

if ($Wachtwoord !== $Herhaal_wachtwoord) {
	$_SESSION['errors'][] = 'Wachtwoorden komen niet overeen!';
	header('Location: create_user.php');
	exit;
}

if ( strlen( $Wachtwoord ) < 8 ) 
	{
   	  	if ( preg_match( "/[^0,9]/", $Wachtwoord ) ) {
			$_SESSION['errors'][] = 'Uw wachtwoord moet minimaal 8 tekens lang zijn';
			header('Location: create_user.php');
			exit;
  		}
}

$sql = $db->prepare("SELECT * FROM members WHERE gebruikersnaam=?");
if ($sql->execute(array($Gebruikersnaam)))
	{
		if ( $sql->rowCount() > 0 ) {
			$_SESSION['errors'][] = 'De gebruikersnaam bestaat al!';
			header('Location: create_user.php');
			exit;
		}
	}

$query = $db->prepare("SELECT * FROM members WHERE email=?");
if ($query->execute(array($Email)))
	{
		if ( $query->rowCount() > 0 ) {
			$_SESSION['errors'][] = 'Deze emailadres is al in gebruik!';
			header('Location: create_user.php');
			exit;
		}
	}

if (isset($_POST['ja']) && $_POST['ja'] == 1) {
	$sth = $db->prepare("INSERT INTO members (voornaam, voorvoegsel, achternaam, email, wachtwoord, gebruikersnaam, active, IsAdmin) VALUES (?, ?, ?, ?, ?, ?, 1, ?)");
	if ($sth->execute(array($Voornaam, $Voorvoegsel, $Achternaam, $Email, $Hash, $Gebruikersnaam, $IsAdmin)))
	{
		if ($sth->rowCount() > 1) {
			$_SESSION['errors'][] = "U maakt teveel rijen";
			header('location: create_user.php');
			exit;
		}
		if ($sth->rowCount() == 1) {
			$_SESSION['errors'][] = "Een nieuwe beheerdersaccount is toegevoegd";
			header('location: members_list.php');
			exit;
		}
	}

}

elseif (isset($_POST['nee']) && $_POST['nee'] == 0) {
	$insertsql = $db->prepare("INSERT INTO members (voornaam, voorvoegsel, achternaam, email, wachtwoord, gebruikersnaam, active, IsAdmin) VALUES (?, ?, ?, ?, ?, ?, 1, ?)");
	if ($insertsql->execute(array($Voornaam, $Voorvoegsel, $Achternaam, $Email, $Hash, $Gebruikersnaam, $IsGebruiker)))
	{
		if ($insertsql->rowCount() > 1) {
			$_SESSION['errors'][] = "U maakt teveel rijen";
			header('location: create_user.php');
			exit;
		}
		if ($insertsql->rowCount() == 1) {
			$_SESSION['errors'][] = "Een nieuwe gebruikersaccount is toegevoegd";
			header('location: members_list.php');
			exit;
		}
	}

}
else
{
	$_SESSION['errors'][] = 'Er is iets fout gegaan. Probeer het later nog eens.';
	header('Location: create_user.php');
	exit;
}


