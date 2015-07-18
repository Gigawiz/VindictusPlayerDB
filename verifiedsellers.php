<!DOCTYPE html>
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
<body>

<?php
include("config.php");
include("functions.php");
$sql="SELECT * FROM `verified_sellers` LIMIT 0,10";
$result = mysqli_query($con,$sql);
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
	echo "<td>" . $row['conversion_rate'] . "</td>";
	if (!empty($row['notes']))
	{
		echo '<td>View Notes</td>';
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
mysqli_close($con);
?>
</body>
</html>