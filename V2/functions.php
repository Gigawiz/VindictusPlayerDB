<?php
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

function get_ad_spot($location)
{
	global $con;
	global $_GOOGLE;
	if ($_GOOGLE['ad_spots'])
	{
		$sql = "SELECT code FROM `adsense_ad_locations` WHERE `location` = '".$location."' AND `enabled`=1";
		$query = mysqli_query($con, $sql) or die("ad table is screwed");
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			echo $row['code'];
		}
	}
}

function countTraffic($ip)
{
	global $con;
	$timestamp = date('Y-m-d H:i:s', strtotime("+1 day"));  
	if($con->connect_errno > 0){
		die('Unable to connect to database [' . $con->connect_error . ']');
	}
	$trafficquery = "SELECT * FROM `traffic` WHERE `ip`='".$ip."' AND `visit_time` < '".$timestamp."'";

	if(!$findTraffic = $con->query($trafficquery)){
		die('There was an error running search the query [' . $con->error . ']');
	}
	if ($findTraffic->num_rows > 0)
	{
		$id = 0;
		$total_visits = 0;
		while($row = $findTraffic->fetch_assoc()){
			$id = $row['id'];
			$total_visits = $row['total_visits'];
		}
		$total_visits = $total_visits + 1;
		$updatequery = "UPDATE `traffic` SET `total_visits` = '".$total_visits."' WHERE `id` = '".$id."'";
		if(!$updatetraffic = $con->query($updatequery)){
			die('There was an error running the update query [' . $con->error . ']');
		}

	}
	else {
		$statment = "INSERT INTO `traffic` (`ip`, `total_visits`) VALUES ('".$ip."', '1')";
		if(!$result = $con->query($statment)){
			die('There was an error running the insert query [' . $con->error . ']');
		}
	}
}

function getChangelog($makebutton)
{
	global $con;
	$statment = "SELECT * FROM `changelog` ORDER BY `id` DESC LIMIT 0,2";
	if ($makebutton)
	{
		$statment = "SELECT * FROM `changelog` ORDER BY `id` DESC";
		echo '<a class="button special" href="#" data-featherlight="';
	}
	if(!$result = $con->query($statment)){
		die('There was an error running the query [' . $con->error . ']');
	}
	$today = date('Y-m-d H:i:s');
	while($row = $result->fetch_assoc()){
		$output = "<ul>";  
		if ($makebutton)
		{
			$output = '<ul>';
		}
		$output .= '<li>';
		
		if ($row['date'] > $today)
		{
			$output .= "Planned Features (Scheduled Release: ";
		}
		$output .= date('m/d/Y', strtotime($row['date']));
		if ($row['date'] > $today)
		{
			$output .= "):";
		}
		else {
			$output .= ' - (Revision: '.$row['revision'].'):';
		}
		$output .= '<ul>';
		$output .= str_replace('"', "'", $row['entry']);
		$output .= '</ul>';
		$output .= '</li>';
		$output .= '</ul>'; 
		echo $output;
	}
	if ($makebutton)
	{
		echo '" style="color:black;">View Full Changelog</a>';
	}
}

function genMenu()
{
	global $con;
	$sql = "SELECT * FROM `menu_entries`";
	$query = mysqli_query($con, $sql) or die("bad menu");
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		if ($row['link'] !== "" || !empty($row['link']))
		{
			/*if ($row['title'] == "Scammers")
			{
				echo '<li><a href="'.$row['link'].'"'.$row['styling'].'>'.$row['title'].'</a>';
				$sql2 = "SELECT ign,alt_chrs FROM `scammers`";
				$query2 = mysqli_query($con, $sql2) or die("bad sub menu");
				echo "<ul>";
				while( $row2=mysqli_fetch_array($query2) ) {
					echo '<li><a href="#'.$row2['ign'].'">'.$row2['ign'].'</a>';
					if (strpos($row2['alt_chrs'], ',') !== false) {
						echo '<ul>';
						$usernames = explode(',', $row2['alt_chrs']);
						foreach ($usernames as $username)
						{
							echo '<li><a href="#'.$username.'">'.$username.'</a></li>';
						}
						echo '</ul>';
					}
					echo "</li>";
				}
				echo "</ul>";
				echo "</li>";
			}
			else {*/
				echo '<li><a href="'.$row['link'].'"'.$row['styling'].'>'.$row['title'].'</a></li>';
			//}
		}
	}
}

