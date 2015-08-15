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
.pagination{
    margin:0;
    padding:0;
}
</style>
</head>
<body>

<?php
include("config.php");
//check if the user searched for anything. If so, pass it to the scammer->getlist function
if (isset( $_GET['q']) || !empty( $_GET['q']))
{
	$cls_scammers->getList($_GET['q']);
}
//otherwise we don't need to send anything!
else {
	$cls_scammers->getList();
}
?>
</body>
</html>