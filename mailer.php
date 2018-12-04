<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)

$email = new \SendGrid\Mail\Mail();
$email->setFrom("paul@6ixtech.com.ng", "Fynaze");
$email->setSubject("Testing sendgrid");
$email->addTo("okporp@gmail.com", "New user");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
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