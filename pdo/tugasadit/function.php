<?php
$server = "localhost";
$user = "root";
$pass = "";

try{
	$con = new PDO("mysql:host=$server;dbname=keluarga",$user,$pass);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "Connect Failed: ". $e->getMessage();
}

?>