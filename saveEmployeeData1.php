<?php
include("sendmail.php");
require_once('startsession.php');
include('config.php');

$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
		  	or die("Unable to connect to MySQL: " .mysql_error());
if(isset($_REQUEST['email'])){
	//require_once('config.php');
	//$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
	//	  	or die("Unable to connect to MySQL: " .mysql_error());
	$query = "SELECT * from employees where email = '" . $_REQUEST["email"] . "'";
	$result = mysqli_query($db_server, $query);
	
	 if (mysqli_num_rows($result) == 1) {
	 	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/duplicateAccount.php';
		header('Location: ' . $home_url);
		//echo mysqli_num_rows($result);
	 }
	 else{
	 	// $query = "";
	 	// $result = "";
	 	// mysqli_close($db_server);

	 	if(isset($_REQUEST['fullname']) && isset($_REQUEST['empid']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])){

			$subject = "Registration confirmation-Let's Team Up";
			$message = "Dear ".$_REQUEST['fullname'].",<br/><br/>Transform your profession into your passion.<br/><br/><u><b>Below are 
			your registration information:</b></u><br/><br/>Email: ".$_REQUEST['email']."<br/>Password: ".$_REQUEST['password']."<br/>
			<p>Copyright &copy;2015 MAD Contest|Nikunj Ratnaparkhi & Shweta Vyas.";
			$mailsend =   sendmail($_REQUEST['email'],$subject,$message,$_REQUEST['fullname']);


			$server_response = array();
			//$current_id = addEmployee();

			$query = "insert into employees (fullname,empid,email,password1,radioText) values ('" . $_REQUEST["fullname"] . "','" . $_REQUEST["empid"] . "', '" . $_REQUEST["email"] . "','" . $_REQUEST["password"] . "','Y')";
			//$query = "insert into animals (animal_name,animal_type) values ('Cheetah3','Jungle2')";
			$_SESSION['email'] = $_REQUEST['email'];
			$_SESSION['empid'] = $_REQUEST['empid'];
			$_SESSION['fullname'] = $_REQUEST['fullname'];
			$_SESSION['radioText'] = 'Y';
			$result = mysqli_query($db_server, $query);

			if($result) {
			$server_response["success"] = 1;
			//echo json_encode($server_response);
			$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/welcomePage.php';
			header('Location: ' . $home_url);
			}
			}
	 }
}




/*function addEmployee() {
	 //require_once('config.php');
	 $db_server2 = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
		  	or die("Unable to connect to MySQL: " .mysql_error());
	$query = "insert into employees (fullname,empid,email,password1,radioText) values ('" . $_REQUEST["fullname"] . "','" . $_REQUEST["empid"] . "', '" . $_REQUEST["email"] . "','" . $_REQUEST["password"] . "','Y')";
	//$query = "insert into animals (animal_name,animal_type) values ('Cheetah3','Jungle2')";
	$_SESSION['email'] = $_REQUEST['email'];
	$_SESSION['empid'] = $_REQUEST['empid'];
	$_SESSION['fullname'] = $_REQUEST['fullname'];

	$result = mysqli_query($db_server2, $query);
	if (!$result) {
	die('Invalid query: ' . mysql_error());
}
	//return mysqli_insert_id();		
	return $result;
}*/
?>
