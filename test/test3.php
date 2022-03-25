<?php
  include "../config/dbcon.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      setInterval(loadValues, 1000);
    });

    function loadValues() {
      $("#sensor_values").load("test4.php");
    }
  </script>
  <title>Document</title>
</head>
<body>
  <div id="sensor_values">
    <?php
      include "test4.php";
    ?>
  </div>
</body>
</html>