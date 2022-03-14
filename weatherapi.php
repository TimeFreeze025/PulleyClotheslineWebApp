<?php

// Santa Ana, Pampanga, Philippines
// https://api.openweathermap.org/data/2.5/onecall?lat=18.46986&lon=122.147751&units=metric&exclude=current,minutely,daily,alerts&appid=55899272efa5cfab3bf05c95327d7e84

$api_key = "55899272efa5cfab3bf05c95327d7e84";
$lat = "18.46986";
$lon = "122.147751";
$unit = "metric";
$exclude = "current,minutely,daily,alerts";
$api_url = "http://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=".$api_key;
$api_url2 = "https://api.openweathermap.org/data/2.5/onecall?lat=".$lat."&lon=".$lon."&units=".$unit."&exclude=".$exclude."&appid=".$api_key;

$weather_data = json_decode(file_get_contents($api_url2), true);

//print_r($weather_data);

for($i = 0; $i <= 10; $i++){
  $temperature = $weather_data['hourly'][$i]['temp'];
  $timestamp = $weather_data['hourly'][$i]['dt'];
  $weather_main = $weather_data['hourly'][$i]['weather'][0]['main'];
  echo gmdate("h:i:s A", $timestamp + (8*3600))." ".$temperature."°C ".$weather_main;
  echo "<br>";
}
?>