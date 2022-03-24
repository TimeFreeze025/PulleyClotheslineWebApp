<?php
  session_start();
  require_once './dbcon.php';

  if(isset($_POST['submit'])){

    $userID = $_POST['userID'];
    $timeCommand = $_POST['timeCommand'];
    $userCommand = $_POST['userCommand'];

    $sqlUpdateCommand = "UPDATE commands SET timeCommand = '{$timeCommand}', userCommand = '{$userCommand}' WHERE id = '{$userID}'";

    if($conn->query($sqlUpdateCommand) === TRUE){
      header('location:../home.php');
      $_SESSION['valid-message'] = "Schedule Successfully Updated!";
    }else{
      echo "ERROR :".$sqlUpdateCommand."<br>".$conn->error;
    }
  }
  $conn->close();
?>