<?php

$city_name = "Sta_Ana";
$api_key = "55899272efa5cfab3bf05c95327d7e84";
$lat = "18.46986";
$lon = "122.147751";
$api_url = "http://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=".$api_key;

$weather_data = file_get_contents($api_url);

print_r($weather_data);

?>