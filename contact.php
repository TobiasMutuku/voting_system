<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Include authentication
require("process/auth.php");

//Include database connection
require("config/db.php");

//Include class Voting
require("classes/Voting.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style_voter.css">
</head>
<body>

<!-- Header -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="stud_page.php"><span class="glyphicon glyphicon-home"></span> Voting Sytem</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="view_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>
                <li><a href="contact.php"><span class="glyphicon glyphicon-phone"></span>Contact Us</a></li>
                <!-- start helpcenter drop dropdown -->
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon "></span>Help center <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="student_help_center.php#one">System Overview</a></li>
                        <li><a href="student_help_center.php#two">How to vote</a></li>
                        <li><a href="student_help_center.php#three">How to view vote results</a></li>
                        <li><a href="student_help_center.php#seven">How to Logout</a></li>
                    </ul>
                </li>
               <!-- end of help center -->
                <li><a href="process/logout.php"><span class="glyphicon glyphicon-plus-sign"></span>Logout</a></li>
                </li>
            </ul>
            </div><!-- /.navbar-collapse -->


        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
<!-- End Header -->

<!-- contact start -->

<section class="contact_us_page">
<form method="post" action="contact.php" class="contact_form">
<p>Please use the form below to get in touch with us. We'll respond to your message as soon as possible.</p>
     <div class="contact_group">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
</div>
        <div class="contact_group">
		<label for="email">Email:</label>
		<input type="text" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
</div>
        <div class="contact_group">
		<label for="message">Message:</label>
		<textarea id="message" name="message" required></textarea>
</div>
		<input type="submit" value="Submit" class="contact_us">
	</form>


    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);
    $status ="new";
      // Check if email exists in database
      $check_email_sql = "SELECT * FROM voters WHERE email = '$email'";
      $result = mysqli_query($db, $check_email_sql);
      if (mysqli_num_rows($result) == 0) {
          // Email does not exist in database, show error message
          echo "<script>alert('The email is not registered in our website')</script>";
          exit();
      }
    $message_sql = "INSERT INTO messages (name, email, message,status) VALUES ('$name', '$email', '$message','$status')";

   
    while($run_message_sql=mysqli_query($db,$message_sql)){
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'joeweru2000@gmail.com';                     //SMTP username
    $mail->Password   = 'axgaydaavrlwnutg';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit ssl encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('joeweru2000@gmail.com');
    $mail->addAddress($email);     //Add a recipient
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message Received Confirmation';
    $mail->Body    = '<div><H3>Hello ' . $name . ' <H3>
                        <p>Thank you for contacting us,our admins have received your message and they will get back to you soon.</P
                      <div>';
   
    $mail->send();
    echo "<script>alert('Your message has been send sucessfully')</script>";

     // redirect to success page
     header("Location:stud_page.php");
     exit();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



             }
    }


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>





</section>
<!-- contact end -->

<!-- Footer -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">

    <div class="container">
        <div class="navbar-text pull-left">
            Copyright 2022 @ JOEWERU
        </div>
    </div>

</nav>
<!-- End Footer -->

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
