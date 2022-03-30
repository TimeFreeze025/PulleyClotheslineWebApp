<?php
  session_start();
  require_once './dbcon.php';
  date_default_timezone_set('Asia/Manila');
  
  if(isset($_POST['submit'])){
    $timeCommand = $_POST['timeCommand'];
    $userCommand = $_POST['userCommand'];
    $currentTime = date('H:i', time());
    if($timeCommand <= $currentTime){
      $_SESSION['error-message'] = "Please Set Time in Future";
      header("Location:../home.php");
    } else {
      $sqlCheckCommand = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' AND timeCommand = '{$timeCommand}'";
      $result = $conn->query($sqlCheckCommand);

      if($result->num_rows > 0){
        $_SESSION['error-message'] = "Time and Command Already Set";
        header("Location:../home.php");
      } else {
        $sqlInsertRecord = "INSERT INTO commands(username, timeCommand, userCommand) values('{$_COOKIE['user']}', '{$timeCommand}', '{$userCommand}')";
    
        if($conn->query($sqlInsertRecord) === TRUE){
          $_SESSION['valid-message'] = "Schedule Successfully Added";
          header("Location:../home.php");
        }else{
          echo "ERROR :".$sqlInsertRecord."<br>".$conn->error;
        }
      }
    }
  }
  $conn->close();
?>