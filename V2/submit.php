<?php
include('config.php');
if($con->connect_errno > 0){
	die('Unable to connect to database [' . $con->connect_error . ']');
}
if (empty($_POST) || !isset($_POST))
{
	die("Nothing passed in!");
}
if (!isset($_POST['scmtyp']) || empty($_POST['scmtyp']) || $_POST['scmtyp'] == "")
{
	die("Invalid or Empty Scam Type Detected!");
}
if (!isset($_POST['ign']) || empty($_POST['ign']) || $_POST['ign'] == "")
{
	die("Invalid or Empty Scammer Character Name!");
}	
if (!isset($_POST['server']) || empty($_POST['server']) || $_POST['server'] == "")
{
	die("Invalid or Empty Server Detected!");
}
if (!isset($_POST['charnm']) || empty($_POST['charnm']) || $_POST['charnm'] == "")
{
	die("Invalid or Empty Character Name! Please note you <i>must</i> submit your character name in case we should need to contact you about this person!");
}
$ip = getIpAddress();
if (!isset($ip) || empty($ip) || $ip == "")
{
	die("A System Error is preventing new submissions at this time! Please try again later.");
}
$scammer_name = $con->escape_string($_POST['ign']);
$group_name = "Vindictus Scam DB";
$amtscmd = "Unknown";
if ($_POST['amtlst'] != "")
{
	$amtscmd = $con->escape_string($_POST['amtlst']);
}
$scammer_alts = $con->escape_string($_POST['alts']);
$scamtype = $con->escape_string($_POST['scmtyp']);
$screen_shot_link = $con->escape_string($_POST['sslink']);
$vindi_server = $con->escape_string($_POST['server']);
$status = "Under Investigation";
$submitted_by = $con->escape_string($_POST['charnm']);
$notes_cln = "";
if ($_POST['notes'] != "Enter your story of how you were scammed or any notes here." || $_POST['notes'] != "")
{
	$notes_cln = $con->escape_string($_POST['notes']);
}
$scammer_skype = $con->escape_string($_POST['skype']);
$submitter_ip = $ip;
$email = "";
if (!empty($_POST['email']) && isset($_POST['email']))
{
	$email = $con->escape_string($_POST['email']);
}

$statment = "INSERT INTO `submissions` (`ign`, `amt_scmd`, `alt_chrs`, `violation`, `screenshots`, `server`, `status`, `reported_by`, `report_display_group`, `notes`, `skype`, `submission_ip`, `submitter_email`) VALUES ('".$scammer_name."','".$amtscmd."','".$scammer_alts."','".$scamtype."','".$screen_shot_link."','".$vindi_server."','".$status."','".$submitted_by."','".$group_name."','".$notes_cln."','".$scammer_skype."','".$submitter_ip."', '".$email."')";

if(!$result = $con->query($statment)){
    die('There was an error running the query [' . $con->error . ']');
}
if (!empty($email) && isset($email))
{
	$emailsent = sendEmail("reports@vindictusscamdb.com", $_POST['email'], "Successfully reported ".$_POST['ign']." to the Vindictus Scam DB!", "Hello ".$submitted_by.",
The user you have reported has been marked for investigation. 
We will be reviewing your submission as soon as possible and taking the appropriate action. Here are the details of the user you submitted:

Report Type: ".$scamtype."
Player Name: ".$scammer_name."
Amount/Items Lost (if any/known): ".$amtscmd."
Server: ".$vindi_server."
Screenshot Links: ".$screen_shot_link."
Status: Currently ".$status."
Scammer's Skype Nickname (if known): ".$scammer_skype."
Notes: ".$notes_cln."

We would like to thank you for taking the time to submit this possible fraudulent user!
Sincerely,
Vindictus Scam DB Staff
http://vindictusscamdb.com");
		if ($emailsent)
		{
			echo "Successfully Reported ".$scammer_name.". A copy of this report has been sent to ".$email.". Thanks for your submission!";
		}
		else {
			echo "Successfully Reported ".$scammer_name.". However a system error prevented us from sending you an email.";
		}
}
else {
	echo "Successfully Reported ".$scammer_name;
}
$con->close();
?>