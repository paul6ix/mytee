<?php
/**
 * This example shows how to handle a simple contact form.
 */
//Import PHPMailer classes into the global namespace

//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    require 'PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP - requires a local mail server
    //Faster and safer than using mail()
    $mail->isSMTP();
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->Host = 'mail.touchcoreltd.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'paul.chidi@touchcoreltd.com';                 // SMTP username
    $mail->Password = '@@paul++6ix';                           // SMTP password
    $mail->SMTPSecure = 'false';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('paul.chidi@touchcoreltd.com', 'Paul chidi');
    //Send the message to yourself, or whoever should receive contact for submissions
    $mail->addAddress('okporp@gmail.com', 'touch');
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title> FYNAZE LIMITED - Personal Quick Cash Loans </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images\logo.png">

    <!-- Template CSS Files -->
    <link rel="stylesheet" href="css\font-awesome.min.css">
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="stylesheet" href="css\magnific-popup.css">
    <link rel="stylesheet" href="css\select2.min.css">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="css\skins\orange.css">

    <!-- Live Style Switcher - demo only -->
    <link rel="alternate stylesheet" type="text/css" title="orange" href="css\skins\orange.css">
    <link rel="alternate stylesheet" type="text/css" title="green" href="css\skins\green.css">
    <link rel="alternate stylesheet" type="text/css" title="blue" href="css\skins\blue.css">
    <link rel="stylesheet" type="text/css" href="css\styleswitcher.css">

    <!-- Template JS Files -->
    <script src="js\modernizr.js"></script>

</head>

<body>
<!-- SVG Preloader Starts -->
<!--<div id="preloader">
    <div id="preloader-content">

        <svg class="lds-spinner" width="200px" height="200px" xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;">
            <g transform="rotate(0 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(30 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(60 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(90 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(120 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(150 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(180 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(210 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(240 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(270 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(300 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
            <g transform="rotate(330 50 50)">
                <rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#fc4309">
                    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s"
                             repeatCount="indefinite"></animate>
                </rect>
            </g>
        </svg>
    </div>
</div>-->
<!-- SVG Preloader Ends -->

