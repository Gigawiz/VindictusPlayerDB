<?php
//xmlhttp.open("GET","submitscammer.php?usr="+ign+"&alts="+alts+"&scmtyp="+scmtyp+"&scamamt="+amtlist+"&server="+server+"sslinks="+sslink,true);
include('config.php');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
if (empty($_GET['usr']) && !isset($_GET['usr']))
{
	die ("Did not pass usr Paramater!");
}
if (empty($_GET['alts']) && !isset($_GET['alts']))
{
	die ("Did not pass alts Paramater!");
}
if (empty($_GET['scmtyp']) && !isset($_GET['scmtyp']))
{
	die ("Did not pass scmtyp Paramater!");
}
if (empty($_GET['scamamt']) && !isset($_GET['scamamt']))
{
	die ("Did not pass scamamt Paramater!");
}
if (empty($_GET['server']) && !isset($_GET['server']))
{
	die ("Did not pass server Paramater!");
}
if (empty($_GET['sslinks']) && !isset($_GET['sslinks']))
{
	die ("Did not pass sslinks Paramater!");
}
if (empty($_GET['charnm']) && !isset($_GET['charnm']))
{
	die ("Did not pass charnm Paramater!");
}
if (empty($_GET['notes']) && !isset($_GET['notes']))
{
	die ("Did not pass notes Paramater!");
}
if (empty($_GET['skype']) && !isset($_GET['skype']))
{
	die ("Did not pass skypem Paramater!");
}
//start insert code
include('config.php');

// prepare and bind
$stmt = $con->prepare("INSERT INTO `submissions`(`ign`, `amt_scmd`, `alt_chrs`, `violation`, `screenshots`, `server`, `status`, `reported_by`, `notes`, `skype`) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssss", $ign, $amtscmd, $altchrs, $violation, $screenshots, $server, $status, $reportedby, $notes, $skype);

// set parameters and execute
$ign = $_GET['usr'];
$amtscmd = $_GET['scamamt'];
$altchrs = $_GET['alts'];
$violation = $_GET['scmtyp'];
$screenshots = $_GET['sslinks'];
$server = strtoupper($_GET['server']);
$status = "Under Investigation";
$reportedby = $_GET['charnm'];
$notes = "";
if ($_GET['notes'] != "Enter your story of how you were scammed or any notes here.")
{
	$notes = $_GET['notes'];
}
$skype = $_GET['skype'];
$stmt->execute();

echo "Successfully Reported ".$_GET['usr'];
$stmt->close();
$con->close();
?>