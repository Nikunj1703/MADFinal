<!DOCTYPE html>

<html>
	<head>
		
		<!-- Shweta Vyas Web Site -->
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

		
	</head><!--end head-->
	<body>
	<!--main body of code wrapped in a container class-->
	<div class="container" id="main">
		
		
		<?php
			require_once('navbar.php');
		?>

		<div class="row" id="employeeInfo">
			
				
				
							<div class="container">

		

				  			<h2>Add the technology & skills demanded in the project</h2><br/>
				  			<form class="form-horizontal" role="form" method="post" action='openProject.php'>
				    										
								<div class="form-group">
							        <label class="col-sm-3 control-label" for="skills">Add your skills:<small>(3 maximum)</small></label>
							        <div class="col-sm-9">
							             <div class="checkbox" id='skills' multiple>
							             	<div class="row">
							             		<div class="col-sm-6">
								                <input type="checkbox" name="skills[]" value="JAVA">JAVA<br/>
								                <input type="checkbox" name="skills[]" value="C">C<br/>
								                <input type="checkbox" name="skills[]" value="C++">C++<br/>
								                <input type="checkbox" name="skills[]" value="HTML5">HTML5<br/>
								                <input type="checkbox" name="skills[]" value="CSS3">CSS3<br/>
								                <input type="checkbox" name="skills[]" value=".Net">.Net
								            	</div>
								                <div class="col-sm-6">
								                <input type="checkbox" name="skills[]" value="Python">Python<br/>
								                <input type="checkbox" name="skills[]" value="PHP">PHP<br/>
								                <input type="checkbox" name="skills[]" value="Ruby">Ruby<br/>
								                <input type="checkbox" name="skills[]" value="Android">Android<br/>
								                <input type="checkbox" name="skills[]" value="Javascript">Javascript<br/>
								                <input type="checkbox" name="skills[]" value="Webservices">Web Services
								            	</div>
							                </div>
							            </div>
							        </div>
							    </div>

								<div class="form-group">
									 <label class="col-sm-3 control-label" for="exp">Add minimum experience required in the project:<br></label>
									 <div class="col-sm-9">
									  <select class="form-control" name="exp" id='exp'>
							                <option value="0">0</option>
							                <option value="1">1</option>
							                <option value="2">2</option>
							                <option value="3">3</option>
							                <option value="4">4</option>
							                <option value="5">5</option>
							            </select>
									 </div>
								</div>

								<div class="form-group">
									 <label class="col-sm-3 control-label" for="roleP">Add the role required in the project:<br></label>
									 <div class="col-sm-9">
									  <select class="form-control" name="roleP[]" id='roleP' multiple>
							                <option value="Business Analyst">Business Analyst</option>
							                <option value="Test Analyst">Test Analyst</option>
							                <option value="Developer">Developer</option>
							                <option value="Database Administrator">Database Administrator</option>
							            </select>
									 </div>
								</div>





				  		       <div class="form-group">        
				    			  <div class="col-sm-12 col-sm-offset-3">
				        			<button type="submit" id="submit" name='submit' class="btn btn-primary" >Add</button>
				      			  </div>
				    			</div>
				  			</form>
						</div>
					
			</div><!-- end col-sm-6-->


		
		</div><!-- end tab1-->
<br/>
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

