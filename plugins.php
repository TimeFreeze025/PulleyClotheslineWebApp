<html>
	<head>
		<title>
		</title>
		<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/myStyle.css">

		<!-- Start of Current Time -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
		<script type="text/javascript">
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
		</script>
		<!-- End of Current Time -->
	</head>
	<body>
	</body>
</html>