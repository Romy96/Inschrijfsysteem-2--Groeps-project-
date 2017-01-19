<?php

require_once 'inc/session.php';
require 'inc/connection.php';

$id = $_GET['id'];

$sth = $db->prepare("DELETE FROM events WHERE id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($id)))
{
  	if ( $sth->rowCount() == 0 ) 
  	{
  		$_SESSION['errors'][] = 'Kan evenement met id '. $id .' niet vinden';
  		header("location: Events_list.php");
  		exit;
  	}
	if ( $sth->rowCount() > 1 ) {
	 	$_SESSION['errors'][] = 'Je verwijderd teveel rijen';
	 	header("location: Events_list.php");
	 	exit;
	}	
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	header("location: Events_list.php");
	exit;
}

$sth = $db->prepare("DELETE FROM activities WHERE event_id=?");
// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

if ($sth->execute(array($id)))
{
  	if ( $sth->rowCount() == 0 ) 
  	{
  		$_SESSION['errors'][] = 'Kan activiteiten met events_id '. $id .' niet vinden';
  		header("location: Events_list.php");
  		exit;
  	}
}
else
{
	$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	header("location: Events_list.php");
	exit;
}



?>