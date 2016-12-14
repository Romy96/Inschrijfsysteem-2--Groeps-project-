<?php
require_once 'inc/crud.php';
require_once 'inc/connection.php';
require_once 'inc/session.php';
require_once 'event_activities.php';


if ( empty($_POST['submit'])) {
	$_SESSION['errors'][] = 'Geen inzending ontvangen.';
	header('Location: events.php');	// fix this? 
	exit;
}

$activity_id = $_POST['activity_id'];
$member_id = $_SESSION['userId'];

if ( empty($activity_id)) {
	$_SESSION['errors'][] = 'Het activity id werd niet meegegeven ';
	header('Location: events.php');	// fix this? 
	exit;
}

if ( empty($member_id)) {
	$_SESSION['errors'][] = 'Het member id werd niet meegegeven ';
	header('Location: events.php');
	exit;
}

$sth = $db->prepare("INSERT INTO members_activities (activity_id, member_id) VALUES (?, ?)");
if ($sth->execute(array($activity_id, $member_id)))
{
	$_SESSION['errors'][] = 'De activiteit is toegevoegd.';
	header('Location: events.php');
	exit;
}
else
{
	$_SESSION['errors'][] = 'Er is iets fout gegaan. Probeer het later nog eens.';
	header('Location: events.php');
	exit;
}
