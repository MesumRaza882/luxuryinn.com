<?php 
 $to = "play32686@gmail.com";
 $subject = "Test Mail";
 $message = "Hi This is first E-mail sent";
 $from = "rmesum786@gmail.com";
 $headers = "From : $from";

 mail($to , $subject, $message, $headers);
 echo "mail sent";


?>