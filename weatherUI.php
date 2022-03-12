<?php
  session_start();
	include './plugins.php';
?>

<!--Start of Navbar-->
<nav class="navbar navbar-expand fixed-bottom navbar-light bg-light text-black">
  <ul class="navbar-nav nav-justified w-100">
    <li class="nav-item">
      <a href="./index.php" class="nav-link bi bi-house fa-lg"></a>
    </li>
    <li class="nav-item">
      <a href="./weatherUI.php" class="nav-link bi bi-plus-circle fa-lg"></a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link bi bi-gear fa-lg"></a>
    </li>
  </ul>
</nav>
<!--End of Navbar-->

<!-- Start of Container -->
<p class="py-3 px-3 display-1">Weather <i class="bi bi-cloud-sun"></i></p>
<div class="container-fluid mt-3">
  <hr>
  <button type="button" class="btn btn-light btn-lg mb-3 bi bi-plus-circle  border float-end"></button>
  <table class="table table-hover table-striped table-bordered mt-3 text-center">
    <thead>
      <tr class="text-center">
        <th class="col-md-4">Time</th>
        <th class="col-md-4">Weather</th>
        <th class="col-md-4">+</th>
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