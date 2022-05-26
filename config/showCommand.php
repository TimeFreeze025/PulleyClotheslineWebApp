<?php
    require_once "dbcon.php";
    $sensor = "command";
    $sqlLoadSensor = "SELECT * FROM data WHERE sensor_type = '{$sensor}'";
    $result = $conn->query($sqlLoadSensor);
    if($result->num_rows > 0){
    while($rowSensor = $result->fetch_assoc()){
        //echo $rowSensor['sensor_type']. ": ".$rowSensor['sensor_value']. "<br>";
        if($rowSensor['sensor_value'] == "IN" || $rowSensor['sensor_value'] == "OUT") {
        $command = $rowSensor['sensor_value'];
        }  else {
        $command = "Error";
        }
        
        // echo "
        //   <div class='mb-3'>
        //     <span class='h5' style='padding-left: 20px'>Pulley Mode: </span>
        //     <span class='h5 fw-light text-primary'>".$pulleyMode."</span> 
        //   </div>
        // ";

        echo $command;
    }
    }
?>