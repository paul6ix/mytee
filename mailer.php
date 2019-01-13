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