<?php

require_once('config.php');
include('session.php');
 
$taskName = $_POST['Task'];
 
$DescriptionText=$_POST['Description'];

$Done=$_POST['Done'];




    $sql = "INSERT INTO $user_check(Task, Description, Done) VALUES ('$taskName','$DescriptionText','$Done')";
    $result = mysqli_query($conn, $sql);


?>