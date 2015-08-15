<?php 
//set the items per page (currently not used);
$item_per_page = 10;
//the host of your database server (usually localhost)
$db_host = "localhost";
//the username allowed to access this server and database
$db_user = "";
//the password for said user
$db_pass = "";
//the name of the database itself
$db_name = "";

//try to connect tot the database
$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
//if it failed, let the user know and kill the script. otherwise continue.
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//select the database we're going to use
mysqli_select_db($con,$db_name);

//search the 'classes' directory for any classes to include (filename should be {yourclassname}.class.php)
foreach (glob("classes/*.class.php") as $filename)
{
	//include the new class
    include($filename);
	//get the name of the class from the filename (note, file name and class name need to be the same. see scammers.class.php for more info);
	$clssnm = basename($filename, ".class.php");
	//dynamically create a new instance of the class we just added. (can be used with $cls_{yourclassname}->{yourvar_orfunc};)
	//note: this also sends the mysql connection to the class. If you do not need to access the db with your class, remove '$con' from the var below.
	${'cls_'.$clssnm } = new $clssnm($con);
}