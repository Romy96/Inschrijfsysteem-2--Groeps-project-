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
$Hash = Password_Hash($Wachtwoord, PASSWORD_DEFAULT);

if ( empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['gebruikersnaam']) || empty($_POST['email']) || empty($_POST['wachtwoord']) || empty($_POST['wachtwoord2'])) {
	$_SESSION['errors'][] = 'Één van de velden of meer zijn niet ingevuld.';
	header('Location: register.php');
	exit;
}

if ($Wachtwoord !== $Herhaal_wachtwoord) {
	$_SESSION['errors'][] = 'Wachtwoorden komen niet overeen!';
	header('Location: register.php');
	exit;
}

$sql = $db->prepare("SELECT * FROM members WHERE gebruikersnaam=?");
if ($sql->execute(array($Gebruikersnaam)))
	{
		if ( $sql->rowCount() > 0 ) {
			$_SESSION['errors'][] = 'De gebruikersnaam bestaat al!';
			header('Location: register.php');
			exit;
		}
	}

$sth = $db->prepare("INSERT INTO members (voornaam, voorvoegsel, achternaam, email, wachtwoord, gebruikersnaam) VALUES (?, ?, ?, ?, ?, ?)");
if ($sth->execute(array($Voornaam, $Voorvoegsel, $Achternaam, $Email, $Hash, $Gebruikersnaam)))
{
	$_SESSION['errors'][] = 'De gebruiker is aangemaakt. Log in om de evenementen te bekijken!';
	header('Location: login.php');
	exit;
}
else
{
	$_SESSION['errors'][] = 'Er is iets fout gegaan. Probeer het later nog eens.';
	header('Location: register.php');
	exit;
}
