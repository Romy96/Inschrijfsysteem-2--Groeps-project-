<?php

require_once 'inc/session.php';
require 'inc/connection.php';

$user_id = $_GET['id'];

$sth = $db->prepare("DELETE FROM members WHERE id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($user_id)))
{
  	if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan gebruiker met id '. $user_id .' niet vinden';
	if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je verwijderd teveel rijen';
	if ( $sth->rowCount() == 1 ) $_SESSION['errors'][] = 'De gebruiker is van de database verwijderd';
	header('location: members_list.php');
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen en te verwijderen.';
	header('location: members_list.php');
}


?>