<?php
//please note that the class name MUST be the same as the first part of the filename
//example: 'scammers.class.php' has the class name of 'scammers' (no quotes)
class trustedsellers {
	//create the var to hold db connection
	private $db;
	//use this if you need mysql commands in the class. It will allow you to pass the connection once
	//instead of per function
	function __construct($mysqli) {
		$this->db = $mysqli;
	  }
	public function getList()
	{
		$this->setHeader();
		$sql="SELECT * FROM `verified_sellers` LIMIT 0,10";
		$result = mysqli_query($this->db,$sql);
		$rescnt = mysqli_num_rows($result);
		if ($rescnt > 0)
		{
		echo "<h2 class=\"animated fadeInRight\">Trusted Sellers</h2><table>
		<tr>
		<th>Character Name(s)</th>
		<th>Total Amount Sold (overall)</th>
		<th>Time Selling (overall)</th>
		<th>Server</th>
		</tr>";

		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['ign'] . "</td>";
			echo "<td>" . $row['amount_sold'] . "</td>";
			echo "<td>" . $row['time_selling'] . "</td>";
			echo "<td>" . $row['server'] . "</td>";
			echo "</tr>";
		}
		echo '</table>';
		}
		else {
			echo '<div style="text-align:center;">Uh-Oh! There seems to be an error in our script! Please check back soon!</div>';
		}
		$this->getBuyers();
		mysqli_close($this->db);
		$this->setFooter();
	}
	
	public function getBuyers()
	{
		$sql="SELECT * FROM `verified_buyers`";
		$result = mysqli_query($this->db,$sql);
		$rescnt = mysqli_num_rows($result);
		if ($rescnt > 0)
		{
		echo "<br><br><h2 class=\"animated fadeInRight\">Trusted Buyers</h2><table><table>
		<tr>
		<th>Character Name</th>
		<th>Total Amount Bought (overall, estimated)</th>
		<th>Server</th>
		</tr>";

		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['ign'] . "</td>";
			echo "<td>" . $row['amount_bought'] . "</td>";
			echo "<td>" . $row['server'] . "</td>";
			echo "</tr>";
		}
		echo '</table>';
		}
		else {
			echo '<div style="text-align:center;">Uh-Oh! There seems to be an error in our script! Please check back soon!</div>';
		}
	}
	
	private function setHeader(){
		echo '<!DOCTYPE html>
		<html>
		<head>
		<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		table, td, th {
			border: 1px solid black;
			padding: 5px;
		}

		th {text-align: left;}
		</style>
		</head>
		<body>';
	}
	
	private function setFooter()
	{
		echo '</body></html>';
	}
}
?>