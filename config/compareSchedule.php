<?php
  $startTime = date("H:i");

  //display the starting time
  echo '> '.$startTime . "<br>";

  //adding 2 minutes
  $convertedTime = date('H:i', strtotime('+7 hours'));

  //display the converted time
  echo '> '.$convertedTime;
?>