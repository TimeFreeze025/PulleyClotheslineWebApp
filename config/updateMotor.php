<?php
  require_once './dbcon.php';

  if(isset($_POST['motor_pwm'])) {
    $sensor = "motor_pwm";
    $value = $_POST['motor_pwm'];
    $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
    if($conn->query($sqlUpdateData) === TRUE){
        //echo "sucessfully updated";
    }else{
        echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
    }
  }
  if(isset($_POST['motor_delay'])) {
    $sensor = "motor_delay";
    $value = $_POST['motor_delay'];
    $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
    if($conn->query($sqlUpdateData) === TRUE){
        //echo "sucessfully updated";
    }else{
        echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
    }
  }
  $conn->close();
?>