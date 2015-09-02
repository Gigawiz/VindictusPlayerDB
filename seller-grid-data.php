<?php
include('config.php');

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
	1 => 'ign', 
	2 => 'amount_sold',
	3 => 'accepts_trades',
	4 => 'sale_types',
	5 => 'has_stock',
	6 => 'time_selling',
	7 => 'server',
	8 => 'conversion_rate',
);

// getting total number records without any search
$sql = "SELECT id, ign, amount_sold, accepts_trades, sale_types, has_stock, time_selling, server, conversion_rate";
$sql.=" FROM verified_sellers";
$query=mysqli_query($conn, $sql) or die("scammer-grid-data.php: get scammers");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT id, ign, amount_sold, accepts_trades, sale_types, has_stock, time_selling, server, conversion_rate";
$sql.=" FROM verified_sellers WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( ign LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR amount_sold LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR server LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR accepts_trades LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR sale_types LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR has_stock LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR conversion_rate LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR amt_scmd LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("scammer-grid-data.php: get scammers");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("scammer-grid-data.php: get scammers");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["id"];
	$nestedData[] = $row["ign"];
	$nestedData[] = $row["amount_sold"];
	$nestedData[] = $row["accepts_trades"];
	$nestedData[] = $row["sale_types"];
	$nestedData[] = $row["has_stock"];
	$nestedData[] = $row["time_selling"];
	$nestedData[] = $row["server"];
	$nestedData[] = $row["conversion_rate"];
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
