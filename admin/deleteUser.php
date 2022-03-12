<?php
  require_once '../config/dbcon.php';
  session_start();

  $userID = $_GET['userID'];
  $sqlDeleteRecord = "DELETE FROM users WHERE userID='{$userID}'";
  if($conn->query($sqlDeleteRecord) === TRUE){
    header('location:../admin_dashboard.php');
    $_SESSION['message'] = "Record Successfully Deleted!";
  }else{
    echo "ERROR :".$sqlDeleteRecord."<br>".$conn->error;
  }
  $conn->close();  
?>