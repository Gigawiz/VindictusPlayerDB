<?php
header('Content-type: application/xml');
include('config.php');
$null_sitemap = '<urlset><url><loc></loc></url></urlset>';
 
	if($con->connect_errno > 0){
		echo $null_sitemap;
		exit; // Database connection error...
	}
	else {
		$sql = "SELECT * FROM `menu_entries`";
		if(!$result = $con->query($sql)){
			die('There was an error running the query [' . $con->error . ']');
			echo $null_sitemap;
			exit; // Error retreiving posts...
		}
	}
 
  $output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
  $output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
  echo $output;
	while($row = $result->fetch_assoc()){
		if ($row['link'] !== "#") {
			echo '<url>';
			echo '<loc>'.$_SITE['url'].$row['link'].'</loc>';
			echo '<changefreq>'.$row['changefreq'].'</changefreq>';
			echo '<priority>'.$row['priority'].'</priority>';
			echo '</url>';
		}
	}
?>
</urlset>