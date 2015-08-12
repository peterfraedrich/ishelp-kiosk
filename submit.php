<?php
// check to make sure our POST wasn't empty
if(isset($_POST)) {
	// get username from email
	$x = explode("@",$_POST['uname']);
	$fname = $x[0];
	// assign vars
	$to = 'pfraedrich@cvent.com';
	// message body
	$message =	'New ISHelp On-Demand ticket:' . "\r\n\r\n" . 
				'Name: ' . $fname . "\r\n" .
				'E-Mail: ' . $_POST['uname'] . "\r\n" .
				'Issue: ' . 	$_POST['issue'] . "\r\n\r\n" . 
				'Assign To: ' . $_POST['tech'];
	// message subject
	$subject = 'ISHelp On-Demand -- ' . $fname;
	// set headers
	$headers = 'From: ' . $_POST['uname'] . "\r\n" .
				'Reply-To: ' . $_POST['uname'] . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
	// check that our email is sent correctly
	if (mail($to, $subject, $message, $headers)) {
		// if message sent, show thank you page
		header("location: thankyou.html");
	}
	else {
		// if message not sent, show error page
		header("location: error.html");
	}
}
else {
	// if POST empty, display error
	die('HTTP/418 (ref. RFC-2324');
}
?>