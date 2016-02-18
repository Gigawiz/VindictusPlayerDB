<?php
/*******************************************************
*  Author: Ben 'Gigawiz' Hubbard                       *
*  Creation Date: 10/31/2015 (mm/dd/yyyy)              *
*  Last Updated On: 10/31/2015 (mm/dd/yyyy)            *
*  License: GPL V3                                     *
*  Website: http://vindictusforums.com                 *
*******************************************************/

/*******************************************************
*			     Script Settings                       *
*******************************************************/
//the host of your database server (usually localhost)
$db_host = "localhost";
//the username allowed to access this server and database
$db_user = "";
//the password for said user
$db_pass = "";
//the name of the database itself
$db_name = "";
//the full url to your website (no trailing slash)
$siteurl = "";

/*******************************************************
*					Main Script                        *
*  Do not edit this unless you know what you're doing  *
*******************************************************/
//connect to the db
$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
//verify connection and error if failed
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
//get all threads available
$sql = "SELECT * FROM `xf_thread`";
//error if failed
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
//get count of threads available
$count = $result->num_rows;
//free the first result
$result->free();
//re-query for a randomly selected thread
$sql_random = "SELECT * FROM `xf_thread` where `thread_id`=".rand(1 ,$count);
//error if failed
if(!$result_random = $db->query($sql_random)){
    die('There was an error running the query [' . $db->error . ']');
}
//set the variables to hold thread information
$postTitle = "";
$postNum = 0;
//set the variables to the information from our newly selected thread
while($row = $result_random->fetch_assoc()){
    $postTitle = $row['title'];
	$postNum = $row['thread_id'];
}
//free the 2nd result
$result_random->free();
//a function to seo the thread string
function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}
//seo the string so it will give a proper link to the thread
$readyurl = $siteurl."/threads/".seoUrl($postTitle).".".$postNum."/";
//echo out the readout
echo '<a href="'.$readyurl.'">'.$postTitle.'</a>';
//close the DB connection
$db->close();
?>
