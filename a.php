<?php
$message="";
$userid="";
include("includes/conn.php");
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $loginemail=$_POST['email'];
	try {
		$conn = $pdo->open();
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM `users` WHERE email=:loginemail";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':loginemail', $loginemail);

		$stmt->execute();
		$user = $stmt->fetch();
		if ($user) {
            $userid=$user['id'];    
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'mailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
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
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "phptestmailwork@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "phptestmailwork1!";

//Set who the message is to be sent from
$mail->setFrom('phptestmailwork@gmail.com', 'admin');

//Set an alternative reply-to address
$mail->addReplyTo('phptestmailwork@gmail.com', 'admin');

//Set who the message is to be sent to
$mail->addAddress($email);

//Set the subject line
$mail->Subject = 'change password request';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$otpnum="";
for($x=1;$x<9;$x++)
{
    $otpnum.=rand(0,9);
}
$surentuserid=$user['id'];
$sql2 = "UPDATE `users` SET `reset_code`=:otpnum WHERE `id`=:curentuserid";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->bindParam(':curentuserid', $surentuserid);
        $stmt2->bindParam(':otpnum', $otpnum);

		$stmt2->execute();
$mail->Body = 'welcome our user <br> your otp is : '.$otpnum;

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
   // echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
   
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
header('location:check.php?otp='.$otpnum."&userid=".$userid);
		} else {
			$message = "This email not found, Please try again.";
			   header('location:forgotpassword.php?message='.$message);
		}
	} catch (PDOException $e) {
		$message = $e->getMessage();
	}
	$conn = $pdo->close();
}
