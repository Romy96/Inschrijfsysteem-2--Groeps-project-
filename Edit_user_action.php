<?php

require_once 'inc/session.php';
require 'inc/connection.php';

$Voornaam = $_POST['voornaam'];
$Voorvoegsel = $_POST['tussenvoegsel'];
$Achternaam = $_POST['achternaam'];
$Gebruikersnaam = $_POST['gebruikersnaam'];
$Email = $_POST['email'];
$IsAdmin = $_POST['ja'];
$IsGebruiker = $_POST['nee'];
$id = $_POST['id'];


if (isset($_POST['ja']) && $_POST['ja'] == 1) {
	$sth = $db->prepare("UPDATE members SET voornaam=?, voorvoegsel=?, achternaam=?, gebruikersnaam=?, email=?, IsAdmin=? WHERE id=?");
	if ($sth->execute(array($Voornaam, $Voorvoegsel, $Achternaam, $Gebruikersnaam, $Email, $IsAdmin, $id)))
		{
	  		if ( $sth->rowCount() == 0 ) {
	  			$_SESSION['errors'][] = 'Kan gebruiker met id '. $id .' niet vinden';
	  			header('location: Edit_user.php?id=' . $id);
			    exit;
	  		}
				if ( $sth->rowCount() > 1 ) {
				$_SESSION['errors'][] = 'Je wijzigt teveel rijen';
				header('location: Edit_user.php?id=' . $id);
				exit;
			}
			if ( $sth->rowCount() == 1 ) {
				$_SESSION['messages'][] = 'De aangepaste gegevens zijn opgeslagen in de database';
				header("location: members_list.php");
				exit;
			}
		}
	}

elseif (isset($_POST['nee']) && $_POST['nee'] == 0) { 
	$upsql = $db->prepare("UPDATE members SET voornaam=?, voorvoegsel=?, achternaam=?, gebruikersnaam=?, email=?, IsAdmin=? WHERE id=?");
	if ($upsql->execute(array($Voornaam, $Voorvoegsel, $Achternaam, $Gebruikersnaam, $Email, $IsGebruiker, $id)))
		{
	  		if ( $upsql->rowCount() == 0 ) {
	  			$_SESSION['errors'][] = 'Kan gebruiker met id '. $id .' niet vinden';
	  			header('location: Edit_user.php?id=' . $id);
			    exit;
	  		}
				if ( $upsql->rowCount() > 1 ) {
				$_SESSION['errors'][] = 'Je wijzigt teveel rijen';
				header('location: Edit_user.php?id=' . $id);
				exit;
			}
			if ( $upsql->rowCount() == 1 ) {
				$_SESSION['errors'][] = 'De aangepaste gegevens zijn opgeslagen in de database';
				header("location: members_list.php");
				exit;
			}
		}
	}

?>