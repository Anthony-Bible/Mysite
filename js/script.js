$("#contactForm").submit(function(event){ 
    //Prevent the default action from happening
    event.preventDefault();
    // grecaptcha.ready(function() {
    //     grecaptcha.execute('6LeFdokUAAAAAHjyx-b7eiMeBrZs4FGgZlyurW9V', {action: ''});
    // });
  
    var Loginform = $( "#contactForm" );

   


 
  try 
     {
        
    var email= Loginform.find( "input[name='email']" ).val();
    var phone= Loginform.find( "input[name='phone']" ).val();
    var name= Loginform.find( "input[name='name']" ).val();
    var message = Loginform.find( "textarea[name='message']" ).val();

    // console.log(token);
    url = Loginform.attr( "action" );

        // console.log(grecaptcha.getResponse());
    posting = $.post( url, {email:email,phone:phone,name:name,message:message,captcha:grecaptcha.getResponse()}, function(data, status){
        var xmlDoc = $.parseXML( data ); 
        var $xml = $(xmlDoc);
        var  $person = $xml.find("response");
        $messageDiv = $("#wasitasuccess");
        $person.each(function(){
            console.log("This is the checked");
            
            $checkedResponse="You Successfully sent the Email if you don't recieve an email please check your spam folder";
            // alert(id);
            console.log($checkedResponse);
            var $actualResponse = $(this).find('message').text();
            console.log("This is the response:");
            console.log($actualResponse);
            // console.log($checkedResponse)
            // console.log($response)
            $messageDiv.html($actualResponse);      
            if($actualResponse==$checkedResponse)
            {
            $messageDiv.css("color","green");
            $("#contactFormSubmit").attr("disabled","disabled");
            }else{
                grecaptcha.reset();
                $messageDiv.css("color","red");

            }
            

        });
    });
   }
     catch(e) 
     { 
     $("#contactForm").html(e); 
     }
});