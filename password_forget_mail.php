<?php
require_once 'inc/session.php';
require_once 'inc/blade.php';
require_once 'inc/connection.php';
$errors = [];


echo $blade->view()->make('password_forget_mail')->withErrors($errors)->render();
