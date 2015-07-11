<?php 
$db_host = "localhost";
$db_user = "";
$db_pass = "";
$db_name = "vindictusscamdb";
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,$db_name);