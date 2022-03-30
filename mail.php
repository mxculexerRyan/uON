<?php 
$to = 'atclavery@gmail.com';
$subject = "Test Mail";
$message = "Hello World!\n\nThis is my first mail.";
$headers = "From: mxculexer@gmail.com \r\nReply-To: mxculexer@gmail.com";
$mail_sent = mail($to, $subject, $message, $headers);
    if($mail_sent==true){
        echo "Mail Sent";
    }else{
        echo "Mail Failed Please Check Your Internet connection";
    }
?>