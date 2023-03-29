<?php
  $conn = mysqli_connect("localhost", "root", "", "covid");
 
  if(!$conn){
    die("Error: Failed to connect to database!");
  }
?>