<?php 
 require_once 'inc/session.php';
 require_once 'inc/blade.php';
 //$errors = [];
var_dump($errors); die();
 // output everything
echo $blade->view()->make('backend/menu')->withErrors($errors)->render();