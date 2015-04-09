<?php
require_once('startsession.php');
?>

<div class="navbar navbar-fixed-top navbar-inverse"> <!-- starting navbar navbar-fixed-top navbar-invserse -->
			<div class="container"> <!-- starting the inner container-->
				<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>	
				</button>
				<a href="#"><img class="navbar-brand visible-sm visible-xs" id="myLogo" src=".\images\logo.png" alt="Logo"></img></a>

				<div class="nav-collapse collapse navbar-responsive-collapse"> <!-- Starting nav-collapse collapse navbar-responsive-collapse-->
					<ul class="nav navbar-nav">
						<li><a href="welcomePage.php"> <span class="glyphicon glyphicon-home"></span>Home</a></li>
						<?php
							if($_SESSION['radioText'] == 'N'){
						?>
							<li>
							<a href="checkEmpUpdate.php"><span class="glyphicon glyphicon-globe"></span>Check Updates</a>
							</li>
						<?php
							}
							if($_SESSION['radioText'] == 'Y'){
						?>
							<li>
							<a href="checkPMUpdate.php"><span class="glyphicon glyphicon-globe"></span>Check Updates</a>
							</li>
						<?php
							}
						?>


						<?php
							if($_SESSION['radioText'] == 'N'){
						?>
							<li>
								<a href="addSkillsDisplay.php"><span class="glyphicon glyphicon-plus"></span>Add Skills</a>
							</li>
						<?php
							}
							if($_SESSION['radioText'] == 'Y'){
						?>
							<li>
								<a href="openProjectDisplay.php"><span class="glyphicon glyphicon-plus"></span>Open Project</a>
							</li>
						<?php
							}
						?>
						
					</ul>
				
					<ul class="nav navbar-nav pull-right">
						<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span>My Account<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
								

								<li>
									<a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a>
								</li>
						</ul>
						</li>
					</ul>
					<a href="#"><img class="navbar-brand pull-right visible-lg" id="myLogo" src=".\images\logo.png" alt="Logo"></img></a>
					<a href="#"><img class="navbar-brand visible-md pull-right" id="myLogo" src=".\images\logo.png" alt="Logo"></img></a>
					
					
				</div> <!-- ending nav-collapse collapse navbar-responsive-collapse -->
			</div> <!-- Ending the inner container-->
</div><!--end of navbar navbar-fixed-top-->