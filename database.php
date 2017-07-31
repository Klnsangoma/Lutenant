<?php
$dsn ='mysql:host=sict-mysql;dbname=lutenant';
$username='ala';
$password='password';

try{
	$db=new PDO($dsn,$username,$password);
	echo "</br></br></br><p>"."You are connected to the database". "</p>";
	
}
catch (Exception $e) {
	$error_message=$e->getMessage();
	include('database_error.php');
	exit();
	
	
}

?>