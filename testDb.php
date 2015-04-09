<?php
include('config.php');

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
		  	or die("Unable to connect to MySQL: " .mysql_error());

	$query = "insert into employees (fullname,empid,email,password1,radioText) values ('one','two', 'three','four','Y')";
	$result = mysqli_query($db_server, $query);
?>