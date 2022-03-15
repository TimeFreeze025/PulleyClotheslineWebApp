<?php
  session_start();
  include 'dbcon.php';

  $username = $_POST['typeUsername'];
  $password = $_POST['typePassword'];

  $sqlLogin = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
  $result = $conn->query($sqlLogin);

  if($result->num_rows > 0){
    header("Location:../home.php");
  }else{
    $_SESSION['message'] = "Invalid Username or Password.";
    header("Location:../index.php");
  }
  $conn->close();

?>