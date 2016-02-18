<?php
//please note that the class name MUST be the same as the first part of the filename
//example: 'scammers.class.php' has the class name of 'scammers' (no quotes)
class randomthread {
	//create the var to hold db connection
	private $db;
	//use this if you need mysql commands in the class. It will allow you to pass the connection once
	//instead of per function
	//see 'config.php' for dynamically sending this info.
	function __construct($mysqli) {
		$this->db = $mysqli;
	  }

	private function getRandom()
	{
		//the full url to your website
		//this can be auto-set from the config
		$siteurl = "http://vindictusforums.com/";
		
		//get all threads available
		$sql = "SELECT * FROM `xf_thread` WHERE`discussion_state` = 'visible'";
		//error if failed
		if(!$result = $this->db->query($sql)){
			return "";
		}
		//get count of threads available
		$count = $result->num_rows;
		//free the first result
		$result->free();
		//re-query for a randomly selected thread
		$sql_random = "SELECT * FROM `xf_thread` where `thread_id`=".mt_rand(1 ,$count)." AND `discussion_state` = 'visible'";
		//error if failed
		if(!$result_random = $this->db->query($sql_random)){
			return "";
		}
		//set the variables to hold thread information
		$postTitle = "";
		$postNum = 0;
		//set the variables to the information from our newly selected thread
		while($row = $result_random->fetch_assoc()){
			$postTitle = $row['title'];
			$postNum = $row['thread_id'];
		}
		//free the 2nd result
		$result_random->free();
		//seo the string so it will give a proper link to the thread
		$readyurl = $siteurl."/threads/".$this->seoUrl($postTitle).".".$postNum."/";
		//echo out the readout
		$ret = '<a href="'.$readyurl.'">'.$postTitle.'</a>';
		//close the DB connection
		$this->db->close();
		return $ret;
	}
	
	private function seoUrl($string) {
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
	
	public function getRandomPost()
	{
		$x = 0;
		$randomPost = $this->getRandom();
		/*while (strpos($randomPost,'.0') !== false)
		{
			$randomPost = $this->getRandom();
			$x = $x+1;
		}*/
		return $randomPost;
	}
}
?>