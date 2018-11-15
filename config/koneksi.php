<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host="localhost";
	$user="root";
	$pass="";
	$dbName="hrmdepartment";

	$conn=mysqli_connect($host,$user,$pass,$dbName);
	//$hasil=mysqli_select_db($conn,$dbName);
?>