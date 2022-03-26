<?php
  include 'dbcon.php';

  $schedule_time = array();
  $i = 0;
  $sqlLoadCommands = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' ORDER BY timeCommand";
  $result = $conn->query($sqlLoadCommands);
  if($result->num_rows > 0){
    while($rowCommands = $result->fetch_assoc()){
      $schedule_time[$i] = $rowCommands['timeCommand'];
      $i++;
    }
  }
  $currentTime = date('H:i', strtotime('+7 hours'));
  if($schedule_time[0] === $currentTime){
    //echo "Equal Time ".$schedule_time[0]." ".$currentTime;
    $sqlDeleteCommand = "DELETE FROM commands WHERE username = '{$_COOKIE['user']}' AND timeCommand = '{$schedule_time[0]}'";
    if($conn->query($sqlDeleteCommand) === TRUE){
      // header("Location:../../home.php");
      //echo "deleted successfully";
      
    }else{
      echo "ERROR :".$sqlDeleteCommand."<br>".$conn->error;
    }
  }
  $conn->close();
?>