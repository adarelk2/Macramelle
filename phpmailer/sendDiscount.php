<?php
include("../settings.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enabl4es exceptions
function sendMail($_email,$_rand)
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
    $mail->Subject = "The Link for your discount - Macramelle";
    $mail->MsgHTML("For use your discount open this link:<br><a href=https://macramelle.com/index.php?cuppon=".$_rand.">https://macramelle.com/index.php?cuppon=".$_rand."</a><br><img src='https://macramelle.com/images/logo.png'>");
    $mail->addAddress($_email); // To address

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


$query = $mysqli->query("SELECT email from newSletter where email = '$_POST[email]'")->num_rows;
    if($query !=0)
    echo "This email is exist in our Newsletter ";
    else
    {
   $rand = rand(100000,999999);
   $mysqli->query("INSERT INTO newSletter (email) VALUES ('$_POST[email]')");
   $mysqli->query("INSERT INTO cuppon (email,code,mode,status) VALUES ('$_POST[email]',$rand,10,0)");
        sendMail($_POST['email'],$rand);
        echo "Your discount was sent, check your inbox";
    }
?>
