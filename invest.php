<?php

require 'vendor/autoload.php'; //If you're using Composer (recommended)
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "ixtechco_paul", "@@paul++6ix", "ixtechco_mytee");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$birthday = mysqli_real_escape_string($link, $_REQUEST['birthday']);
$term = mysqli_real_escape_string($link, $_REQUEST['term']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
$status = mysqli_real_escape_string($link, $_REQUEST['status']);
$employment_status = mysqli_real_escape_string($link, $_REQUEST['employment_status']);
$current_employer = mysqli_real_escape_string($link, $_REQUEST['current_employer']);
$employer_address = mysqli_real_escape_string($link, $_REQUEST['employer_address']);
$residential_address = mysqli_real_escape_string($link, $_REQUEST['residential_address']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$lga = mysqli_real_escape_string($link, $_REQUEST['lga']);


// attempt insert query execution
$sql = "INSERT INTO invest (first_name, last_name, email,phone,birthday,term,gender,status,employment_status,current_employer,employer_address,residential_address,city,lga) VALUES ('$first_name', '$last_name', '$email', '$phone','$birthday','$term','$gender','$status','$employment_status'
,'$current_employer','$employer_address','$residential_address','$city','$lga')";
if (mysqli_query($link, $sql)) {
    
    header('Location: success.html');
    exit;
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
function send(){
$name = $_POST['first_name'];
$lastname =$_POST['last_name'];
$subject = "New investment proposal";
$amt = $_POST['amount'];
$mail=$_POST['email'];
$message = 'A new investment proposal has been applied for ';

$email = new \SendGrid\Mail\Mail();
$email->setFrom("info@fynazelimited.com", "Fynaze Limited");
$email->setSubject($subject);
$email->addTo("Fynazelimited@gmail.com", $name);
$email->addTo("invest@fynazelimited.com");

$email->addContent(
    "text/html", "<strong>$message $amt from $name $lastname kindly reply this email: <br> $mail <br>Query database for further details </strong>"
);
$sendgrid = new \SendGrid($apikey);
try {
    $response = $sendgrid->send($email);
    if($response->statusCode() == 202) {
        
        header('Location: success.html');
    }
    /* print $response->statusCode() . "\n";
     print_r($response->headers());
     print $response->body() . "\n";*/
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

}

?>