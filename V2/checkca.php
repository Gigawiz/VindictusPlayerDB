<?php
include('config.php');
//check if captcha is enabled first
if ($_GOOGLE['captcha_enabled'])
{
	$captcha = filter_input(INPUT_POST, 'recaptcha_response_field'); // get the captchaResponse parameter sent from our ajax
	/* Check if captcha is filled */
    if (!$captcha) {
        echo json_encode(array('msg' => 'Empty')); // Return error code if there is no captcha
    }
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$_GOOGLE['secret']."&amp;amp;response=" . $captcha);
    if ($response . success == false) {
        echo json_encode(array('msg' => 'Invalid'));
    } else {
       echo json_encode(array('msg' => 'Valid'));
    }
}
else {
	echo json_encode(array('msg' => 'Valid'));
}
?>