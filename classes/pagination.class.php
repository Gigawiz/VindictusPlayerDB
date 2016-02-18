<?php
//please note that the class name MUST be the same as the first part of the filename
//example: 'scammers.class.php' has the class name of 'scammers' (no quotes)
class pagination {
	//create the var to hold db connection
	private $db;
	//use this if you need mysql commands in the class. It will allow you to pass the connection once
	//instead of per function
	function __construct($mysqli) {
		$this->db = $mysqli;
	  }
}
?>