<?php
  // Coords of Santa Ana, Pampanga, Philippines
  // https://api.openweathermap.org/data/2.5/onecall?lat=15.1376&lon=120.7118&units=metric&exclude=current,minutely,daily,alerts&appid=10e8d82114cc630c90ac8a9031302134
  //10e8d82114cc630c90ac8a9031302134
  //55899272efa5cfab3bf05c95327d7e84
  //15.1376, 120.7118

  include 'dbcon.php';

  $sqlGetCoords = "SELECT Latitude, Longitude FROM users WHERE username = '{$_COOKIE['user']}'";
  $result = $conn->query($sqlGetCoords);

  if($result->num_rows > 0){
    $rowCoords = $result->fetch_assoc();
    $lat = $rowCoords['Latitude'];
    $lon = $rowCoords['Longitude'];
  }
  //$conn->close();

  $api_key = "55899272efa5cfab3bf05c95327d7e84";
  $unit = "metric";
  $exclude = "current,minutely,daily,alerts";
  $api_url = "https://api.openweathermap.org/data/2.5/onecall?lat=" .$lat. "&lon=" .$lon. "&units=" .$unit. "&exclude=" .$exclude. "&appid=" .$api_key;

  $weather_data = json_decode(file_get_contents($api_url), true);
  $current_temp = $weather_data['hourly'][0]['temp'];
  //$i = 0;

  //print_r($weather_data);
?>