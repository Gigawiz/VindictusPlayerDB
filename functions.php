<?php 

function statusColor($status)
{
	$statusret = "";
	switch($status){
		case "Under Investigation":
			$statusret = ' style="color:yellow;"';
		break;
		case "Confirmed":
			$statusret = ' style="color:red;"';
		break;
		default:
			$statusret = ' style="color:white;"';
		break;
	}
	return $statusret;
}