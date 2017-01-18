<?php
require_once 'inc/crud.php';
require 'inc/connection.php';
require 'inc/session.php';


$eventadd = $_POST['event'];
$afbeelding = $_POST['afbeelding'];
$banner = $_POST['banner'];
$startdatum = $_POST['startdatum'];
$einddatum = $_POST['einddatum'];

if (empty($_POST['event']|| empty($afbeelding) || empty($banner) || empty($startdatum) || empty($locatie))) {
    $_SESSION['errors'][] = 'Er zijn sommige velden die nog niet ingevuld zijn';
    header('Location: create_event.php');
    exit;
}

$sql = $db->prepare("SELECT * FROM events WHERE title=?");
if ($sql->execute(array($eventadd))) {
    if ( $sql->rowCount() > 0 ) {
        $_SESSION['errors'][] = 'Sorry. Deze evenement bestaat al.';
        header('Location: create_event.php');
        exit;
    } 
}

$sth = $db->prepare("INSERT INTO events (title, large_banner_url, small_banner_url, start_date, end_date) VALUES (?, ?, ?, ?, ?)");
if ($sth->execute(array($eventadd, $banner, $afbeelding, $startdatum, $einddatum))) {
    $_SESSION['errors'][] = 'De gegevens zijn ingevuld en opgeslagen in de database.';
    header('Location: Events_list.php');
    exit;
}
else
{
    $_SESSION['errors'][] = 'Er is iets fout gegaan in de database. Probeer het later nog eens.';
    header('Location: create_event.php');
    exit;
}
?>

