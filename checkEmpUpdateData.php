<?php
include("sendmail.php");
require_once('startsession.php');
include('config.php');
?>


<?php

	
			
			
$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
		  	or die("Unable to connect to MySQL: " .mysql_error());

	$query3 = "SELECT * from skillsInfo where email = '".$_SESSION['email']."'";
	$result3 = mysqli_query($db_server, $query3);

	$countSkills = 0;
	$skillsPresent= array();
	//$p = 0;
	while($row3=mysqli_fetch_array($result3)){
			$skillsPresent = $row3['skills'];
		//	$p++;
	}



	$query1 = "SELECT * from employees where radioText = 'Y'";
	$result1 = mysqli_query($db_server, $query1);

	
	$PMEmailArray = array();
	$PMSkillsNeeded= array();
	$FinalPMs = array();
	//$matchSkillCount = array();
	$i=0;
	while($row=mysqli_fetch_array($result1)) {
		$PMEmailArray[$i] = $row['email'];
		$i++;
	}

	$k=0;
	$m=0;
	$check1 = array();
	$check2 = array();
	$skillsPresentExplode = array();
	if(!empty($skillsPresent)){
		$skillsPresentExplode = explode(";",$skillsPresent);
	}
	
	for($j=0;$j<sizeof($PMEmailArray);$j++){
		$query2 = "SELECT * from projectInfo where email = '".$PMEmailArray[$j]."'";
		$result2 = mysqli_query($db_server, $query2);
		
		while($row2=mysqli_fetch_array($result2)){
			$PMSkillsNeeded[$k] = $row2['skills'];
			$PMSkillsNeededExplode = array();
			
			$PMSkillsNeededExplode = explode(";",$PMSkillsNeeded[$k]);
			
			if(sizeof($PMSkillsNeededExplode)>= sizeof($skillsPresentExplode)){
				//$countSkills = 0;
				for($x=0; $x<(sizeof($PMSkillsNeededExplode)-1); $x++){
					for($y=0; $y<(sizeof($skillsPresentExplode)-1); $y++){
						if($PMSkillsNeededExplode[$x] == $skillsPresentExplode[$y]){
							$countSkills++;
							$FinalPMs[$m] = $row2['email'];
							$check1[$m] = $PMSkillsNeededExplode[$x];
							$check2[$m] = $skillsPresentExplode[$y];
							//$matchSkillCount[$m] = $countSkills;
							break;
						}
					}
					
				}
				$m++;
			}

			if(sizeof($PMSkillsNeededExplode)< sizeof($skillsPresentExplode)){
				//$countSkills = 0;
				for($x=0; $x<(sizeof($skillsPresentExplode)-1); $x++){
					for($y=0; $y<(sizeof($PMSkillsNeededExplode)-1); $y++){
						if($PMSkillsNeededExplode[$x] == $skillsPresentExplode[$y]){
							$countSkills++;
							$FinalPMs[$m] = $row2['email'];
							//$matchSkillCount[$m] = $countSkills;
							break;
						}
					}
					
				}
				$m++;
			}
			$k++;
		}
		
	}
	

	

	
	
	
	


	if($countSkills!= 0){
		require_once('navbar.php');
?>


			
			<br/><br/><br/><br/>
			<h4><u>We have found open project which matches your skillsets:</u></h4>
			<h4>Below is the list of project managers who have open projects similar to your skillsets</h4>
			<h4> <br/> <?php 
			$FinalPMs = array_unique($FinalPMs);
			for($i=0;$i<=max(array_keys($FinalPMs));$i++){ 
				if(!empty($FinalPMs[$i])){ 
				 echo "-> Contact ".$FinalPMs[$i];
				// echo ". There are total ".$matchSkillCount[$i]." skills in your profile which matches the requirement of the project opened by this Peoject Manager.";
				 echo "<br/>";
				 echo "<br/>";
				}
			} 
			// echo "string ".implode("", $check1);
			// echo "string ".implode("", $check2);
			?></h4>
			
	</div>
<?php
	}
	else{
		require_once('navbar.php');
?>
	<div class="container" id="main">
			<br><br><h2>No open project for you!</h2>
	</div>
	
<?php
	}



?>
