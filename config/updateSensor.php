<?php
  //http://localhost/PULLEYCLOTHESLINEWEBAPP/config/updateSensor.php?water_value={}&smoke_value={}&wifi_strength={}

  require_once './dbcon.php';

  $sensor = "waterSensor";
  $value = $_GET['water_value'];
  $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
  if($conn->query($sqlUpdateData) === TRUE){
    //echo "sucessfully updated";
  }else{
    echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
  }

  $sensor = "smokeSensor";
  $value = $_GET['smoke_value'];
  $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
  if($conn->query($sqlUpdateData) === TRUE){
    //echo "sucessfully updated";
  }else{
    echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
  }

  $sensor = "wifiStrength";
  $value = $_GET['wifi_strength'];
  $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
  if($conn->query($sqlUpdateData) === TRUE){
    //echo "sucessfully updated";
  }else{
    echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
  }

  $sensor = "sensorMode";
  $value = $_GET['sensor_mode'];
  $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
  if($conn->query($sqlUpdateData) === TRUE){
    //echo "sucessfully updated";
  }else{
    echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
  }
  $conn->close();
?>