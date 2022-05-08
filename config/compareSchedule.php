<?php
  ignore_user_abort(TRUE);
  set_time_limit(86400);
  //ob_start();
  date_default_timezone_set('Asia/Manila');
  // require_once '../test/test2.php';
  include 'dbcon.php';
  $schedule_time = array();
  $i = 0;
  //$sqlLoadCommands = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' ORDER BY timeCommand";
  $sqlLoadCommands = "SELECT * FROM commands ORDER BY timeCommand";
  $result = $conn->query($sqlLoadCommands);
  if($result->num_rows > 0){
      while($rowCommands = $result->fetch_assoc()){
        $schedule_time[$i] = $rowCommands['timeCommand'];
        $i++;
      }
  }
  $currentTime = date('H:i', time());
  if(isset($schedule_time[0])) {
    if($schedule_time[0] === $currentTime){
      //$sqlDeleteCommand = "DELETE FROM commands WHERE username = '{$_COOKIE['user']}' AND timeCommand = '{$schedule_time[0]}'";
      header("Location:./test/test2.php");
      // require_once './test/test2.php';
      $sqlDeleteCommand = "DELETE FROM commands WHERE timeCommand = '{$schedule_time[0]}'";
      if($conn->query($sqlDeleteCommand) === TRUE){
    
      }else{
      echo "ERROR :".$sqlDeleteCommand."<br>".$conn->error;
      }
    }
  }
  $conn->close();
  //ob_end_flush();
?>