<?php
  require_once './dbcon.php';

  if(isset($_POST['submit'])){
    echo $_POST['submit'];
    $sensor = "sensorMode";
    $value = $_POST['submit'];
    $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
    if($conn->query($sqlUpdateData) === TRUE){
      header("Location:../settings.php");
    }else{
      echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
    }
  }
  $conn->close();
?>