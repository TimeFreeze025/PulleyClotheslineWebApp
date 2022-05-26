<?php
  require_once "dbcon.php";

  $sensor = "motor_delay";
  $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
  $result = $conn->query($sqlLoadSensor);
  if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
      $value = $rowSensor['sensor_value'];
      echo $value;
    }
  }
  $conn->close();
?>