<?php
session_start();
	if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){
$server_response = array();
$employees = getEmployee();
if(is_array($employees)) {
	$server_response["employees"] = $employees;
	$server_response["success"] = 1;
}
}

function getEmployee() {
	require_once('config.php');
	$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
	  	or die("Unable to connect to MySQL: " .mysql_error());
	$query  =  "select * from employees where email='".$_REQUEST["email"]."' and password1 = '".$_REQUEST["password"]."'";
	$result = mysqli_query($db_server, $query);
	if (!$result) {
	die('Invalid query: '.$query.':' . mysql_error());
	}
while($row=mysqli_fetch_array($result)) {
	$employeelist[] = $row;
	$_SESSION['email'] = "".$row['email'];
	$_SESSION['fullname'] = "".$row['fullname'];
	$_SESSION['empid'] = "".$row['empid'];
	$_SESSION['radioText'] = "".$row['radioText'];
	$_SESSION['projectName'] = "".$row['projectName'];
	$_SESSION['projectManager'] = "".$row['projectManager'];
	$_SESSION['skills'] = "".$row['skills'];
    $_SESSION['roles'] = "".$row['role'];
    $_SESSION['exp'] = "".$row['exp'];
	
	 echo "string: ".sizeof($_SESSION['email']);
	 $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/welcomePage.php';
     header('Location: ' . $home_url);
     exit();
}
	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/invalidCredentials.html';
	header('Location: ' . $home_url);
}	
?>