<?php
  require_once 'config/weatherapi.php';
  include 'config/dbcon.php';
?>

<table class="table table-hover table-striped mt-3 text-center table-border">
  <p class="display-6 fs-3">Weather Forecast</p>
  <thead>
    <tr>
      <th class="col-md-4 text-primary">Time</th>
      <th class="col-md-4 text-primary">Weather</th>
    </tr>
  </thead>
  <?php
    $prev_weather_main = ""; $i = 0;
    do {
      $timestamp = $weather_data['hourly'][$i]['dt'];
      $weather_main = $weather_data['hourly'][$i]['weather'][0]['main'];
      // $homeTime = gmdate("d h:i A", $timestamp + (8*3600));
      $homeTime = gmdate("h:i A", $timestamp + (8*3600));
      if($weather_main != $prev_weather_main) {
  ?>
  <tbody>
    <tr>
      <td><?=$homeTime?></td>
      <td><?=$weather_main?></td>
    </tr>
  </tbody>
  <?php
      }
      $prev_weather_main = $weather_main;
      $i++;
    } while ($i <= 24);

    //i cannot figure this rn.
    if($weather_data['hourly'][2]['weather'][0]['main'] == "Rain") {
      // $schedTime = gmdate("H:i", $timestamp + (7.5*3600));  //weather api time - 1 (minus 1)
      // echo $schedTime."<br>";

      $time1hr = gmdate("H:i", $weather_data['hourly'][1]['dt'] + (8.5*3600)); 
      echo $time1hr;

      $sqlCheckCommand = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' AND timeCommand = '{$time1hr}'";
      $result = $conn->query($sqlCheckCommand);

      if($result->num_rows > 0){

      } else {
        $sqlInsertRecord = "INSERT INTO commands(username, timeCommand, userCommand) values('{$_COOKIE['user']}', '{$time1hr}', 'Retrieve-In')";
    
        if($conn->query($sqlInsertRecord) === TRUE){

        }else{
          echo "ERROR :".$sqlInsertRecord."<br>".$conn->error;
        }
      }
      // $conn->close();
    }
  ?>
</table>