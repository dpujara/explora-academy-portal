<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Send Email</title>
<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link rel="shortcut icon" href="../exploralocal/images/favicon.ico">
</head>
<?php
require 'master/PHPMailerAutoload.php';
	$a= $_GET ;
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 2;
	$email=$_SESSION['email'];
	$name=$_SESSION['name'];
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'sg2plcpnl0044.prod.sin2.secureserver.net';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'manojparth123';          // SMTP username
	$mail->Password = 'Explora123';               // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->SMTPOptions = array(
	'ssl' => array(
	    'verify_peer' => false,
	    'verify_peer_name' => false,
	    'allow_self_signed' => true
	)
	);
	$mail->From = 'receipts@explora.in';
	$mail->FromName = 'Explora Academy';
	$mail->addAddress('receipt@mpaccount.in','Explora Academy');     // Add a recipient
	$mail->addReplyTo('info@explora.in','Explora Academy');

	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Receipt from Explora Academy';
	$mail->Body    = 'Please find below attached PDF';
	//$mail->AddAttachment("Receipts/".$a['name'].".pdf",$a['name'].".pdf");
	//$mail->AddAttachment("studentReceipts/".$a['name'].".pdf","stu-".$a['name'].".pdf");
	if(!$mail->send()) 
	{
		$mail->SMTPDebug = 2;
		echo '<script language="javascript">';
		echo 'alert("Message could not be sent.")';
		echo '</script>';	
		echo "<script type='text/javascript'> window.location='view.php'</script>";
	}
	else 
	{
		$form=$a['name'];
		echo '<script language="javascript">';
		echo 'alert("Mail has been sent to Manoj Patel.")';
		echo '</script>';
		echo "<script type='text/javascript'> window.location='send_mail_s.php?name=$form'</script>";
	}
?>
</html>