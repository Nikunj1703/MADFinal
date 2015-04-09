<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['email'])) {
    if (isset($_COOKIE['email'])) {
      $_SESSION['email'] = $_COOKIE['email'];
      $_SESSION['fullname'] = $_COOKIE['fullname'];
      $_SESSION['empid'] = $_COOKIE['empid'];
      $_SESSION['pm'] = $_COOKIE['pm'];
      // $_SESSION['skills'] = $_COOKIE['skills'];
      // $_SESSION['roles'] = $_COOKIE['role'];
      setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
    }
  }
?>