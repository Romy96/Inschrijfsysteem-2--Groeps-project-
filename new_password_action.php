<?php
require_once 'inc/crud.php';
require 'inc/connection.php';
require 'inc/session.php';

$Gebruikersnaam = $_POST['Gebruikersnaam'];
$Wachtwoord = $_POST['nieuw_wachtwoord_1'];
$Herhaal_wachtwoord = $_POST['nieuw_wachtwoord_2'];
$Hash = Password_Hash($Wachtwoord, PASSWORD_DEFAULT);

if (empty($_POST['Gebruikersnaam']) || empty($_POST['nieuw_wachtwoord_1']) || empty($_POST['nieuw_wachtwoord_2'])) {
	$_SESSION['errors'][] = 'Één van de velden of meer zijn niet ingevuld.';
	header('Location: insert_new_password.php');
	exit;
}

if ($Wachtwoord !== $Herhaal_wachtwoord) {
	$_SESSION['errors'][] = 'Wachtwoorden komen niet overeen!';
	header('Location: insert_new_password.php');
	exit;
}

$sql = $db->prepare("SELECT * FROM members WHERE gebruikersnaam=?");
if ($sql->execute(array($Gebruikersnaam)))
	{
		if ( $sql->rowCount() == 0 ) {
			$_SESSION['errors'][] = 'De gebruikersnaam is niet gevonden!';
			header('Location: insert_new_password.php');
			exit;
		}
		if ( $sql->rowCount() > 1 ) {
			$_SESSION['errors'][] = 'Je haalt teveel gebruikersnamen op!';
			header('Location: insert_new_password.php');
			exit;
		}
	}

$query = $db->prepare("UPDATE members SET wachtwoord=? AND unhashed_password=? WHERE gebruikersnaam=?");
if ($query->execute(array($Wachtwoord, $Hash, $Gebruikersnaam))) {
	if ($query->rowCount() == 0) {
		$_SESSION['errors'][] = 'De gegevens zijn niet gevonden of er is iets foutgegaan!';
		header('Location: insert_new_password.php');
		exit;
	}
	if ( $sql->rowCount() > 1 ) {
		$_SESSION['errors'][] = 'Je bewerkt teveel gegevens!';
		header('Location: insert_new_password.php');
		exit;
	}
	if ( $sql->rowCount() == 1 ) {
		$_SESSION['errors'][] = 'Uw nieuwe wachtwoord is opgeslagen in de database en klaar voor gebruik!';
		header('Location: login.php');
		exit;
	}
}