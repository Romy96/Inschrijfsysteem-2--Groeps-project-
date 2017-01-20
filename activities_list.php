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

	$id = $_GET['id'];

	$sth = $db->prepare("SELECT * FROM activities where event_id = ?");
	$sth->execute(array($id));
	/* Fetch all of the remaining rows in the result set */
	$activities = $sth->fetchAll(PDO::FETCH_ASSOC);

	$sth = $db->prepare("SELECT * FROM events WHERE id=? ORDER BY id ASC");
	// controleer of er een foutmelding is ontstaan en zo ja, plaats die dan in $_SESSION['errors'][] = $msg

	if ($sth->execute(array($id)))
	{
  		$event = $sth->fetchAll(PDO::FETCH_ASSOC);	
  		if ( $sth->rowCount() == 0 ) $_SESSION['errors'][] = 'Kan evenement met id '. $id .' niet vinden';
		if ( $sth->rowCount() > 1 ) $_SESSION['errors'][] = 'Je haalt teveel rijen op';
	}
	else
	{
		$_SESSION['errors'][] = 'Het is niet gelukt om de gegevens op te halen.';
	}


	// tell blade to create HTML from the template "login.blade.php"
	 $errors = [];
	echo $blade->view()->make('backend/activities/activities_list')
	->with('event', $event)
	->with('activities', $activities)->withErrors($errors)->render();

}
