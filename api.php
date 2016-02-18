<?php
if (!isset($_GET['q']) || empty($_GET['q']) || $_GET['q'] == "")
{
	die("Empty Query!");
}
if (!is_numeric($_GET['q']))
{
	die('Invalid Query!');
}
include('config.php');
switch ($_GET['q'])
{
	case "1":
		if (empty($_GET['statType']) && !isset($_GET['statType']))
		{
			die("0");
		}
		echo $cls_system->getStats($_GET['statType']);
		break;
	case "2":
		$ip_addy = $cls_system->getIpAddress();
		$cls_newscammers->addToDB($_GET['usr'], $_GET['alts'], $_GET['scmtyp'], $_GET['scamamt'], $_GET['server'], $_GET['sslinks'], $_GET['charnm'], $_GET['notes'],  $_GET['skype'], $ip_addy);
		break;
	case "3":
		//check if the user searched for anything. If so, pass it to the scammer->getlist function
		if (isset( $_GET['srch']) || !empty( $_GET['srch']))
		{
			$cls_scammers->getList($_GET['srch']);
		}
		//otherwise we don't need to send anything!
		else {
			$cls_scammers->getList();
		}
		break;
	case "4":
		$cls_trustedsellers->getList();
		break;
	case "5":
		if ($xf_randomthread_enabled)
		{
			//Warning: mysqli::query():
			$randomPost = $cls_randomthread->getRandomPost();
			if (strpos($randomPost,'http://vindictusforums.com//threads/.0/') !== false)
			{
				
			}
			else {
				echo "Suggested Vindictus Forums Post: ".$randomPost;
			}
		}
		break;
	default:
	
		break;
}
?>
