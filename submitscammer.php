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
$sql="";
/*$result = mysqli_query($con,$sql);
if ($result)
{
	echo "Successfully Reported User: - Thanks for keeping us up to date!";
}
else {
	echo "Uh-oh! There was a problem with your submission! Please try again.";
	echo 'If the problem persists, please contact us on our <a href="http://vindictusforums.com">forums</a>.';
}*/
echo ("Not Implemented yet!");

?>