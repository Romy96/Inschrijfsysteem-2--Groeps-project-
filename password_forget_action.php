<?php

require_once 'inc/session.php';
require 'inc/connection.php';
require 'inc/crud.php';

$Email = $_GET['email'];

// redirect back to login with error if user didn't enter email
if ( empty($_GET['email']) ) {
	$_SESSION['errors'][] = 'Fout: geen e-mail ingevuld.';
}

$query = $db->prepare("SELECT * FROM members WHERE email=?");
if ($query->execute(array($Email))) {
	if ($query->rowCount() == 0) {
		$_SESSION['errors'][] = 'Het emailadres is niet gevonden in de database.';
		header('location: password_forget.php');
		exit;
	}
	if ($query->rowCount() > 1) {
		$_SESSION['errors'][] = 'Je haalt teveel rijen op!';
		header('location: password_forget.php');
		exit;
	}
	if ($query->rowCount() == 1) {
		$_SESSION['errors'][] = 'Emailadres gevonden!';
		header('location: password_forget_mail.php');
		exit;
	}
}

?>