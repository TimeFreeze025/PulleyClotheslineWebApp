<?php
  $army_time_str = "23:00";
  $regular_time_str = date("g:i A",strtotime($army_time_str));
  echo $army_time_str. "&nbsp";
  echo $regular_time_str. "&nbsp";

  $backToReg = date("g:i",strtotime($regular_time_str));
  echo $backToReg;
?>  