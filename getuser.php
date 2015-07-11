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
$q = intval($_GET['q']);

include("config.php");
$sql="SELECT * FROM scammers WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Primary Character</th>
<th>Alternate Characters</th>
<th>Scam Type</th>
<th>Amount Scammed</th>
<th>Server</th>
<th>Screenshots</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['ign'] . "</td>";
    echo "<td>" . $row['alt_chrs'] . "</td>";
    echo "<td>" . $row['violation'] . "</td>";
    echo "<td>" . $row['amt_scmd'] . "</td>";
	echo "<td>" . $row['server'] . "</td>";
    echo "<td>" . $row['screenshots'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>