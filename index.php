<?php 

require_once 'inc/blade.php';


// pass data
$vars = [
	'title' => 'Welcome!', 
];

// output everything
echo $blade->view()->make('index')->with($vars)->render();