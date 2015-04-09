<?php
  require_once('startsession.php');
  require_once('config.php');
  

  // Connect to the database
  $db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database)
      or die("Unable to connect to MySQL: " .mysql_error());

   if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $email = $_SESSION['email'];
    //$skills = mysqli_real_escape_string($dbc, trim($_POST['skills']));
    $selectedOption = '';
    $result= '';
    foreach($_POST['skills'] as $selectedOption){
      $result .= $selectedOption.';';
    }
    $roles = $_POST['roles'];
   // echo $result;
    
    if (!empty($email)) {
      // Make sure someone isn't already registered using this username
     // $query = "SELECT * FROM skillset WHERE email = '$email'";
      //$data = mysqli_query($dbc, $query);
      //if (mysqli_num_rows($data) == 0) {
        
          
        // The email is unique, so insert the data into the database
       
       $query0 = "SELECT * from skillsInfo WHERE email = '".$_SESSION['email']."'";
       $result0 = mysqli_query($db_server, $query0);

       if(mysqli_fetch_array($result0)){
        $query = "UPDATE skillsInfo SET email = '".$email."', skills = '".$result."', role = '".$roles."' WHERE  email = '".$_SESSION['email']."'";
       }
       elseif (!mysqli_fetch_array($result0)) {
         $query = "INSERT INTO skillsInfo (email, skills, role) Values ('".$email."', '".$result."', '".$roles."')";
       }


      // 
      
     
        
       // echo $query;
        mysqli_query($db_server, $query);

        // Confirm success with the user
//        require_once('navbar.php');
       // echo '<p>Your skills has been successfully updated.</p>';
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/addSkillSuccess.php';
        header('Location: ' . $home_url);


        mysqli_close($db_server);
        return true;
        exit();
     // }
     // else {
        // An account already exists for this username, so display an error message
        // echo '<p class="error">Skills already exists for this email. Please use a different email.</p>';
        // $email = "";
        return false;
     // }
    }
    else {
      echo '<p class="error">You must enter data.</p>';
      return false;
    }
  
}
  mysqli_close($db_server);
  return false;
?>