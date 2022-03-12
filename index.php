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
  <p class="h4 my-5">Santa Ana, Pampanga</p>
  <div class="row display-2 fw-bold mb-5">
    <div class="col text-center">30°C</div>
    <div class="col text-center">8:00 AM</div>
  </div>
  <table class="table table-hover table-striped mt-3 text-center table-border">
    <thead>
      <tr>
        <th class="col-md-4 text-primary">Time</th>
        <th class="col-md-4 text-primary">Weather</th>
        <th class="col-md-4 text-primary">+</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>6:00 AM</td>
        <td>Cloudy</td>
        <td>Icon</td>
      </tr>
      <tr>
        <td>12:00 NN</td>
        <td>Rainy</td>
        <td>Sunny</td>
      </tr>
      <tr>
        <td>6:00 PM</td>
        <td>Sunny</td>
        <td>Icon</td>
      </tr>
    </tbody>
  </table>
</div>
<!-- End of Container -->

<?php
session_destroy();
?>