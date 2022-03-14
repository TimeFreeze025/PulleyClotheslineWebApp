<?php
  session_start();
	include './plugins.php';
?>

<!--Start of Navbar-->
<nav class="navbar navbar-expand fixed-bottom navbar-light bg-light text-black">
  <ul class="navbar-nav nav-justified w-100">
    <li class="nav-item">
      <a href="./index.php" class="nav-link"><i class="bi bi-house fa-lg text-primary clicked"></i></a>
    </li>
    <li class="nav-item">
      <a href="./weatherUI.php" class="nav-link"><i class="bi bi-plus-circle fa-lg text-primary clicked"></i></a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link"><i class="bi bi-gear fa-lg text-primary clicked"></i></a>
    </li>
  </ul>
</nav>
<!--End of Navbar-->

<!-- Start of Container -->
<p class="py-3 px-3 display-1 text-center page-title">Weather <i class="bi bi-cloud-sun text-white"></i></p>
<div class="container-fluid mt-3">
  <hr>
  <button type="button" class="btn btn-outline-primary btn-lg mb-3 bi bi-plus-circle border float-end"></button>
  <table class="table table-hover table-striped mt-3 text-center">
    <thead>
      <tr>
        <th class="col-md-4 text-primary">Time</th>
        <th class="col-md-4 text-primary">Weather</th>
        <th class="col-md-4 text-primary">+</th>
      </tr>
    </thead>
    <?php
      include './weatherapi.php';
      do {
        $timestamp = $weather_data['hourly'][$i]['dt'];
        $weather_main = $weather_data['hourly'][$i]['weather'][0]['main'];
        $time = gmdate("h:i A", $timestamp + (8*3600));
        $i++;
    ?>
    <tbody>
      <tr>
        <td><?=$time?></td>
        <td><?=$weather_main?></td>
        <td>Icon</td>
      </tr>
    </tbody>
    <?php
      } while ($i <= 12);
    ?>
  </table>
</div>
<!-- End of Container -->

<?php
session_destroy();
?>