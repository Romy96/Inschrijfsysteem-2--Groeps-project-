<?php

require 'inc/connection.php';
require 'inc/session.php';

$Voornaam = $_POST['txt_voornaam'];
$Voorvoegsel = $_POST['txt_tussenvoegsel'];
$Achternaam = $_POST['txt_achternaam'];
$Gebruikersnaam = $_POST['txt_gebruikersnaam'];
$Email = $_POST['txt_email'];
$Wachtwoord = $_POST['txt_wachtwoord'];
$Herhaal_wachtwoord = $_POST['txt_wachtwoord2'];

if ( empty($_POST['txt_voornaam']) || empty($_POST['txt_achternaam']) || empty($_POST['txt_gebruikersnaam']) || empty($_POST['txt_email']) || empty($_POST['txt_wachtwoord']) || empty($_POST['txt_wachtwoord2'])) {
	$_SESSION['errors'][] = 'Één van de velden of beiden velden zijn niet ingevuld.';
	header('Location: register.php');
	exit;
}

if ($Wachtwoord !== $Herhaal_wachtwoord) {
	$_SESSION['errors'][] = 'Het wachtwoord komt niet overeen met de herhaalwachtwoord! Vul het wachtwoord opnieuw in!';
	header('Location: register.php');
	exit;
}

$sql = $db->prepare("SELECT * FROM members WHERE gebruikersnaam=?");
if ($sql->execute(array($Gebruikersnaam)))
	{
		if ( $sql->rowCount() > 0 ) {
			$_SESSION['errors'][] = 'Deze gebruikersnaam bestaat al! Vul een ander gebruikernaam in.';
			header('Location: register.php');
			exit;
		}
	}

$sth = $db->prepare("INSERT INTO members (voornaam, voorvoegsel, achternaam, email, wachtwoord, gebruikersnaam) VALUES (?, ?, ?, ?, ?, ?)");
if ($sth->execute(array($Voornaam, $Voorvoegsel, $Achternaam, $Email, $Wachtwoord, $Gebruikersnaam)))
{
	$_SESSION['errors'][] = 'De gegevens zijn ingevuld en opgeslagen in de database.';
	header('Location: login.php');
	exit;
}
else
{
	$_SESSION['errors'][] = 'Er is iets fout gegaan in de database. Probeer het later nog eens.';
	header('Location: register.php');
	exit;
}
