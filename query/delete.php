<?php
session_start();

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'covid');

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM declaration WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Successfully Deleted!";
        header("location: ../covid_hd.php");
    }
    else
    {
        echo "Something went wrong!";
    }
}

?>