<?php

require_once 'inc/session.php';
require 'inc/connection.php';

$event = $_POST['event'];
$afbeelding = $_POST['afbeelding'];
$banner = $_POST['banner'];
$startdatum = $_POST['startdatum'];
$einddatum = $_POST['einddatum'];
$id = $_POST['id'];

$sql = $db->prepare("UPDATE events SET title=?, small_banner_url=?, large_banner_url=?, start_date=?, end_date=? WHERE id=?");
if ($sql->execute(array($event, $afbeelding, $banner, $startdatum, $einddatum, $id)))
	{
  		if ( $sql->rowCount() == 0 ) 
  		{
  		 	$_SESSION['errors'][] = 'Kan evenement met id '. $id .' niet vinden';
  		 	header('location: edit_event.php?id=' . $id);
			exit;
  		}
		if ( $sql->rowCount() > 1 ) 
		{
			 $_SESSION['errors'][] = 'Je wijzigt teveel rijen';
			 header('location: edit_event.php?id=' . $id);
			 exit;
		}
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te slaan.';
		header('location: edit_event.php?id=' . $id);
		exit;
	}

	if ( $sql->rowCount() == 1 ) 
	{
	 	$_SESSION['errors'][] = 'De aangepaste gegevens zijn opgeslagen in de database';
	 	header("location: events_list.php");
	 	exit;
	}
	
?>