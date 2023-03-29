<?php
  session_start();
  ob_start();
  $connection = mysqli_connect("localhost","root","", "covid");
 
  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $mobile_no = $_POST['mobile_no'];
    $body_temp = $_POST['body_temp'];
    $diagnosed = $_POST['diagnosed'];
    $encounter = $_POST['encounter'];
    $vaccinated = $_POST['vaccinated'];
    $nationality = $_POST['nationality'];
 
    mysqli_query($connection, "UPDATE `declaration` SET `name` = '$name', `gender` = '$gender', `age` = '$age', `mobile_no` = '$mobile_no',
    `body_temp` = '$body_temp', `diagnosed` = '$diagnosed', `encounter` = '$encounter', `vaccinated` = '$vaccinated', `nationality` = '$nationality' WHERE `id` = '$id'");

     $_SESSION['status'] = "Data Successfully Updated!";
     header("location: ../covid_hd.php");
  }
