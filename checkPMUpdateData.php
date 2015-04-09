<?php
include("sendmail.php");
require_once('startsession.php');
include('config.php');
?>


<?php

	
			
			
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
		  	or die("Unable to connect to MySQL: " .mysql_error());

	$query3 = "SELECT * from projectInfo where email = '".$_SESSION['email']."'";
	$result3 = mysqli_query($db_server, $query3);

	$countSkills = 0;
	$skillsNeeded= array();
	//$p = 0;
	while($row3=mysqli_fetch_array($result3)){
			$skillsNeeded = $row3['skills'];
	}

	$skillsNeededExplode = array();
	if(!empty($skillsNeeded)){
		$skillsNeededExplode = explode(";",$skillsNeeded);
	}



	$query1 = "SELECT * from skillsInfo";
	$result1 = mysqli_query($db_server, $query1);

	
	$EmpSkills = array();
	$EmpEmail = array();
	
	$FinalEmp = array();
	$k=0;
	$m=0;
	$i=0;

	while($row=mysqli_fetch_array($result1)) {
		$EmpSkills[$i] = $row['skills'];
		$EmpEmail[$i] = $row['email'];
		$i++;
	

	
	// $check1 = array();
	// $check2 = array();
	
	for($i=0;$i<sizeof($EmpSkills);$i++){
		$EmpSkillsExplode = array();
		$EmpSkillsExplode = explode(";",$EmpSkills[$i]);

		if(sizeof($EmpSkillsExplode)>=sizeof($skillsNeededExplode)){
			for($j=0;$j<sizeof($EmpSkillsExplode)-1;$j++){
				for($k=0;$k<sizeof($skillsNeededExplode)-1;$k++){
					if($EmpSkillsExplode[$j]==$skillsNeededExplode[$k]){
						$countSkills++;
						$FinalEmp[$m] = $row['email'];
						break;
					}
				}
			}
			$m++;
		}

		if(sizeof($EmpSkillsExplode)<sizeof($skillsNeededExplode)){
			for($j=0;$j<sizeof($skillsNeededExplode)-1;$j++){
				for($k=0;$k<sizeof($EmpSkillsExplode)-1;$k++){
					if($EmpSkillsExplode[$j]==$skillsNeededExplode[$k]){
						$countSkills++;
						$FinalEmp[$m] = $row['email'];
						break;
					}
				}
			}
			$m++;
		}
	}

}


	if($countSkills!= 0){
		require_once('navbar.php');
?>


			
			<br/><br/><br/><br/>
			<h4><u>We have employee(s) who have skillsets similar to those demanded by your project</u></h4>
			<h4>Below is the email address of employees:</h4>
			<h4> <br/> <?php 
			$FinalEmp = array_unique($FinalEmp);
			for($i=0;$i<=max(array_keys($FinalEmp));$i++){ 
				if(!empty($FinalEmp[$i])){ 
				 echo "-> Contact ".$FinalEmp[$i];
				 ?>
				<!-- <a href="empProfile.php?email=<?= $FinalEmp[$i] ?>" rel="profile">View Profile</a>-->
				 <?php
				 //echo "<a href = 'empProfile.php?'."$FinalEmp[$i]."</a>";
				
				 echo "<br/>";
				 echo "<br/>";
				}
			}
			// echo "string ".max(array_keys($FinalEmp));
			// echo "string ".implode("", $check2);
			?></h4>
			
	</div>
<?php
	}
	else{
		require_once('navbar.php');
?>
	<div class="container" id="main">
			<br/><br/><h2>No employee matches the skillset demanded by your project.</h2>
	</div>
	
<?php
	}



?>
