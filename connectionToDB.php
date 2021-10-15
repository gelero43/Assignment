<?php

function makeConnection(){
  
  $servername = "candidaterds.n2g-dev.net";
  $username = "your username";
  $password = "your password";
  $dbname ="cand_3aqt";

  $conn = new mysqli($servername, $username, $password,$dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  return $conn;
}


