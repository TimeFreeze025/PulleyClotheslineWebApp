<?php
  session_start();
  include 'dbcon.php';

  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  $sqlLogin = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
  $result = $conn->query($sqlLogin);

  if($result->num_rows > 0){
    setcookie("user", $username, time()+3600*24*30, '/');
    header("Location:../home.php");
  }else{
    $_SESSION['error-message'] = "Invalid Username or Password.";
    header("Location:../index.php");
  }
  $conn->close();

?>