<?php
$to      = '283035772@qq.com';
$subject = 'UPUPW SendMail Test'; 
$message = 'UPUPW SendMail is OK！'; 
$headers = 'From: UPUPW<webmaster@upupw.net>' . "\r\n" .
    'Reply-To: webmaster@upupw.net' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
if (mail($to, $subject, $message, $headers)) {  
echo "success!";
} else {  
echo "fail...";
}
?>