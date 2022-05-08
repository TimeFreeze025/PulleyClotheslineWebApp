//mynotif.js 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
 checknotif();
 setInterval(function(){ checknotif(); }, 500);
});
function checknotif() {
 if (!Notification) {
  $('body').append("<h4 style='color:red'>*Browser does not support Web Notification</h4>");
  return;
 }
 if (Notification.permission !== "granted")
  Notification.requestPermission();
};
</script>