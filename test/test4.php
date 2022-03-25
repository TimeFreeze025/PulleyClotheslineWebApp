<?php
  include "../config/dbcon.php";

  $sensor = "smokeSensor";
  $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
  $result = $conn->query($sqlLoadSensor);
  if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
      //echo $rowSensor['sensor_type']. ": ".$rowSensor['sensor_value']. "<br>";
      if($rowSensor['sensor_value'] == "") {
        $smokeSensor = "Error";
      } else {
        $smokeSensor = $rowSensor['sensor_value'];
      }
      echo "Smoke Sensor: ".$smokeSensor. "<br>";
    }
  }
  $conn->close();
?>