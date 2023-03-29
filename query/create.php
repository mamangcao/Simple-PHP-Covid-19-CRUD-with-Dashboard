<?php 
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'covid');

if(isset($_POST['insertdata'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $mobile_no = $_POST['mobile_no'];
    $body_temp = $_POST['body_temp'];
    $diagnosed = $_POST['diagnosed'];
    $encounter = $_POST['encounter'];
    $vaccinated = $_POST['vaccinated'];
    $nationality = $_POST['nationality'];

    $query = "INSERT INTO declaration (`name`, `gender`, `age`, `mobile_no`, `body_temp`, `diagnosed`, `encounter`, `vaccinated`, `nationality`)
    VALUES ('$name', '$gender', '$age', '$mobile_no', '$body_temp', '$diagnosed', '$encounter', '$vaccinated', '$nationality')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Successfully Added!";
        header("location: ../covid_hd.php");
    }
    else
    {
        echo "Something went wrong!";
    }
}

?>