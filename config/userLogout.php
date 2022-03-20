<?php
  if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']); 
    unset($_SESSION['username']);
    setcookie('user', null, -1, '/'); 
    header("Location:../index.php");
  }
?>