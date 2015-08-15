<?php
class newscammers {
	private $db;
	function __construct($mysqli) {
		$this->db = $mysqli;
	}
	function addToDb($ign, $alts = "", $scmtyp, $amtlst = "", $server, $sslink = "", $charnm, $notes = "", $skype = "", $submission_ip)
	{
		if (!$this->db) {
			die('Could not connect: ' . mysqli_error($this->db));
		}
		if (!isset($scmtyp) || empty($scmtyp) || $scmtyp == "")
		{
			die("Invalid or Empty Scam Type Detected!");
		}
		
		if (!isset($ign) || empty($ign) || $ign == "")
		{
			die("Invalid or Empty Scammer Character Name!");
		}
		
		if (!isset($server) || empty($server) || $server == "")
		{
			die("Invalid or Empty Server Detected!");
		}
		
		if (!isset($charnm) || empty($charnm) || $charnm == "")
		{
			die("Invalid or Empty Character Name! Please note you <i>must</i> submit your character name in case we should need to contact you about this person!");
		}
		if (!isset($submission_ip) || empty($submission_ip) || $submission_ip == "")
		{
			die("A System Error is preventing new submissions at this time! Please try again later.");
		}
		// prepare and bind
		$stmt = $this->db->prepare("INSERT INTO `submissions`(`ign`, `amt_scmd`, `alt_chrs`, `violation`, `screenshots`, `server`, `status`, `reported_by`, `notes`, `skype`, `submission_ip`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssssssss", $scammer_name, $amtscmd, $scammer_alts, $scamtype, $screen_shot_link, $vindi_server, $status, $submitted_by, $notes_cln, $scammer_skype, $submitter_ip);

		// set parameters and execute
		$scammer_name = $ign;
		$amtscmd = "Unknown";
		if ($amtlst != "")
		{
			$amtscmd = $amtlst;
		}
		$scammer_alts = $alts;
		$scamtype = $scmtyp;
		$screen_shot_link = $sslink;
		$vindi_server = $server;
		$status = "Under Investigation";
		$submitted_by = $charnm;
		$notes_cln = "";
		if ($notes != "Enter your story of how you were scammed or any notes here." || $notes != "")
		{
			$notes_cln = $notes;
		}
		$scammer_skype = $skype;
		$submitter_ip = $submission_ip;
		if (!$stmt->execute())
		{
			die('Could not add: ' . mysqli_error($this->db));
		}

		echo "Successfully Reported ".$ign;
		$stmt->close();
		$this->db->close();
	}
}
?>