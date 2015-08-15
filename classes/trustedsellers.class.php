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
		echo "<table>
		<tr>
		<th>In Game Name</th>
		<th>Skype</th>
		<th>Total Amount Sold (overall)</th>
		<th>Time Selling (overall)</th>
		<th>Accepts Trades</th>
		<th>Server</th>
		<th>Sale Types</th>
		<th>Has Stock</th>
		<th>Accepts Loans</th>
		<th>Conversion Rate</th>
		<th>Notes</th>
		</tr>";

		while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>" . $row['ign'] . "</td>";
			echo "<td>" . $row['skype'] . "</td>";
			echo "<td>" . $row['amount_sold'] . "</td>";
			echo "<td>" . $row['time_selling'] . "</td>";
			echo "<td>" . $row['accepts_trades'] . "</td>";
			echo "<td>" . $row['server'] . "</td>";
			echo "<td>" . $row['sale_types'] . "</td>";
			echo "<td>" . $row['has_stock'] . "</td>";
			echo "<td>" . $row['will_loan'] . "</td>";
			if (!empty($row['conversion_rate']) && stristr($row['conversion_rate'], '<a href=') === FALSE)
			{
				$rate = '<p style=\'color:black;\'>Conversion Rate:'.$row['conversion_rate']."%<br />
				(10k nx =25,000,000 Gold)<br />
				(25k nx =50,000,000 Gold)
				</p>";
				echo '<td><a class="btn btn-default" href="#" data-featherlight="'.$rate.'" style="color:black;">View Rates</a></td>';
			}
			else if (stristr($row['conversion_rate'], '<a href=') !== FALSE)
			{
				echo '<td>'.$row['conversion_rate'].'</td>';
			}
			else {
				echo '<td></td>';
			}
			if (!empty($row['notes']))
			{
				echo '<td><a class="btn btn-default" href="#" data-featherlight="<p style=\'color:black;\'>'.$row['notes'].'</p>" style="color:black;">View Notes</a></td>';
			}
			else {
				echo '<td></td>';
			}
			echo "</tr>";
		}
		echo '</table>';
		}
		else {
			echo '<div style="text-align:center;">Uh-Oh! There seems to be an error in our script! Please check back soon!';
		}
		mysqli_close($this->db);
		$this->setFooter();
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