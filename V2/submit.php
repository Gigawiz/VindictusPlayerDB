<?php
include('config.php');
if($con->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}
if (empty($_GET) || !isset($_GET))
{
	die("Nothing passed in!");
}
if (!isset($_GET['scmtyp']) || empty($_GET['scmtyp']) || $_GET['scmtyp'] == "")
{
	die("Invalid or Empty Scam Type Detected!");
}
if (!isset($_GET['ign']) || empty($_GET['ign']) || $_GET['ign'] == "")
{
	die("Invalid or Empty Scammer Character Name!");
}	
if (!isset($_GET['server']) || empty($_GET['server']) || $_GET['server'] == "")
{
	die("Invalid or Empty Server Detected!");
}
if (!isset($_GET['charnm']) || empty($_GET['charnm']) || $_GET['charnm'] == "")
{
	die("Invalid or Empty Character Name! Please note you <i>must</i> submit your character name in case we should need to contact you about this person!");
}
$ip = getIpAddress();
if (!isset($ip) || empty($ip) || $ip == "")
{
	die("A System Error is preventing new submissions at this time! Please try again later.");
}
$scammer_name = $con->escape_string($_GET['ign']);
$group_name = "Vindictus Scam DB";
$amtscmd = "Unknown";
if ($_GET['scamamt'] != "")
{
	$amtscmd = $con->escape_string($_GET['scamamt']);
}
$scammer_alts = $con->escape_string($_GET['alts']);
$scamtype = $con->escape_string($_GET['scmtyp']);
$screen_shot_link = $con->escape_string($_GET['sslinks']);
$vindi_server = $con->escape_string($_GET['server']);
$status = "Under Investigation";
$submitted_by = $con->escape_string($_GET['charnm']);
$notes_cln = "";
if ($_GET['notes'] != "Enter your story of how you were scammed or any notes here." || $_GET['notes'] != "")
{
	$notes_cln = $con->escape_string($_GET['notes']);
}
$scammer_skype = $con->escape_string($_GET['skype']);
$submitter_ip = $ip;

$statment = "INSERT INTO `submissions` (`ign`, `amt_scmd`, `alt_chrs`, `violation`, `screenshots`, `server`, `status`, `reported_by`, `report_display_group`, `notes`, `skype`, `submission_ip`) VALUES ('".$scammer_name."','".$amtscmd."','".$scammer_alts."','".$scamtype."','".$screen_shot_link."','".$vindi_server."','".$status."','".$submitted_by."','".$group_name."','".$notes_cln."','".$scammer_skype."','".$submitter_ip."')";

if(!$result = $con->query($statment)){
    die('There was an error running the query [' . $db->error . ']');
}
echo "Successfully Reported ".$_GET['ign'];
$con->close();
?>