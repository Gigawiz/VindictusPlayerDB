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
$sql="SELECT * FROM scammers LIMIT 0,10";
if (isset( $_GET['q']) || !empty( $_GET['q']))
{
	$q = mysqli_real_escape_string($con, $_GET['q']);
	$sql="SELECT * FROM scammers WHERE ign LIKE'%".$q."%' OR alt_chrs LIKE '%".$q."%' OR violation LIKE '%".$q."%' OR amt_scmd LIKE '".$q."%' OR server LIKE '%".$q."%'";
}
$result = mysqli_query($con,$sql);
$rescnt = mysqli_num_rows($result);
if ($rescnt > 0)
{
echo "<table>
<tr>
<th>In Game Name</th>
<th>Alternate Characters</th>
<th>Scam Type</th>
<th>Amount Scammed</th>
<th>Server</th>
<th>Scammer Status</th>
<th>Screenshots</th>
<th>Notes</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ign'] . "</td>";
    echo "<td>" . $row['alt_chrs'] . "</td>";
    echo "<td>" . $row['violation'] . "</td>";
    echo "<td>" . $row['amt_scmd'] . "</td>";
	echo "<td>" . $row['server'] . "</td>";
	echo "<td".statusColor($row['status']).">" . $row['status'] . "</td>";
	if (!empty($row['screenshots']))
	{
		echo '<td><a class="btn btn-default" href="'.$row['screenshots'].'" data-featherlight="image">View Screenshot</a></td>';
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
    echo '<div style="text-align:center;">Uh-Oh! We don\'t have that person in our database! Please check your search or <a href="" class="show-1 active homebutton" href="#">submit this person</a>!</div>';
}
mysqli_close($con);
?>
</body>
</html>