<?php
  session_start();
  require_once './dbcon.php';
  date_default_timezone_set('Asia/Manila');

  if(isset($_POST['submit'])){
    $userID = $_POST['userID'];
    $timeCommand = $_POST['timeCommand'];
    $userCommand = $_POST['userCommand'];
    $currentTime = date('H:i', time());
    if($timeCommand <= $currentTime){
      $_SESSION['error-message'] = "Please Set Time in Future";
      header("Location:../home.php");
    } else {
      $sqlUpdateCommand = "UPDATE commands SET timeCommand = '{$timeCommand}', userCommand = '{$userCommand}' WHERE id = '{$userID}'";

      if($conn->query($sqlUpdateCommand) === TRUE){
        header('location:../home.php');
        $_SESSION['valid-message'] = "Schedule Successfully Updated!";
      }else{
        echo "ERROR :".$sqlUpdateCommand."<br>".$conn->error;
      }
    }
  }
  $conn->close();
?>