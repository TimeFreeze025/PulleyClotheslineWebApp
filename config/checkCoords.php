<?php
  session_start();
  include 'dbcon.php';

  $user = $_SESSION['username'];
  $sqlCheckCoords = "SELECT Latitude, Longitude FROM users WHERE username = '{$user}'";
  $result = $conn->query($sqlCheckCoords);
  $rowCoords = $result->fetch_assoc();
  if(empty($rowCoords['Latitude']) && empty($rowCoords['Longitude'])) {
    header("location:./getCoords.php");
  } else {
    setcookie("user", $user, time()+3600*24*30, '/');
    $_SESSION['Lat'] = $rowCoords['Latitude']; 
    $_SESSION['Lon'] = $rowCoords['Longitude']; 
    header("Location:../home.php");
  }
  $conn->close();
?>