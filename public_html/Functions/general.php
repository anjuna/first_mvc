<?php 

function my_sanitize($input){

	return htmlentities($input, ENT_QUOTES, 'UTF-8');
}

function my_activation_mail() {
	
	//$str = md5($to_query_string . 'rand0Ms@');

	$mail = new PHPMailer;

	$mail->SMTPDebug = 1;                           // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = gethostbyname('smtp.mail.yahoo.com');  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->Username = 'theeyewatchesall@yahoo.com';                 // SMTP username
	$mail->Password = 'jackie349156';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted

	$mail->From = 'theeyewatchesall@yahoo.com';
	$mail->FromName = 'Mailer';
	$mail->addAddress('jamie_wj@yahoo.com');               // Name is optional

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Activation Link';

$body = <<< BODY

We dearly appreciate you registering. To do away with the uncouth (it may be admitted) assumption that you are a robot, please would you follow the 
link below. <br />

http://fatman/MyMVC/public_html/index/activate
<br />
Those readers who actually are, in fact, robots please allow us to extend our deepest commiserations towards your non-commiserative capacities.


BODY;

	$mail->Body    = $body;
	$mail->AltBody = 'Why you so silly';

	if($mail->send()) {

	    return true;
	} else {
	    
	}
}