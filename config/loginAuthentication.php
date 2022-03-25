<?php
  session_start();
  include 'dbcon.php';

  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password);

  $sqlLogin = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
  $result = $conn->query($sqlLogin);

  if($result->num_rows > 0){
    $_SESSION['username'] = $username;
    header("location:./checkCoords.php");
  }else{
    $_SESSION['error-message'] = "Invalid Username or Password.";
    header("Location:../index.php");
  }
  $conn->close();
?>