<!-- Wrapper Starts -->
<div class="wrapper">
    <!-- Header Starts -->
    <header class="header">
        <div class="container">
            <div class="row">
                <!-- Logo Starts -->
                <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                    <a href="index.html">
                        <img id="logo" class="img-responsive" src="images\logo-dark.png" alt="logo">
                    </a>
                </div>
                <!-- Logo Ends -->
                <!-- Statistics Starts -->
                <!-- Statistics Starts -->
                <div class="col-md-7 col-lg-7">
                    <ul class="unstyled bitcoin-stats text-center">

                    </ul>
                </div>
                <!-- Statistics Ends -->
                <!-- User Sign In/Sign Up Starts -->
                <div class="col-md-3 col-lg-3">
                    <ul class="unstyled user">
                        <li class="sign-in"><a href="invest.html" class="btn btn-primary"><i class="fa fa-user"></i>
                                Invest</a></li>
                        <li class="sign-up"><a href="loan.html" class="btn btn-primary"><i
                                        class="fa fa-user-plus"></i> Loan</a></li>
                    </ul>
                </div>
                <!-- User Sign In/Sign Up Ends -->
            </div>
        </div>
        <!-- Navigation Menu Starts -->
        <nav class="site-navigation navigation" id="site-navigation">
            <div class="container">
                <div class="site-nav-inner">
                    <!-- Logo For ONLY Mobile display Starts -->
                    <a class="logo-mobile" href="index.html">
                        <img id="logo-mobile" class="img-responsive" src="images\logo-dark.png" alt="">
                    </a>
                    <!-- Logo For ONLY Mobile display Ends -->
                    <!-- Toggle Icon for Mobile Starts -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Toggle Icon for Mobile Ends -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <!-- Main Menu Starts -->
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                        <!-- Main Menu Ends -->
                    </div>
                </div>
            </div>
            <!-- Search Input Starts -->
            <div class="site-search">
                <div class="container">
                    <input type="text" placeholder="type your keyword and hit enter ...">
                    <span class="close">×</span>
                </div>
            </div>
            <!-- Search Input Ends -->
        </nav>
        <!-- Navigation Menu Ends -->
    </header>
    <!-- Header Ends -->
    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <!-- Title Starts -->
                            <h2 class="title-head">Get in <span>touch</span></h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="index.html"> home</a></li>
                                <li>contact</li>
                            </ul>
                            <!-- Breadcrumb Ends -->
                        </div>
                    </div>
                    <!-- Section Title Ends -->
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area Ends -->
    <!-- Contact Section Starts -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 contact-form">
                    <h3 class="col-xs-12">feel free to drop us a message</h3>
                    <p class="col-xs-12">Need to speak to us? Do you have any queries or suggestions? Please contact us
                        about all enquiries including membership and volunteer work using the form below.</p>
                    <!-- Contact Form Starts -->
                    <form class="form-contact" method="post">
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6">
                            <input class="form-control" name="name" id="name" placeholder="NAME" type="text"
                                   required="">
                        </div>

                        <div class="form-group col-md-6">
                            <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email"
                                   required="">
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-md-6">
                            <input class="form-control" name="text" id="subject" placeholder="SUBJECT" type="text"
                                   required="">
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Input Field Starts -->
                        <div class="form-group col-xs-12">
                            <textarea class="form-control" id="message" name="message" placeholder="MESSAGE"
                                      required=""></textarea>
                        </div>
                        <!-- Input Field Ends -->
                        <!-- Submit Form Button Starts -->
                        <div class="form-group col-xs-12 col-sm-4">
                            <button class="btn btn-primary btn-contact" name="sendmail" type="submit">send message
                            </button>
                        </div>
                        <!-- Submit Form Button Ends -->
                        <!-- Form Submit Message Starts -->
                        <div class="col-xs-12 text-center output_message_holder d-none">
                            <p class="output_message">
                        </div>
                        <!-- Form Submit Message Ends -->
                    </form>
                    <!-- Contact Form Ends -->
                </div>
                <!-- Contact Widget Starts -->
                <div class="col-xs-12 col-md-4">
                    <div class="widget">
                        <div class="contact-page-info">
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-home big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>Address</h4>
                                    <p>14 Agungi,Lagos,Nigeria</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-phone big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>Phone Numbers</h4>
                                    <p>+23470-3364-3159</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Contact Info Box Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-envelope big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>Email Address</h4>

                                    <p>INFO@MYTEEFINANCE.COM</p>
                                </div>
                            </div>
                            <!-- Contact Info Box Ends -->
                            <!-- Social Media Icons Starts -->
                            <div class="contact-info-box">
                                <i class="fa fa-share-alt big-icon"></i>
                                <div class="contact-info-box-content">
                                    <h4>Social Profiles</h4>
                                    <div class="social-contact">
                                        <ul>
                                            <li class="facebook"><a href="#" target="_blank"><i
                                                            class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#" target="_blank"><i
                                                            class="fa fa-twitter"></i></a></li>
                                            <li class="google-plus"><a href="#" target="_blank"><i
                                                            class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Social Media Icons Starts -->
                        </div>
                    </div>
                </div>
                <!-- Contact Widget Ends -->
            </div>
        </div>
    </section>
    <!-- Contact Section Ends -->
    <!-- Call To Action Section Starts -->
    <section class="call-action-all">
        <div class="call-action-all-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Call To Action Text Starts -->
                        <div class="action-text">
                            <h2>Get Started Today </h2>
                            <p class="lead">Instant access to money!</p>
                        </div>
                        <!-- Call To Action Text Ends -->
                        <!-- Call To Action Button Starts -->
                        <p class="action-btn"><a class="btn btn-primary" href="loan.html">Apply Now</a></p>
                        <!-- Call To Action Button Ends -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section Ends -->
    <footer class="footer">
        <!-- Footer Top Area Starts -->
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-4 col-md-2">
                        <h4>Our Company</h4>
                        <div class="menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-4 col-md-2">
                        <h4>Help & Support</h4>
                        <div class="menu">
                            <ul>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="terms-of-services.html">Terms of Services</a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->
                    <div class="col-sm-4 col-md-3">
                        <h4>Contact Us </h4>
                        <div class="contacts">
                            <div>
                                <span>info@myteefinance.com</span>
                            </div>
                            <div>
                                <span>+23470-3364-3159</span>
                            </div>
                            <div>
                                <span>Lagos,Nigeria</span>
                            </div>
                            <div>
                                <span>mon-sat 08am &#x21FE; 05pm</span>
                            </div>
                        </div>
                        <!-- Social Media Profiles Starts -->
                        <div class="social-footer">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social Media Profiles Ends -->
                    </div>
                    <!-- Footer Widget Ends -->
                    <!-- Footer Widget Starts -->

                </div>
                <!-- Footer Widget Ends -->
            </div>
        </div>
</div>


<!-- Footer Top Area Ends -->
<!-- Footer Bottom Area Starts -->
<div class="bottom-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Copyright Text Starts -->
                <p class="text-center">Copyright © 2018 FYNAZE LIMITED All Rights Reserved | Created by <a
                            href="http://6ixtech.com.ng" target="_blank">6ixtech</a></p>
                <!-- Copyright Text Ends -->
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom Area Ends -->
<!-- Footer Ends -->
<!-- Back To Top Starts  -->
<a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>
<!-- Back To Top Ends  -->

<!-- Template JS Files -->
<script src="js\jquery-2.2.4.min.js"></script>
<script src="js\bootstrap.min.js"></script>
<script src="js\select2.min.js"></script>
<script src="js\jquery.magnific-popup.min.js"></script>
<!--<script src="js\custom.js"></script>-->

<!-- Live Style Switcher JS File - only demo -->
<script src="js\styleswitcher.js"></script>

</div>
<!-- Wrapper Ends -->
</body>

</html>