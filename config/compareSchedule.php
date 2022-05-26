<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./css-js/js/push.min.js"></script>
<script src="./css-js/js/push.js"></script>
<script src="./css-js/js/serviceWorker.min.js"></script>

<?php
  ignore_user_abort(TRUE);
  set_time_limit(86400);
  //ob_start();
  date_default_timezone_set('Asia/Manila');
  // require_once '../test/test2.php';
  include 'dbcon.php';
  $schedule_time = array();
  $i = 0;
  //$sqlLoadCommands = "SELECT * FROM commands WHERE username = '{$_COOKIE['user']}' ORDER BY timeCommand";
  $sqlLoadCommands = "SELECT * FROM commands ORDER BY timeCommand";
  $result = $conn->query($sqlLoadCommands);
  if($result->num_rows > 0){
      while($rowCommands = $result->fetch_assoc()){
        $schedule_time[$i] = $rowCommands['timeCommand'];
        $user_command[$i] = $rowCommands['userCommand'];
        $i++;
      }
  }
  //echo $user_command[0];
  $currentTime = date('H:i', time());
  if(isset($schedule_time[0])) {
    if($schedule_time[0] === $currentTime){
      //$sqlDeleteCommand = "DELETE FROM commands WHERE username = '{$_COOKIE['user']}' AND timeCommand = '{$schedule_time[0]}'";
      //header("Location:./test/test2.php");
      // require_once './test/test2.php';
?>

      <script>
        navigator.serviceWorker.register('./css-js/js/sw.js');
        Notification.requestPermission(function(result) {
          if (result !== 'granted') {
            Notification.requestPermission();
          }
          if (result === 'granted') {
            navigator.serviceWorker.ready.then(function(registration) {
              // registration.showNotification('Notification with ServiceWorker');
            });
          }
        });
        function start() {
          Push.create("PulleyClothesline", {
            body: "Clothes are <?=$user_command[0]?>",
            timeout: 10000,
            onClick: function () {
                window.location.href('../home.php');
                this.close();
            }
          });
        }
        start();
      </script>

<?php
      $sqlDeleteCommand = "DELETE FROM commands WHERE timeCommand = '{$schedule_time[0]}'";
      if($conn->query($sqlDeleteCommand) === TRUE){
    
      }else{
      echo "ERROR :".$sqlDeleteCommand."<br>".$conn->error;
      }
    }
  }
  $conn->close();
  //ob_end_flush();
?>