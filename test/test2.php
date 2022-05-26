<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../css-js/js/push.min.js"></script>
<script src="../css-js/js/push.js"></script>
<script src="../css-js/js/serviceWorker.min.js"></script>

<script>
  navigator.serviceWorker.register('sw.js');
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
      body: "Clothes are In",
      timeout: 10000,
      onClick: function () {
          // window.location.href('../home.php');
          this.close();
      }
    });
    //window.location.replace('../home.php');
  }

  start();
  // window.location.replace('../home.php');
</script>

<a href="javascript:void(0)" onclick="start()">Start</a>
