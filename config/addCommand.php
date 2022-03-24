<?php
  session_start();
  require_once './dbcon.php';

  if(isset($_POST['submit'])){
    $timeCommand = $_POST['timeCommand'];
    $userCommand = $_POST['userCommand'];
    //$_COOKIE['user'];

    //echo $_COOKIE['user'];
    $sqlCheckCommand = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' AND timeCommand = '{$timeCommand}'";
    $result = $conn->query($sqlCheckCommand);

    if($result->num_rows > 0){
      $_SESSION['error-message'] = "Time and Command Already Set";
      header("Location:../home.php");
    } else {
      $sqlInsertRecord = "INSERT INTO commands(username, timeCommand, userCommand) values('{$_SESSION['username']}', '{$timeCommand}', '{$userCommand}')";
  
      if($conn->query($sqlInsertRecord) === TRUE){
        $_SESSION['valid-message'] = "Schedule Successfully Added";
        header("Location:../home.php");
      }else{
        echo "ERROR :".$sqlInsertRecord."<br>".$conn->error;
      }
    }
  }
  $conn->close();
?>