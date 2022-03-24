<?php
  require_once '../config/dbcon.php';
  session_start();

  $timeCommand = $_GET['timeCommand'];
  $sqlDeleteCommand = "DELETE FROM commands WHERE username = '{$_COOKIE['user']}' AND timeCommand = '{$timeCommand}'";
  if($conn->query($sqlDeleteCommand) === TRUE){
    $_SESSION['valid-message'] = "Schedule Successfully Deleted";
    header("Location:../../home.php");
  }else{
    echo "ERROR :".$sqlDeleteCommand."<br>".$conn->error;
  }
  $conn->close();  
?>