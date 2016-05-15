<?php
include('config.php');

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
	1 => 'ign', 
	2 => 'alt_chrs',
	3 => 'amt_scmd',
	4 => 'violation',
	5 => 'server',
	6 => 'report_display_group',
	7 => 'status',
	8 => 'screenshots',
	9 => 'notes',
	10 => 'view'
);

// getting total number records without any search
$sql = "SELECT id, ign, alt_chrs, amt_scmd, violation, server, report_display_group, status, screenshots, notes";
$sql.=" FROM scammers";
$query=mysqli_query($conn, $sql) or die("scammer-grid-data.php: get scammers");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id, ign, alt_chrs, amt_scmd, violation, server, report_display_group, status, screenshots, notes";
$sql.=" FROM scammers WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( ign LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR alt_chrs LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR server LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR violation LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR status LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR amt_scmd LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("scammer-grid-data.php: get scammers");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";	
$query=mysqli_query($conn, $sql) or die("scammer-grid-data.php: get scammers");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id"];
	$nestedData[] = $row["ign"];
	$nestedData[] = $row["alt_chrs"];
	$nestedData[] = $row["amt_scmd"];
	$nestedData[] = $row["violation"];
	$nestedData[] = $row["server"];
	$nestedData[] = $row["report_display_group"];
	$nestedData[] = $row["status"];
	if (!empty($row['screenshots']))
	{
		if (strpos($row['screenshots'], ',') !== false) {
			$ss = '';
			 $screenGallery = explode(',', $row['screenshots']);
			 foreach ($screenGallery as $screenshot)
			 {
				$ss .= '<a class="btn btn-default" href="'.$screenshot.'" data-featherlight="image">View Screenshot</a>';
			 }
			 $nestedData[] = $ss;
		}
		else {
			$nestedData[] = '<a class="btn btn-default" href="'.$row['screenshots'].'" data-featherlight="image">View Screenshot</a>';
		}
	}
	else {
		$nestedData[] = $row['screenshots'];
	}
	if (!empty($row['notes']))
	{
		$nestedData[] = '<a class="btn btn-default" href="#" data-featherlight="<p style=\'color:black;\'>'.$row['notes'].'</p>" style="color:black;">View Notes</a>';
	}
	else {
		$nestedData[] = $row["notes"];
	}
	$nestedData[] = '<a class="show-10 userinfo btn btn-default" href="#">Testing</a>';
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
