<?php
  require_once './dbcon.php';

  $sensor = "waterSensor";
  $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
  $result = $conn->query($sqlLoadSensor);
  if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
      //echo $rowSensor['sensor_type']. ": ".$rowSensor['sensor_value']. "<br>";
      if($rowSensor['sensor_value'] == "0") { 
        $waterSensor = "WET";
      } elseif($rowSensor['sensor_value'] == "1") {
        $waterSensor = "DRY";
      } else {
        $waterSensor = "Error";
      }
      echo "Water Sensor: ".$waterSensor."<br>";
    }
  }

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

  $sensor = "wifiStrength";
  $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
  $result = $conn->query($sqlLoadSensor);
  if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
      //echo $rowSensor['sensor_type']. ": ".$rowSensor['sensor_value']. "<br>";
      if(intval($rowSensor['sensor_value']) >= -60) {
        $wifiStrength = "Excellent";
      } elseif(intval($rowSensor['sensor_value']) <= -61 && intval($rowSensor['sensor_value']) >= -75) {
        $wifiStrength = "Good";
      } elseif(intval($rowSensor['sensor_value']) <= -76 && intval($rowSensor['sensor_value']) >= -80) {
        $wifiStrength = "Fair";
      } elseif(intval($rowSensor['sensor_value']) <= -81 && intval($rowSensor['sensor_value']) >= -89) {
        $wifiStrength = "Bad";
      } elseif(intval($rowSensor['sensor_value']) <= -90) {
        $wifiStrength = "Very Bad";
      } else {
        $wifiStrength = "No Connection";
      }
      echo "Wifi Values: ".$rowSensor['sensor_value']."<br>";
      echo "Wifi Strength: ".$wifiStrength. "<br>";
    }
  }
  $conn->close();

  header("Refresh:0");
?>