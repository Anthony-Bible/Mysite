<?php
//namespace SendGrid;
require (__DIR__ . '/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use \Aws\Ses\SesClient;
use \Aws\Exception\AwsException;


echo '<?xml version="1.0" encoding="UTF-8" ?>'; 
$SesClient = new SesClient([
    'profile' => 'default',
    'version' => '2010-12-01',
    'region'  => 'us-west-2'
]);
$sender_email = 'anthony@anthony.bible';

	
		$recieverEmail=$_POST["email"];
		$receiverid =$_POST["name"];
		$phone=$_POST["phone"];
		$message = $_POST["message"];
		$subject = "Thanks for contacting me";
		$from = new From($senderEmail, $senderName);
		$plaintext_body = 'This email was sent with Amazon SES using the AWS SDK for PHP.' ;
		$html_body =  '<h1>AWS Amazon Simple Email Service Test Email</h1>'.
					  '<p>This email was sent with <a href="https://aws.amazon.com/ses/">'.
					  'Amazon SES</a> using the <a href="https://aws.amazon.com/sdk-for-php/">'.
					  'AWS SDK for PHP</a>.</p>';
		$char_set = 'UTF-8';
	


function sendEmail(){
	
	try 
		{
			/* We've set all the parameters, it's now time to send it. To do this we just check the captcha response. If they failed we won't send the mail. This has dramatically reduced the spam to almost zero */
			
			$secret= getenv('GOOGLECAPTCHASECRET');
			$captchaResponse=$_POST["g-recaptcha-response"];
			echo "<response>";
			echo "<message>";

			$verifyUrl="https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captchaResponse";
			$verify=file_get_contents($verifyUrl);
				$captcha_success=json_decode($verify);
				if ($captcha_success->success==false) {			
					echo "Looks like the robot overlords deterimined you were a bot, please try the Recaptcha again";
				}
				
				if ($captcha_success->success==true) {
				//This user is verified by recaptcha
				$result = $SesClient->sendEmail([
					'Destination' => [
						'ToAddresses' => $receiverid,
					],
					'ReplyToAddresses' => [$sender_email],
					'Source' => $sender_email,
					'Message' => [
					  'Body' => [
						  'Html' => [
							  'Charset' => $char_set,
							  'Data' => $html_body,
						  ],
						  'Text' => [
							  'Charset' => $char_set,
							  'Data' => $plaintext_body,
						  ],
					  ],
					  'Subject' => [
						  'Charset' => $char_set,
						  'Data' => $subject,
					  ],
					],
					
				]);
				$messageId = $result['MessageId'];
				echo("Email sent! Message ID: $messageId"."\n");
				#echo "<h3>You Successfully sent the Email if you don't recieve an email please check your spam folder</h3>";



				}

			
			echo "</message>";
			echo "</response>";
			

		}
	 catch (Exception $e) {
	
			echo "<response>";
			echo "<message>";
			// output error message if fails
			echo $e->getMessage();
			echo("The email was not sent. Error message: ".$e->getAwsErrorMessage()."\n");
			echo "\n";
			echo "</message>";
			echo "</response>";
			
	}
}
sendEmail();










?>
