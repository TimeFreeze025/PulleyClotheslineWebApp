<?php
  session_start();
	include '../config/plugins.php';
?>

<script>
  $(document).ready(function(){
    setInterval(loadWeather, 1800000);
  });

  function loadWeather() {
    $("#load_weather").load("../weatherTable.php");
  }
</script>

<div id="load_weather">
  <?php
    include '../weatherTable.php';
  ?>
</div>