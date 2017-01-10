<?php 
 require_once 'inc/session.php';
 require_once 'inc/crud.php';
 require_once 'inc/blade.php';
 $errors = [];

 // output everything
echo $blade->view()->make('menu')->withErrors($errors)->render();