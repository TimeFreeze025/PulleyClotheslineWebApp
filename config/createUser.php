<?php
  session_start();
  require_once './dbcon.php';

  if(isset($_POST['submit'])){
    $Fname = $_POST['signupFname'];
    $Lname = $_POST['signupLname'];
    $username = $_POST['signupUsername']; 
    $password = $_POST['signupPassword'];

    $sqlCheck = "SELECT * FROM users WHERE username = '{$username}'";
    $result = $conn->query($sqlCheck);

    if($result->num_rows > 0){
      $_SESSION['error-message'] = "User Already Exists.";
      header("Location:../index.php");
    } else {
      $sqlInsertRecord = "INSERT INTO users(id_number, L_name, F_name, Username, Password) values(null, '{$Lname}', '{$Fname}', '{$username}', '{$password}')";
  
      if($conn->query($sqlInsertRecord) === TRUE){
        $_SESSION['valid-message'] = "Account Successfully Created";
        header("Location:../index.php");
      }else{
        echo "ERROR :".$sqlInsertRecord."<br>".$conn->error;
      }
    }

  } else {
    header("location: ../index.php");
  }
  $conn->close();
?>