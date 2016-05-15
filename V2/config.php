<?php
$_SITE = array(
	"title" => "Scam DB",
	"url" => "http://yourdomain.com/",//trailing /
	"keywords" => "",
	"description" => "",
	"author" => "Gigawiz"
);

$_MENU = array(
	"Home" => $_SITE['url']."#banner",
	"Scammers" => $_SITE['url']."#scammers",
	"Report a Player" => $_SITE['url']."#report",
	"Trusted Players" => $_SITE['url']."#trusted",
	"FAQ" => $_SITE['url']."#faq"/*,
	"Meet the Team" => $_SITE['url']."#team",
	"Contact Us" => $_SITE['url']."#contact"*/
	);
	
$_GOOGLE =array(
	"key" => "", //reCaptcha key
	"secret" =>"", //reCaptcha secret
	"analytics" => "" //paste the full analytics code in the quotes. Automatically inserts into all pages
);
	
$_DB = array (
	"host" => "localhost", //your database host
	"username" => "", //your database username
	"password" => "", //your database password
	"database" => "" //your database name
);

//FAQ page. "Question" => "Answer"
$_FAQ = array (
	"About Us" => "Vindictus Scam DB is a free service provided by Vindictus Forums and The GodsOfLove guild to help prevent Vindictus Players from losing their gold or nx to known scammers in game, while ensuring that legitimate Sellers and Buyers can do business safely",
	"Contacting Us" => "Have a problem with the site? Is your name in the scammer's list, but shouldnt be? Contact G1ga, Gigawiz or HarmfulMonk in game!",
	"Can I be banned for selling or buying NX with gold?" => "Yes, according to Nexon America's new TOS, \"You will not exploit our games or interactive services for any commercial purpose, including selling of accounts, NX or in-game items, the provision of \"power leveling\" services, etc.\". So according to nexon, trading NX for gold is now a bannable offense.",
	"What happens if I get scammed?" => "The first thing you should do is take screenshots for proof and report the player to Nexon. After you have reported them to Nexon, you should submit the player (and proof of scam) to us. If we confirm your claim, the offender will be added to the database.",
	"Does VindictusScamDB or Nexon cover losses in the event of a scam?" => "Currently, neither Vindictus Scam DB or Nexon cover losses for being scammed (However, if reported quickly enough, nexon <i>may</i> return your lost items/gold). There are plans for an \"insurance\" run by Vindictus Scam DB, however nothing has been put into action yet.",
	"What happens if a player I am doing business with is not in the database?" => "If the player you are conducting business with is not in the database, it simply means this person has not been reported as trusted player or a scammer. Please use caution when dealing with these players. If you successfully conduct a transaction with said player, please add them to the Database by clicking the \"Report a player\" tab, include any proof of a successful transaction and they will be added to the appropriate list.",
	"How do I conduct a sale?" => "Generally speaking, when you and your buyer/seller come to a pricing arrangement, the seller will COD the buyer for the amount agreed upon. When the buyer has paid the COD, the Seller sends the code to the buyer either via Mailbox, Whisper or on another Instant Messaging Service (such as skype, facebook, etc). The Item being COD'd does not need to be of high value as it is only a placeholder.",
	"Average NX Pricing" => "The Average Selling Price for NX is as follows:<br><table><tr><th>Amount Of NX</th><th>Value in Gold</th></tr><tr><td>10k NX</td><td>30-50 million</td></tr><tr><td>25k NX</td><td>60-80 Million</td></table><br>Please note that these are only guidelines, NX sellers are encouraged to follow them, however are entitled to name their own pricing."
);
//try to connect to the database
$con = new mysqli($_DB['host'],$_DB['username'],$_DB['password'],$_DB['database']);

//if it failed, let the user know and kill the script. otherwise continue.
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

function getIpAddress()
{
	foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR', 'HTTP_CF_CONNECTING_IP') as $key)
	{
		if (array_key_exists($key, $_SERVER) === true)
		{
			foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
			{
				if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
				{
					return $ip;
				}
			}
		}
	}
}

/*
current ad spots are as follows:
header (under welcome text)
footer (between social icons and copyright text)
under_table (under scammers list)
under_submit (under submit a scammer)
under_trusted (under trusted players)
under_faq (under faq)

these can be added in the database (adsense_ad_locations), and placed in theme with <?php get_ad_spot("{location}"); ?>
*/
function get_ad_spot($location)
{
	global $con;
	$sql = "SELECT code FROM `adsense_ad_locations` WHERE `location` = '".$location."'";
	$query = mysqli_query($con, $sql) or die("ad table is screwed");
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		echo $row['code'];
	}
}