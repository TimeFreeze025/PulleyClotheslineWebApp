<?php
  session_start();
	include './plugins.php';
?>


<body onload="getLocation()">
  <form action="./getCoords.php" method="post">
    <input type="text" id="txtLatitude" name="txtLatitude" hidden>
    <input type="text" id="txtLongitude" name="txtLongitude" hidden>
    <div class="mt-5 container-fluid">
      <div class="row">
          <div class="d-flex justify-content-center">
            <p class="h5 my-5 col-8 text-center">Allow Location Services and Proceed to Web App</p>
          </div>
      </div>
      <div class="row">
          <div class="d-flex justify-content-center">
            <button type="submit" name="submit" class="btn btn-primary btn-lg col-4" style="border-radius: 2rem;">OK</button>
          </div>
      </div>
    </div>
  </form>

  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
      }
    }
    function successFunction(position) {
      document.getElementById('txtLatitude').value = position.coords.latitude;
      document.getElementById('txtLongitude').value = position.coords.longitude;
    }
    function errorFunction() {
      alert("To use this web application, Please First Turn On Location Services, and Allow Location Services");
      location.reload();
    }
  </script>
</body>

<?php
  include './dbcon.php';

  if(isset($_POST['submit'])){
    if($_POST['txtLatitude'] != "" && $_POST['txtLongitude'] != ""){
      $Lat = $_POST['txtLatitude'];
      $Lon = $_POST['txtLongitude'];
      $sqlInsertCoords = "UPDATE users SET Latitude = '{$Lat}', Longitude = '{$Lon}' WHERE Username = '{$_SESSION['username']}'";
      if($conn->query($sqlInsertCoords) === TRUE){
        setcookie("user", $_SESSION['username'], time()+3600*24*30, '/');
        header("Location:../index.php");
      }else{
        echo "ERROR :".$sqlInsertCoords."<br>".$conn->error;
      }
    } else {
      header("Location:./getCoords.php");
    }
  }
  $conn->close();
?>