<?php
  session_start();
	include './config/plugins.php';

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
<!-- <p class="py-3 px-3 display-1 text-center page-title">Weather <i class="bi bi-cloud-sun text-white"></i></p>
<div class="container-fluid mt-3 mx-2">
  <div class="col-6">
    <input type="text" id="txtLatitude" class="form-control form-control-lg mb-4">
    <input type="text" id="txtLongitude" class="form-control form-control-lg mb-4">
  </div>
  <button class="btn btn-primary btn-lg" onclick="getLocation()">Try It</button>
</div> -->

<div class="container-fluid mt-3">
  <p class="display-1 justify-content-start">Settings</p>
  <hr>
  <div class="my-5">
    <p class="display-4 fw-bold"><i class="bi bi-binoculars"></i> Sensors</p>
    <div class="mb-3">
      <span class="h5" style="padding-left: 20px">Rain Sensor: </span>
      <span class="h5 fw-light">Active</span>
    </div>
    <div class="mb-3">
      <span class="h5" style="padding-left: 20px">Smoke Sensor: </span>
      <span class="h5 fw-light">Active</span>
    </div>
  </div>
  <div class="fixed-bottom" style="margin-bottom: 5rem; margin-left: 1rem">
    <a href="./config/userLogin.php" class="btn btn-primary btn-lg">
      <i class="bi bi-box-arrow-right"></i> Logout
    </a>
  </div>
</div>


<!-- End of Container -->

<?php
  //session_destroy();
?>