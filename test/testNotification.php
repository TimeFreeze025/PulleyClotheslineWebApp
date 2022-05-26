<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../css-js/js/push.min.js"></script>
<script src="../css-js/js/push.js"></script>
<script src="../css-js/js/serviceWorker.min.js"></script>

<script>
  navigator.serviceWorker.register('../css-js/js/sw.js');
  Notification.requestPermission(function(result) {
    if (result !== 'granted') {
      Notification.requestPermission();
    }
    // if (result === 'granted') {
    //   navigator.serviceWorker.ready.then(function(registration) {
    //     registration.showNotification('Notification with ServiceWorker');
    //   });
    // }
  });
  function start() {
    Push.create("Hello world!", {
      body: "Good Morning",
      timeout: 10000,
      onClick: function () {
          window.focus();
          this.close();
      }
    });
  }
  start();
</script>

<a href="javascript:void(0)" onclick="start()">Start</a>