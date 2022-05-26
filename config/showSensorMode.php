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
      } elseif ($rowSensor['sensor_value'] == "0"){
        $sensorMode = "DEACTIVATED";
      } else {
        $sensorMode = "Error";
      }
      
      // echo "
      //   <div class='mb-5'>
      //     <span class='h5 fw-light text-primary'>".$sensorMode."</span> 
      //   </div>
      // ";
      echo $sensorMode;
    }
  }
  $conn->close();
?>