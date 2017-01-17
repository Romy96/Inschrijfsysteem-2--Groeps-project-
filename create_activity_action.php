<?php

require_once 'inc/session.php';
require 'inc/connection.php';


if ( ! isset ($_POST['submit']) )
	{
		$_SESSION['errors'][] = 'U moet wel iets invullen.';
		header('Location: create_activity.php');
}

$naam = $_POST['naam'];
$afbeelding = $_POST['afbeelding'];
$beschrijving = $_POST['beschrijving'];
$event_id = $_POST['event_id'];

// check if all required fields are filled, otherwise return with error
if (empty($naam) || empty($afbeelding) || empty($beschrijving)) {
	$_SESSION['errors'][] = 'Er zijn sommige velden die nog niet ingevuld zijn';
	header('Location: create_activity.php?id=' . $event_id);
	exit;
}

// check if activity does not already exist
$sql = $db->prepare("SELECT * FROM activities WHERE title=? AND banner_url=? AND description=?");
if ($sql->execute(array($naam, $afbeelding, $beschrijving))) {
	if ( $sql->rowCount() > 0 ) {
		$_SESSION['errors'][] = 'Sorry. De gegevens die je ingevuld hebt bestaan al.';
		header('Location: create_activity.php?id=' . $event_id);
		exit;
	}
}


$sth = $db->prepare("INSERT INTO activities (event_id, title, banner_url, description) VALUES (?, ?, ?, ?)");
if ($sth->execute(array($event_id, $naam, $afbeelding, $beschrijving))) {
	$_SESSION['errors'][] = 'De gegevens zijn ingevuld en opgeslagen in de database.';
	header('Location: event_activities.php?id=' . $event_id);
}
else
{
	$_SESSION['errors'][] = 'Er is iets fout gegaan in de database. Probeer het later nog eens.';
	header('Location: create_activity.php?id=' . $event_id);
}
?>