<?php
  session_start();
	include './config/plugins.php';

  if(!isset($_COOKIE['user'])){
    header("Location:./index.php");
  }
?>

<script>
  $(document).ready(function(){
    setInterval(loadValues, 1000);
  });

  function loadValues() {
    $("#sensor_values").load("./config/showSensor.php");
  }
</script>

<!--Start of Navbar-->
<nav class="navbar navbar-expand fixed-bottom navbar-light bg-light text-black">
  <ul class="navbar-nav nav-justified w-100">
    <li class="nav-item">
      <a href="./home.php" class="nav-link"><i class="bi bi-house fa-lg text-primary clicked"></i></a>
    </li>
    <!-- <li class="nav-item">
      <a href="./weatherUI.php" class="nav-link"><i class="bi bi-plus-circle fa-lg text-primary clicked"></i></a>
    </li> -->
    <li class="nav-item">
      <a href="./settings.php" class="nav-link"><i class="bi bi-gear fa-lg text-primary clicked"></i></a>
    </li>
  </ul>
</nav>
<!--End of Navbar-->

<!-- Start of Container -->
<div class="container-fluid mt-3">
  <p class="display-1 justify-content-start">Settings</p>
  <hr>
  <p class="display-4 fw-bold mt-4">Sensors</p>
  <div class="my-3" id="sensor_values">
    <?php
      include './config/showSensor.php';
    ?>
  </div>
  <div class="fixed-bottom container-fluid mb-5">
    <a href="./config/userLogout.php" class="btn btn-outline-primary btn-lg mb-3 border border-2 border-primary w-100"><i class="bi bi-box-arrow-right"></i> Logout</a>
  </div>
</div>
<!-- End of Container -->

<?php
  //session_destroy();
?>