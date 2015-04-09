<?php
$server_response = array();
$current_id = addEmployee();
if($current_id) {
$server_response["success"] = 1;
echo json_encode($server_response);
}
function addEmployee() {
	require_once('config.php');
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
		  	or die("Unable to connect to MySQL: " .mysql_error());
	$query = "insert into employee (name,empid,email,password,radioText) values ('" . $_POST["name"] . "','" . $_POST["employeeId"] . "', '" . $_POST["email"] . "','" . $_POST["password"] . "','" . $_POST["radioText"] . "')";
	//$query = "insert into animals (animal_name,animal_type) values ('Cheetah3','Jungle2')";
	$result = mysqli_query($db_server, $query);
	if (!$result) {
	die('Invalid query: ' . mysql_error());
}
	//return mysqli_insert_id();		
	return $result;
}
?>
