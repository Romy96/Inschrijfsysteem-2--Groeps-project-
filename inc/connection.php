<?php 
	$mysqlhost = 'localhost';
	$mysqldb = 'inschrijfsysteem2';
	$mysqluser = 'root';
	$mysqlpass = '';
	

	try
{
	//connection to db
	$db = new PDO('mysql:host='. $mysqlhost.';dbname='.$mysqldb.';charset=utf8mb4', $mysqluser, $mysqlpass);    	
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}