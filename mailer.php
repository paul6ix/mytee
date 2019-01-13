<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
$name = $_POST['name'];
$mail = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email = new \SendGrid\Mail\Mail();
$email->setFrom("info@fynazelimited.com", "Fynaze Limited");
$email->setSubject($subject);
$email->addTo($mail, $name);
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>$message</strong>"
);
$apikey = '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';
$sendgrid = new \SendGrid($apikey);
try {
    $response = $sendgrid->send($email);
    if($response->statusCode() == 202) {
        echo "Email sent successfully";
        header('Location: success.html');
    }
   /* print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";*/
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}