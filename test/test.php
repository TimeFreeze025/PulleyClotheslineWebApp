<?php
  session_start();
	include '../config/plugins.php';
?>

<script>
  $(document).ready(function(){
    setInterval(loadCommands, 1000);
  });

  function loadCommands() {
    $("#load_commands").load("./test4.php");
  }
</script>

<div id="load_commands">
  <?php
    include './test4.php';
  ?>
</div>