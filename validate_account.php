<?php
require_once 'inc/session.php';
require_once 'inc/blade.php';
require_once 'inc/connection.php';
$errors = [];


$sth = $db->prepare("SELECT * FROM members WHERE id=? AND validation_token=?");
$sth->execute();
$id = $db->lastInsertId();
return $id;
/* Fetch all of the remaining rows in the result set */
$user = $sth->fetchAll(PDO::FETCH_ASSOC);


echo $blade->view()->make('validate_account')->with($user, 'user')->withErrors($errors)->render();