function getFaq()
{
	global $con;
	$sql = "SELECT * FROM `faq`";
	$query = mysqli_query($con, $sql) or die("bad faq");
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		echo '<h3>'.$row['question'].'</h3>';
		echo '<p>'.$row['answer'].'</p>';
	}
}

function getSetting($setting)
{
	global $con;
	$sql = "SELECT `".$setting."` FROM `settings` ORDER BY ID DESC LIMIT 0,1";
	$query = mysqli_query($con, $sql) or die("bad setting");
	while( $row=mysqli_fetch_array($query) ) {  // preparing an array
		return $row[$setting];
	}
}

function generateProfile($userID, $screenshots, $notes, $report_group, $alt_chars, $status, $amt_scammed) {
	$container = '<div class="profile-container">
  <h2>Character Name: <span style="color:red;">'.$userID.'</span></h2>';
  if (!empty($alt_chars))
  {
	  $container .= '<h3>Also Known As: <span style="color:red;">'.$alt_chars.'</span></h3>';
  }
  if ($status == "Confirmed")
  {
	  $container .= '<h4>Scammer Status: <span style="color:red;">'.$status.'</span></h4>';
  }
  else {
	  $container .= '<h4>Scammer Status: <span style="color:yellow;">'.$status.'</span></h4>';
  }
  $container .= '<h4>Reported By: <span style="color:green;">'.$report_group.'</span></h4>';
   if (!empty($amt_scammed))
  {
	$container .= '<h3>Amount Scammed: </h3><p class="notes-text">'.$amt_scammed.'</p>';
  }
  $container .= '<h3>Notes: </h3>';
  if (!empty($notes))
  {
	$container .= '<p class="notes-text">'.$notes.'</p>';
  }
  else {
	  $container .= '<p class="notes-text">No notes on record.</p>';
  }
   $container .= '<p><h3>Screenshots:</h3>';
  if (!empty($screenshots))
  {
	  if (strpos($screenshots, ',') !== false) {
			 $screenGallery = explode(',', $screenshots);
			 $container .= '<p><section data-featherlight-gallery data-featherlight-filter="a" class="notes-text">';
			 foreach ($screenGallery as $screenshot)
			 {
				$container .= '<a href="'.$screenshot.'"><img src="'.$screenshot.'" class="galleryimg screenshot"></a>';
			 }
			 $container .= '</section></p>';
		}
	  else {
		$container .= '<a href="'.$screenshots.'" data-featherlight="image"><img src="'.$screenshots.'" class="screenshot" ></a>';
	  }
	  $container .= '</section></p></div>';
  }
else {
	$container .= '<p><h3 style="color:red;">No Screenshots on Record.</h3></section></p></div>';
}  
	$ret = '<a class="button special" href="#" id="'.$userID.'" data-featherlight=\''.$container.'\' style="color:black;">View Profile</a>';
	return $ret;
}

function logEmail($subject, $body, $email_address)
{
	global $con;
	$subj = $con->escape_string($subject);
	$bdy = $con->escape_string($body);
	$emladrss = $con->escape_string($email_address);
	$statment = "INSERT INTO `emails` (`subject`, `body`, `email_address`) VALUES ('".$subj."', '".$bdy."', '".$emladrss."')";
	
	if(!$result = $con->query($statment)){
		return $con->error;
	}
	return false;
}

function sendEmail($eml_from, $to, $subject, $mail_body)
{
	require_once "Mail.php";
	global $_SMTP;
	$from = $eml_from;
	$body = $mail_body;

	$host = $_SMTP['server'];
	$username = $from;
	$password = $_SMTP[$from];

	$headers = array ('From' => "Vindictus Scam DB <".$from.">",
	  'To' => $to,
	  'Subject' => $subject);
	$smtp = Mail::factory('smtp',
	  array ('host' => $host,
		'auth' => true,
		'username' => $username,
		'password' => $password));

	$mail = $smtp->send($to, $headers, $body);

	logEmail($subject, $mail_body, $to);
	if (PEAR::isError($mail)) {
		return false;
	 } else {
	  return true;
	 }
}