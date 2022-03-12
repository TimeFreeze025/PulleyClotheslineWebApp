<?php
  $servername = "localhost";
  $username = "root";
  $password = "12252000";
  $dbname = "db_masterlist";

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