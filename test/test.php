<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      setInterval(weatherAPI, 10);
    });

    function weatherAPI() {
      $.getJSON("https://api.openweathermap.org/data/2.5/onecall?lat=15.1376&lon=120.7118&units=metric&exclude=current,hourly,daily,alerts&appid=55899272efa5cfab3bf05c95327d7e84",function(result){
      //alert("City: "+result.timezone);
        document.getElementById("timezone").innerHTML = "City: "+result.timezone;
        for (let i = 0; i < 12; i++) {
          document.getElementById("weather").innerHTML = "Weather: "+ result.minutely[i].dt;
        }
        //alert("Weather: "+ result.list[0].weather[0].description);
      });
    }
</script>

<p id="weatherAPI"></p>