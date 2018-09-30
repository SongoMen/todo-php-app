<?php

require_once('config.php');
include('session.php');
 
$number=$_POST['klucz_ajax'];

$taskName = $_POST['Task'];
 

$sql = "UPDATE $user_check SET Done='$number' WHERE Task = '$taskName'";
 

$result = mysqli_query($conn, $sql);
?>