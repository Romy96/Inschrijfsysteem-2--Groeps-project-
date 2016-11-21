<?php

require 'inc/connection.php';
require 'inc/session.php';

$Voornaam = $_POST['txt_voornaam'];
$Tussenvoegsel = $_POST['txt_tussenvoegsel'];
$Achternaam = $_POST['txt_achternaam'];
$Gebruikersnaam = $_POST['txt_gebruikersnaam'];
$Email = $_POST['txt_email'];
$Wachtwoord = $_POST['txt_wachtwoord'];
$Herhaal_wachtwoord = $_POST['txt_wachtwoord2'];

// 1. Check of alle velden ingevuld zijn, behalve de voorvoegsel sinds die optioneel is. Zo niet, terug naar de pagina met een error.
if ( empty($_POST['txt_voornaam']) || empty($_POST['txt_achternaam']) || empty($_POST['txt_gebruikersnaam']) || empty($_POST['txt_email']) || empty($_POST['txt_wachtwoord']) || empty($_POST['txt_wachtwoord2'])) {
	$_SESSION['errors'][] = 'Één van de velden of beiden velden zijn niet ingevuld.';
	header('Location: register.php');
	exit;
}

//2. Check de wachtwoord velden niet dezelfde waarde heeft. Zo ja, terug naar de pagina met een error. Zo niet, doorgaan naar de eerste query.
if ($Wachtwoord !== $Herhaal_wachtwoord) {
	$_SESSION['errors'][] = 'Het wachtwoord komt niet overeen met de herhaalwachtwoord. Vul het opnieuw in en probeer het nog eens.';
	header('location: register.php');
	exit; 
}

//3. Check of deze gebruikersnaam bestaat met de "select" query. Zo ja, terug naar de pagina met een error. Zo niet, doorgaan.
$sql = $db->prepare("SELECT * FROM members WHERE gebruikersnaam=?");
if ($sql->execute(array($Gebruikersnaam)))
	{
		if ( $sql->rowCount() > 0 ) {
			$_SESSION['errors'][] = 'Deze gebruikersnaam bestaat al! Vul een ander gebruikernaam in.';
			header('Location: register.php');
			exit;
		}
	}

//4. Als alles in orde is, voeg de gegevens toe in de database met een "insert" query. 
$sth = $db->prepare("INSERT INTO members (voornaam, voorvoegsel, achternaam, email, wachtwoord, gebruikersnaam) VALUES (?, ?, ?, ?, ?, ?)");
if ($sth->execute(array($Voornaam, $Tussenvoegsel, $Achternaam, $Email, $Wachtwoord, $Gebruikersnaam)))
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

?>