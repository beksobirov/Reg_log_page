<?php
  session_start();  
  
  unset($_SESSION['participant']);
  unset($_SESSION['timeout_logout_tl']);
  
  session_destroy();
  header('location: ./login.php');   
?>