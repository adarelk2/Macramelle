<?php
session_start();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enabl4es exceptions
function sendMail($_firstName,$_lastName,$_email,$_subject)
{
$mail = new PHPMailer(true);

try {
    $mail->isSMTP(); 
    $mail->CharSet = "utf-8";		    
                 $mail->SMTPDebug = 0;		    
        $mail->SMTPOptions = array(
                                              'ssl' => array(
                                              'verify_peer' => false,
                                              'verify_peer_name' => false,
                                              'allow_self_signed' => true));

    $mail->SMTPAuth = false; 
    $mail->SMTPSecure = false;			
    $mail->Host = 'localhost';
    $mail->Port = 25; 
    $mail->Username = 'support@macramelle.com';
    $mail->Password =  '681998Ae##'; // (GoDaddy mail password)
    $mail->setFrom('support@macramelle.com');
    $mail->Subject = $_firstName. " ".$_lastName. " - Support";
    $mail->MsgHTML($_subject."<br>".$_email);
    $mail->addAddress("adarelk2@gmail.com"); // To address

    if($file_link){
        $mail->addAttachment( $file_link , $file_name); // Adding file attachments	
    }
    return $mail->send();
} catch (phpmailerException $e) {
    \Log::info('PHPmailer error',$e->errorMessage());
    return false; 
  } catch (\Exception $e) {
              \Log::info('try excempetion error in smtpMail :- '.$e->getMessage()); 			
    return false; 
  }
 
      return false;
}

if($_SESSION['checkTimeForMail'] == $_POST['cap'])
{
sendMail($_POST['first_Name'],$_POST['lastName'],$_POST['email'],$_POST['subject']);
echo "Your message was sent,thank you!";
$_SESSION['checkTimeForMail'] = null;
}
else
echo "Error, please try again.";
