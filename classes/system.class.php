<?php
//please note that the class name MUST be the same as the first part of the filename
//example: 'scammers.class.php' has the class name of 'scammers' (no quotes)
class system {
	//create the var to hold db connection
	private $db;
	//use this if you need mysql commands in the class. It will allow you to pass the connection once
	//instead of per function
	//see 'config.php' for dynamically sending this info.
	//Also note that we do not need DB access in this file (at the moment), but we are still sending the connection for future use.
	function __construct($mysqli) {
		$this->db = $mysqli;
	  }
	public function calcRates($rate, $amount, $type)
	{
			$ret ="";
			switch ($type)
			{
				case "nxtogold":
					$ret = number_format(($rate + 100) * $amount);
				break;
				case "goldtonx":
					$ret = ($rate * $amount);
				break;
				default:
					$ret = "Input type not set!";
				break;
			}
			return $ret;
	}
}
?>