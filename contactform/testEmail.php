<?php

 $url = 'https://api.sendgrid.com/';
 echo $user = 'AnthonyBible';
echo $pass = 'V7nqQ&5Pq$RJYzWesjNYS';
$senderName= "Endixium";
		$senderEmail="quotes@endixium.com";
		$senderperson = $senderName. " <". $senderEmail . ">";
		$recieverEmail=$_POST["email"];
		$receiverid =$_POST["name"];
		$toperson= $receiverid. " <".$recieverEmail.">";
		$subject = "Endixium Quote";
		$message = "Hello,". $_POST["name"] .", \n Thank you for contacting us, we will evaluate your circumstances and get back to you. We know you are busy which is why we gurantee a response in 2 business days. For reference here is a copy of your message.  \nThank you,\n Endixium Team. ";


 $params = array(
      'api_user' => $user,
      'api_key' => $pass,
      'to' =>  $toperson,
      'subject' => $subject,
      'html' =>    $message,
     
      'from' => $senderperson,
   );

 echo $request = $url."api/mail.send.json";

 // Generate curl request
 $session = curl_init($request);

 // Tell curl to use HTTP POST
 curl_setopt ($session, CURLOPT_POST, true);
// curl_setopt($session, CURLOPT_SSL_VERIFYPEER, TRUE);
 // Tell curl that this is the body of the POST
 curl_setopt ($session, CURLOPT_POSTFIELDS, $params);

 // Tell curl not to return headers, but do return the response
 curl_setopt($session, CURLOPT_HEADER, false);
 curl_setopt($session,CURLOPT_FAILONERROR,true);
 curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

 // obtain response
 echo $response = curl_exec($session);
 if(curl_error($session))
{
    echo 'error:<pre>' . curl_error($session)."</pre>";
}
 curl_close($session);

 // print everything out
 print_r($response);