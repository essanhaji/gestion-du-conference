<?php
function gmail($id, $email_part, $title)
{
// require_once 'mailerClass/class.php';
  /*-----------------------------------------------------------------------------*/
 require_once 'mailerClass/PHPMailerAutoload.php';

$user="root";
$passw="";
/*insertion des données */

//$name=$_POST["name-for"];
//$mail=$_POST["email-for"];
##################################################
/*$x=0;
try{
$bdd = new PDO('mysql:host=localhost;dbname=site-social',$user,$passw); 

$stmt = $bdd->query('SELECT *FROM membre');
while($message = $stmt->fetch())
{
	// Utilisation des données.
	if(($mail== $message[1])&&($name==$message[0])){
		//echo "egale.<br>";
		$x=1;
		//
		$pass=$message[2];
	}
}
if($x==0){
	echo "ce email n'existe pas";
}

elseif ($x==1) {



  /*-----------------------------------------------------------------------------*/
 $mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
	
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "elhoucineessanhaji1998@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "8886691460";

//Set who the message is to be sent from
//$mail->setFrom('donotreply@email.com', 'oftaox');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($email_part, '');

//Set the subject line
$mail->Subject = 'ESTE Conference ';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = " Thank you for your participation in our conference <b>ESTE Conference</b> <br> Your id is <b>".$id."</b><br><b>Title is <b/> ".$title;//contenu de message###################

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
//header('location:Authentication.php');

###############################################################//fin d'envoyer l'email
}




 
function contact($message_v)
{
require_once 'Message.php';
// require_once 'mailerClass/class.php';
  /*-----------------------------------------------------------------------------*/
 require_once 'mailerClass/PHPMailerAutoload.php';


$user="root";
$passw="";
/*insertion des données */

//$name=$_POST["name-for"];
//$mail=$_POST["email-for"];
##################################################
/*$x=0;
try{
$bdd = new PDO('mysql:host=localhost;dbname=site-social',$user,$passw); 

$stmt = $bdd->query('SELECT *FROM membre');
while($message = $stmt->fetch())
{
	// Utilisation des données.
	if(($mail== $message[1])&&($name==$message[0])){
		//echo "egale.<br>";
		$x=1;
		//
		$pass=$message[2];
	}
}
if($x==0){
	echo "ce email n'existe pas";
}

elseif ($x==1) {



  /*-----------------------------------------------------------------------------*/
 $mail = new PHPMailer;
 
 //Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
	
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'elhoucineessanhaji1998@gmail.com';

//Password to use for SMTP authentication
$mail->Password = '8886691460';

//Set who the message is to be sent from
//$mail->setFrom('donotreply@email.com', 'oftaox');

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('elhoucineessanhaji@gmail.com', '');

//Set the subject line
$mail->Subject = $message_v->subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

$mail->Body = '<b>Name : </b>'.$message_v->lastname.' '.$message_v->name.'<br><b>Email : </b>'.$message_v->email.'<br><b>Message : </b><br>'.$message_v->message;//contenu de message###################

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
$mail->isHTML(true);  
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
//header('location:Authentication.php');

###############################################################//fin d'envoyer l'email
}


?>