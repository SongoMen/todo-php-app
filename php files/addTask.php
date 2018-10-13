<?php

require_once('config.php');
include('session.php');
 
$taskName = $_POST['Task'];
 
$DescriptionText=$_POST['Description'];

$Done=$_POST['Done'];

$sql = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
 
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count==1){
    $sql = "INSERT INTO $user_check(Task, Description, Done) VALUES ('$taskName','$DescriptionText','$Done')";
    $result = mysqli_query($conn, $sql);
    header('Refresh: 1; url=dashboard.php');

}

?>