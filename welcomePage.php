<?php
	require_once('startsession.php');
	//include('config.php');
?>
<html>
	<head>
		
		
		<title>Let's Team Up</title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!--<link href="http://bootswatch.com/cerulean/bootstrap.min.css" rel="stylesheet">-->
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="includes/css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		<link href="includes/css/StickyFooter.css" rel="stylesheet">
		
		<style>
			.hTagCenter{
				text-align: center;
				margin-left: auto;
				margin-right:auto;
			}
		</style>

	</head><!--end head-->
	<body>
	<!--main body of code wrapped in a container class-->
	<div class="container" id="main">
		
	


		<?php
			require_once('navbar.php');
		?>


















		
		<div class="row" id="featuresHeading">
			<div class="col-12">	
				<br><br><br>	
				<h2 class="hTagCenter">Let's Team Up</h2>
				<?php
					echo "<h4>Hello, ".$_SESSION['fullname']."</h4>";
					echo "<h4><u>Below are your details you provided during registration:</u></h4>";
					echo "<h4>Employee Id:".$_SESSION['empid']."</h4>";
					//echo "The roles you currently need in your project: ".$_SESSION['roles'];
					
					if($_SESSION['radioText']=='Y'){ 
						if(!empty($_SESSION['skills'])){ 
							echo "<h4>The skill you currently need in your project: ".$_SESSION['skills']."</h4>";
						}
						if(!empty($_SESSION['roles'])){ 
							echo "The roles you currently need in your project: ".$_SESSION['roles'];
						}
					}	
					if($_SESSION['radioText']=='N'){ 
						echo "<h4>Your primary project is: ".$_SESSION['projectName']."</h4>";
						echo "<h4>Your primary project manager is: ".$_SESSION['projectManager']."</h4>";
						echo "<h4>Your total experience is: ".$_SESSION['exp']." years</h4>";
						//echo "<h4>PM:".$_SESSION['pm']."</h4>";
					}

				?>
			</div><!--end col-12-->
		</div><!-- end featuresHeading-->

		

	
</div>	<!--End of main container -->


	<footer class="footer"><!--Start of footer -->
	<div class="container">
		<h5 align="center">Copyright &copy;2015| Nikunj Ratnaparkhi & Shweta Vyas</h5>	
	</div>
</footer><!--Ending Footer-->













	<!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	
	</body><!--end body-->
</html>

