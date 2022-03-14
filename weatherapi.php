<?php
// Coords of Santa Ana, Pampanga, Philippines
// https://api.openweathermap.org/data/2.5/onecall?lat=15.1376&lon=120.7118&units=metric&exclude=current,minutely,daily,alerts&appid=55899272efa5cfab3bf05c95327d7e84
//15.1376, 120.7118

$api_key = "55899272efa5cfab3bf05c95327d7e84";
$lat = "15.1376";
$lon = "120.7118";
$unit = "metric";
$exclude = "current,minutely,daily,alerts";
$api_url = "https://api.openweathermap.org/data/2.5/onecall?lat=".$lat."&lon=".$lon."&units=".$unit."&exclude=".$exclude."&appid=".$api_key;

$weather_data = json_decode(file_get_contents($api_url), true);
$current_temp = $weather_data['hourly'][0]['temp'];
$i = 0;

//print_r($weather_data);
?>