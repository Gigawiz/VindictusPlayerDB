<?php
$_DB = array (
	"host" => "localhost", //your database host
	"username" => "", //your database username
	"password" => "", //your database password
	"database" => "" //your database name
);
//try to connect to the database
$con = new mysqli($_DB['host'],$_DB['username'],$_DB['password'],$_DB['database']);

//if it failed, let the user know and kill the script. otherwise continue.
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
include('functions.php');
$_SITE = array(
	"title" => getSetting("title"),
	"url" => getSetting("url"),//trailing /
	"keywords" => getSetting("keywords"),
	"description" => getSetting("description"),
	"author" => getSetting("author")
);
$_GOOGLE =array(
	"key" => getSetting("captcha_key"),
	"secret" => getSetting("captcha_secret"),
	"captcha_enabled" => getSetting("captcha_enabled"),
	"analytics" => getSetting("analytics_code"),
	"ad_spots" => getSetting("ad_spots_enabled")
);

$_SMTP = array (
	"server" => "your.smtp.host.com",
	"email1@yourdomain.com" => "password.for.email.1",
	"email2@yourdomain.com" => "password.for.email.2"
);