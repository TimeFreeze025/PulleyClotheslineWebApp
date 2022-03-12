<?php
  session_start();
  include 'dbcon.php';

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sqlLogin = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
  $result = $conn->query($sqlLogin);

  if($result->num_rows > 0){
    header("Location:../admin/admin_dashboard.php");
  }else{
    $_SESSION['message'] = "INVALID USERNAME OR PASSWORD";
    header("Location:../index.php");
  }
  $conn->close();

?>