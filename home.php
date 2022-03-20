<?php
  session_start();
	include './config/plugins.php';
  require_once "./config/weatherapi.php";
  
  if(!isset($_COOKIE['user'])){
    header("Location:./index.php");
  }
?>

<!--Start of Navbar-->
<nav class="navbar navbar-expand fixed-bottom navbar-light bg-light text-black">
  <ul class="navbar-nav nav-justified w-100">
    <li class="nav-item">
      <a href="./home.php" class="nav-link"><i class="bi bi-house fa-lg text-primary clicked"></i></a>
    </li>
    <li class="nav-item">
      <a href="./weatherUI.php" class="nav-link"><i class="bi bi-plus-circle fa-lg text-primary clicked"></i></a>
    </li>
    <li class="nav-item">
      <a href="./settings.php" class="nav-link"><i class="bi bi-gear fa-lg text-primary clicked"></i></a>
    </li>
  </ul>
</nav>
<!--End of Navbar-->

<!-- Start of Container -->
<!-- <div class="container-fluid mt-3">
  <p class="mb-3 display-1">Weather</p>
  <hr>
  <p class="h4 my-2">Santa Ana, Pampanga</p>
  <div class="card">
    <div class="card-header display-6">4:00 AM</div>
    <div class="card-body display-2">30° C</div>
  </div>
</div> -->
<p class="py-3 px-3 display-1 text-center page-title">Weather <i class="bi bi-cloud-sun text-white"></i></p>
<div class="container-fluid mt-3">
  <hr>
  <p class="h1 my-5">Santa Ana, Pampanga</p>
  <div class="row display-2 fw-bold mb-5">
    <div class="col text-center"><?=$current_temp?>°C</div>
    <div id="runningClock" class="col text-center"></div>
  </div>
  <table class="table table-hover table-striped mt-3 text-center table-border">
    <thead>
      <tr>
        <th class="col-md-4 text-primary">Time</th>
        <th class="col-md-4 text-primary">Weather</th>
        <th class="col-md-4 text-primary">+</th>
      </tr>
    </thead>
    <?php
      $prev_weather_main = "";
      do {
        $timestamp = $weather_data['hourly'][$i]['dt'];
        $weather_main = $weather_data['hourly'][$i]['weather'][0]['main'];
        $homeTime = gmdate("h:i A", $timestamp + (8*3600));
        if($weather_main != $prev_weather_main) {
    ?>
    <tbody>
      <tr>
        <td><?=$homeTime?></td>
        <td><?=$weather_main?></td>
        <td>Icon</td>
      </tr>
    </tbody>
    <?php
        }
        $prev_weather_main = $weather_main;
        $i++;
      } while ($i <= 16);
    ?>
  </table>
</div>
<!-- End of Container -->

<?php
  //session_destroy();
?>