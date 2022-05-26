<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pulley_list";

  //dbusername: id18681539_root
  //dbpassword: L(0-n~u{l!kX(JJ[

  //create a database connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  //Check the connection
  if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
  }else{
    //echo "Database Connection Completed";
  }

  //$conn->close(); closes db connection

?>