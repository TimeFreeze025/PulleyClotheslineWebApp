<?php
  session_start();
	include './config/plugins.php';
  require_once "./config/weatherapi.php";
  include "./addCommandModal.php";
  
  if(!isset($_COOKIE['user'])){
    header("Location:./index.php");
  }
?>

<script>
  //Start of Confirm User Action
  function confirmAction() {
    let confirmAction = confirm("Are you to Delete this Schedule?");
    if(confirmAction) {
      alert("Schedule Successfully Deleted!");
    } else {
      alert("Schedule Deletion was Cancelled!");
      event.preventDefault();
    }
  }
  //End of Confirm User Action
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
<p class="py-3 px-3 display-1 text-center page-title">Weather <i class="bi bi-cloud-sun text-white"></i></p>
<div class="container-fluid mt-3">
  <hr>
  <!-- <p class="h1 my-5">Santa Ana, Pampanga</p> -->
  <div class="row display-2 fw-bold my-5">
    <div class="col text-center"><?=$current_temp?>°C</div>
    <div id="runningClock" class="col text-center" name="runningClock"></div>
  </div>
  <!-- <button type="button" class="btn btn-outline-primary btn-lg mb-3 bi bi-plus-circle border float-end w-100 border-2 border-primary"> Add</button> -->
  <table class="table table-hover table-striped mt-3 text-center table-border">
    <p class="display-6 fs-3">Weather Forecast</p>
    <thead>
      <tr>
        <th class="col-md-4 text-primary">Time</th>
        <th class="col-md-4 text-primary">Weather</th>
      </tr>
    </thead>
    <?php
      $prev_weather_main = ""; $i = 0;
      do {
        $timestamp = $weather_data['hourly'][$i]['dt'];
        $weather_main = $weather_data['hourly'][$i]['weather'][0]['main'];
        $homeTime = gmdate("d h:i A", $timestamp + (8*3600));
        if($weather_main != $prev_weather_main) {
    ?>
    <tbody>
      <tr>
        <td><?=$homeTime?></td>
        <td><?=$weather_main?></td>
      </tr>
    </tbody>
    <?php
        }
        $prev_weather_main = $weather_main;
        $i++;
      } while ($i <= 24);
    ?>
  </table>
  <hr class="mt-5">
  <p class="display-6 fs-3">Schedule</p>
  <?php
    if(isset($_SESSION['error-message'])){
      echo "<p class = 'alert alert-danger py-2 text-center'>".$_SESSION['error-message']."</p>";
      unset($_SESSION['error-message']);
    }
    if(isset($_SESSION['valid-message'])){
      echo "<p class = 'alert alert-success py-2 text-center'>".$_SESSION['valid-message']."</p>";
      unset($_SESSION['valid-message']);
    }
  ?>
  <button type="button" class="btn btn-outline-primary btn-lg mb-3 bi bi-plus-circle border float-end w-100 border-2 border-primary" data-bs-toggle="modal" data-bs-target="#addCommand"> Add</button>
  <table class="table table-hover table-striped mt-3 text-center table-border">
    <thead>
      <tr>
        <th class="col-md-4 text-primary">Time</th>
        <th class="col-md-4 text-primary">Command</th>
        <th class="col-md-4 text-primary" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include './config/dbcon.php';
      $sqlLoadCommands = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' ORDER BY timeCommand";
      $result = $conn->query($sqlLoadCommands);
      if($result->num_rows > 0){
        while($rowCommands = $result->fetch_assoc()){
          $time = date("g:i A",strtotime($rowCommands['timeCommand']));
    ?>
    <tbody>
      <tr>
        <td><?=$time?></td>
        <td><?=$rowCommands['userCommand']?></td> 
        <td><a href="" data-bs-toggle="modal" data-bs-target="#editCommand<?=$rowCommands['id']?>"><i class="fa fa-pencil alert-warning bg-transparent"></i></a></td>
        <td><a href="./config/deleteCommand.php/?timeCommand=<?=$rowCommands['timeCommand']?>" onclick="confirmAction()"><i class="fa fa-trash alert-danger bg-transparent"></i></a></td>
      </tr>
    </tbody>
    <?php
          include "./editCommandModal.php";
        }
      }
    ?>
  </table>
</div>
<!-- End of Container -->

<?php
  //session_destroy();
?>