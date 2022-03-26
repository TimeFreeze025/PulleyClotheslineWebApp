<?php
  require_once "dbcon.php";

  $sensor = "sensorMode";
  $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
  $result = $conn->query($sqlLoadSensor);
  if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
      //echo $rowSensor['sensor_type']. ": ".$rowSensor['sensor_value']. "<br>";
      if($rowSensor['sensor_value'] == "1") {
        $sensorMode = "ACTIVATED";
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

            echo "
              <div class='mb-3'>
                <span class='h5' style='padding-left: 20px'>Rain Sensor: </span>
                <span class='h5 fw-light text-primary'>".$waterSensor."</span> 
              </div>
            ";
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
            
            echo "
              <div class='mb-3'>
                <span class='h5' style='padding-left: 20px'>Smoke Sensor: </span>
                <span class='h5 fw-light text-primary'>".$smokeSensor."</span> 
              </div>
            ";
          }
        }
      } elseif ($rowSensor['sensor_value'] == "0"){
        $sensorMode = "DEACTIVATED";
        echo "
          <div class='mb-3'>
            <span class='h5' style='padding-left: 20px'>Rain Sensor: </span>
            <span class='h5 fw-light text-primary'>".$sensorMode."</span> 
          </div>
          <div class='mb-3'>
            <span class='h5' style='padding-left: 20px'>Smoke Sensor: </span>
            <span class='h5 fw-light text-primary'>".$sensorMode."</span> 
          </div>
        ";
        
      }
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
      echo "
        <div class='mb-3'>
          <span class='h5' style='padding-left: 20px'>Wifi Values: </span>
          <span class='h5 fw-light text-primary'>".$rowSensor['sensor_value']."</span> 
        </div>
        <div class='mb-3'>
          <span class='h5' style='padding-left: 20px'>Wifi Strength: </span>
          <span class='h5 fw-light text-primary'>".$wifiStrength."</span> 
        </div>
      ";
    }
  }

  $sensor = "pulleyMode";
  $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
  $result = $conn->query($sqlLoadSensor);
  if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
      //echo $rowSensor['sensor_type']. ": ".$rowSensor['sensor_value']. "<br>";
      if($rowSensor['sensor_value'] == "IN" || $rowSensor['sensor_value'] == "OUT") {
        $pulleyMode = $rowSensor['sensor_value'];
      }  else {
        $pulleyMode = "Error";
      }
      
      echo "
        <div class='mb-3'>
          <span class='h5' style='padding-left: 20px'>Pulley Mode: </span>
          <span class='h5 fw-light text-primary'>".$pulleyMode."</span> 
        </div>
      ";
    }
  }

  $sensor = "sensorMode";
  $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
  $result = $conn->query($sqlLoadSensor);
  if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
      //echo $rowSensor['sensor_type']. ": ".$rowSensor['sensor_value']. "<br>";
      if($rowSensor['sensor_value'] == "1") {
        $sensorMode = "ACTIVATED";
      } elseif ($rowSensor['sensor_value'] == "0"){
        $sensorMode = "DEACTIVATED";
      } else {
        $sensorMode = "Error";
      }
      
      echo "
        <div class='mb-5'>
          <span class='h5' style='padding-left: 20px'>Sensors: </span>
          <span class='h5 fw-light text-primary'>".$sensorMode."</span> 
        </div>
      ";
    }
  }
  $conn->close();
?>