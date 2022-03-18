<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!DOCTYPE html>
<html>
<body>
  <p>Click the button to get your coordinates.</p>
  <input type="text" id="txtLatitude">
  <input type="text" id="txtLongitude">
  <button onclick="getLocation()">Try It</button>

  <script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      }
    }
    function showPosition(position) {
      document.getElementById('txtLatitude').value = position.coords.latitude;
      document.getElementById('txtLongitude').value = position.coords.longitude;
    }
  </script>

</body>
</html>

</body>
</html>