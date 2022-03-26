<?php
  require_once 'config/weatherapi.php';
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
      $homeTime = gmdate("d h:i A", $timestamp + (8*3600));
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
  ?>
</table>