<?php

 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 require_once 'inc/crud.php';
 $errors = [];

 if ( IsLoggedInSession()==false ) {
	$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
	header('location: login.php');
	exit;
}

elseif ( IsLoggedInSession()==true && IsAdmin() == false)
{
	$_SESSION['errors'][] = "U bent wel ingelogd, maar u bent geen beheerder!";
	header('location: main.php');
	exit;
}

elseif ( IsLoggedInSession()==true && IsAdmin() == true )
{
	require 'inc/connection.php';

	$activity_id = $_GET['id'];

	$sql = $db->prepare("SELECT * FROM activities where id = ?");
	if ($sql->execute(array($activity_id)))
	{
  		$activity = $sql->fetch(PDO::FETCH_ASSOC);	
  		if ( $sql->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan activiteit met id '. $activity_id .' niet vinden';
		if ( $sql->rowCount() > 1 ) $_SESSION['errors'][] = 'Je haalt teveel rijen op';
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	}

	$sth = $db->prepare("SELECT * FROM events WHERE id=?");
	// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

	if ($sth->execute(array($activity['event_id'])))
	{
  		$event = $sth->fetch(PDO::FETCH_ASSOC);	
  		if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan event met id '. $id .' niet vinden';
		if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je haalt teveel rijen op';
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	}

	// tell blade to create HTML from the template "login.blade.php"
	echo $blade->view()->make('backend/activities/edit_activity')
	->with('event', $event)
	->with('activity', $activity)->withErrors($errors)->render();

}

