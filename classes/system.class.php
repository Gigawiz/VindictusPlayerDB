<?php
//please note that the class name MUST be the same as the first part of the filename
//example: 'scammers.class.php' has the class name of 'scammers' (no quotes)
class system {
	//create the var to hold db connection
	private $db;
	//use this if you need mysql commands in the class. It will allow you to pass the connection once
	//instead of per function
	//see 'config.php' for dynamically sending this info.
	function __construct($mysqli) {
		$this->db = $mysqli;
		$this->setStats();
	  }
	private $totalScammers = "";
	private $totalInQueue = "";
	private $totalSellers = "";
	private $totalTrusted = "";
	private function setStats()
	{
		//setup the query to get a number of scammers in the db
		$scmsql="SELECT * FROM `scammers`";
		//try the query. If it fails, then error out.
		if(!$scmresult = $this->db->query($scmsql)){
			$this->totalScammers = "0";
			die('There was an error running the query [' . $this->db->error . ']');
		}
		//it didnt error! let's set the var then!
		$this->totalScammers = $scmresult->num_rows;
		
		
		//Rinse & Repeat for Sellers
		$slrsql="SELECT * FROM `verified_sellers`";
		if(!$slrresult = $this->db->query($slrsql)){
			$this->totalSellers = "0";
			die('There was an error running the query [' . $this->db->error . ']');
		}
		$this->totalSellers = $slrresult->num_rows;
		$this->totalTrusted = $this->totalTrusted + $slrresult->num_rows;
		//Rinse & Repeat for Trusted buyers
		$byrsql="SELECT * FROM `verified_buyers`";
		if(!$byrresult = $this->db->query($byrsql)){
			$this->totalSellers = "0";
			die('There was an error running the query [' . $this->db->error . ']');
		}
		$this->totalTrusted = $this->totalTrusted + $byrresult->num_rows;
		
		//Rinse and repeat for Queued Scammers
		$queuesql="SELECT * FROM `submissions`";
		if(!$queueresult = $this->db->query($queuesql)){
			$this->totalInQueue = "0";
			die('There was an error running the query [' . $this->db->error . ']');
		}
		$this->totalInQueue = $queueresult->num_rows;
	}
	public function getStats($type)
	{
		switch($type){
			case "sellers":
				return $this->totalSellers;
				break;
			case "scammers":
				return $this->totalScammers;
				break;
			case "queue":
				return $this->totalInQueue;
				break;
			case "trusted":
				return $this->totalTrusted;
				break;
			default:
				return "Unknown";
				break;
		}
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
	public function getIpAddress()
	{
		foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR', 'HTTP_CF_CONNECTING_IP') as $key)
		{
			if (array_key_exists($key, $_SERVER) === true)
			{
				foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
				{
					if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
					{
						return $ip;
					}
				}
			}
		}
	}
}
?>