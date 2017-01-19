<?php

require_once 'inc/session.php';
require 'inc/connection.php';

$naam = $_POST['naam'];
$afbeelding = $_POST['afbeelding'];
$beschrijving = $_POST['beschrijving'];
$events_id = $_POST['events_id'];
$activity_id = $_POST['activity_id'];

$sql = $db->prepare("UPDATE activities SET title=?, banner_url=?, description=? WHERE id=? AND event_id=?");
if ($sql->execute(array($naam, $afbeelding, $beschrijving, $activity_id, $events_id)))
	{
  		if ( $sql->rowCount() == 0 ) 
  		{
  			$_SESSION['errors'][] = 'Kan activiteit met id '. $activity_id .' niet vinden';
  			header('location: edit_activity.php?id=' . $activity_id);
  			exit;
  		}
		if ( $sql->rowCount() > 1 ) 
		{
			$_SESSION['errors'][] = 'Je wijzigt teveel rijen';
			header('location: edit_activity.php?id=' . $activity_id);
	  		exit;
		}
		if ( $sql->rowCount() == 1 ) 
		{
		 	$_SESSION['errors'][] = 'De aangepaste gegevens zijn opgeslagen in de database';
		 	header('location: activities_list.php?id=' . $events_id);
  			exit;
		}
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te slaan.';
		header('location: edit_activity.php?id=' . $activity_id);
	  	exit;
	}
	
?>