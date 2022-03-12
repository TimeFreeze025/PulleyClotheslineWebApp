<?php
  require_once './dbcon.php';
  session_start();

  $Lname = $_POST['Lname'];
  $Fname = $_POST['Fname']; 
  $Mname = $_POST['Mname']; 
  $username = $_POST['username']; 
  $password = $_POST['password']; 
  $Type = $_POST['Type'];

  $sqlInsertRecord = "INSERT INTO users(userID, username, password, Fname, Lname, Mname, Type) values(null, '{$username}', '{$password}', '{$Fname}', '{$Lname}', '{$Mname}', '{$Type}')";
  
  if($conn->query($sqlInsertRecord) === TRUE){
    header('location:../admin/admin_dashboard.php');
    $_SESSION['message'] = "Record Successfully Added!";
  }else{
    echo "ERROR :".$sqlInsertRecord."<br>".$conn->error;
  }
  $conn->close();  
?>