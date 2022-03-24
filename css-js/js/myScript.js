//Start of Current Time
$(document).ready(function() {
  setInterval(runningClock, 100);
});
function runningClock() {
  var time = new Date();
  var hrs = time.getHours();
  var min = time.getMinutes();
  var ampm = hrs >= 12 ? 'PM' : 'AM';
  hrs = hrs % 12;
  hrs = hrs ? hrs : 12;
  min = min < 10 ? '0'+min : min;
  document.getElementById('runningClock').innerHTML = hrs + ":" + min + " " + ampm; 
}
//End of Current Time

//Start of Geolocation API
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  }
}
function showPosition(position) {
  document.getElementById('txtLatitude').value = position.coords.latitude;
  document.getElementById('txtLongitude').value = position.coords.longitude;
}
//End of Geolocation API

//Start of disable characters
function blockSpecialChar(e) {
  var k = e.keyCode;
  return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));
}
//End of disable characters

//Start of Confirming Passwords
var check = function() {
  if(((document.getElementById('signupPassword').value == "") || (document.getElementById('signupConfirmPassword').value == "")) || document.getElementById('signupPassword').value == document.getElementById('signupConfirmPassword').value){
    document.getElementById('errorMessage').innerHTML = '';
    document.getElementById("submit").disabled = false;
  } else {
    document.getElementById('errorMessage').innerHTML = 'Passwords Do Not Match';
    document.getElementById("submit").disabled = true;
  }
}
//End of Confirming Passwords

