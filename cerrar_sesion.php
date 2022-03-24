<?php 
  session_start();
  $_SESSION['usuario'] = null;
  $_SESSION['id'] = null;
  header('Location: login.php');
?>