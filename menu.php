<?php 
 require_once 'inc/session.php';
 require_once 'inc/blade.php';

 // output everything
echo $blade->view()->make('backend/menu')->render();