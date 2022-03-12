<?php
  require_once '../config/dbcon.php';
  session_start();

  $userID = $_POST['userID'];
  $Lname = $_POST['Lname'];
  $Fname = $_POST['Fname']; 
  $Mname = $_POST['Mname']; 
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $Type = $_POST['Type'];
  
  $sqlEditRecord = "UPDATE users SET username = '$username', password = '$password', Fname = '$Fname', Mname = '$Mname', Lname = '$Lname', Type = '$Type' WHERE userID='$userID'";

  if($conn->query($sqlEditRecord) === TRUE){
    header('location:../admin/admin_dashboard.php');
    $_SESSION['message'] = "Record Successfully Updated!";
  }else{
    echo "ERROR :".$sqlEditRecord."<br>".$conn->error;
  }
  $conn->close(); 
?>