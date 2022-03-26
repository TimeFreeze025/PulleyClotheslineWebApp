<?php
  require_once './dbcon.php';

  if(isset($_POST['submit'])){
    $sensor = "pulleyMode";
    $value = $_POST['submit'];
    $sqlUpdateData = "UPDATE data SET sensor_value = '{$value}' WHERE sensor_type = '{$sensor}'";
    if($conn->query($sqlUpdateData) === TRUE){
      //echo "sucessfully updated";
      header("Location:../settings.php");
    }else{
      echo "ERROR :".$sqlUpdateData."<br>".$conn->error;
    }
  }
  $conn->close();
?>