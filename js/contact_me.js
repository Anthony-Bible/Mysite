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

        console.log(grecaptcha.getResponse());
    posting = $.post( url, {email:email,phone:phone,name:name,message:message,captcha:grecaptcha.getResponse()}, function(data, status){
        var xmlDoc = $.parseXML( data ); 
        var $xml = $(xmlDoc);
        var  $person = $xml.find("response");
        $messageDiv = $("#contactForm");
        $person.each(function(){
            alert(id);
            var $response = $(this).find('message').text();
            console.log($response)
            $messageDiv.html($response)      
            $messageDiv.style.color = 'green'     


        });
    });
   }
     catch(e) 
     { 
     $("#contactForm").html(e); 
     }
});