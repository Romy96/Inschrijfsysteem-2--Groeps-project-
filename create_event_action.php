<?php
require_once 'inc/crud.php';
require 'inc/connection.php';
require 'inc/session.php';


$eventadd = $_POST['event'];

if (empty($_POST['event'])) {
	$_SESSION['errors'][] = 'Er zijn velden niet ingevuld, probeer opnieuw.';
	header('Location: create_event.php');
    exit;
}
if(isset($_POST['event'])){
    $queryadd = $db->prepare("INSERT INTO events (title) VALUES ('".$_POST["event"]."')"); 
    if ($queryadd->execute(array($eventadd))){
        if ($queryadd->rowCount() > 1) {
        $_SESSION['errors'][] = "U maakt teveel rijen";
        }
    }
}
else{
    $_SESSION['errors'][] = "Er is een fout opgetreden.";
    header ('Location: create_event.php');
    exit;
}
    header('Location: Events_list.php');

