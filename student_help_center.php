<?php
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
                        <li><a href="#one">System Overview</a></li>
                        <li><a href="#two">How to vote</a></li>
                        <li><a href="#three">How to view vote results</a></li>
                        <li><a href="#seven">How to Logout</a></li>
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
<!--help center body  -->
<div class="help_center">

    <!-- ----system overview---- -->
    <div class="overview" id="one">
        <div class="title">
    <h2>System overview</h2>
</div>
    <div class="help_text">
    <p style="font-size:2rem;padding:1rem;">
    Our voting system is designed to provide a secure and efficient platform for eligible voters to cast their votes.
     The system is accessible through a user-friendly web interface that allows voters to access their ballots, make their selections,
     and submit their votes. The system is designed to ensure the privacy and anonymity of voters while also ensuring the accuracy and integrity of the election process.
   </p>

    </div>
    </div>

    <!-- ----elections---- -->
    <div class="overview" id="two">
    <div class="title">
    <h2>How to Vote</h2>
    </div>
    <div class="help_text">
     <ol>
     <li>  Log in to the voting system using your registration number.</li>
     <li>   Select the election for which you wish to cast your vote.</li>
      <li>  Review the candidates or issues presented on your ballot.</li>
      <li>  Make your selection(s) by selectingon the appropriate candidate.</li>
       <li> Once you have made all of your selections, click on the vote button to cast your vote</li>

     </ol>

    </div>
    </div>

     <!-- ----positions---- -->
     <div class="overview" id="three">
     <div class="title">
    <h2>How to view vote results</h2>
    </div>
    <div class="help_text">
        <p style="font-size:2rem;padding:1rem;">After the election, the vote results will be tabulated and made available to the public. To view the vote results, please follow these steps:</p>
    <ol>
<li>Log in to the voting system using your registered credentials.</li>
<li>Select the election for which you wish to view the results.</li>
<li>Click on the "Vote Results" button.</li>
<li>The results will be displayed in a clear and easy-to-read format.</li>
     </ol>
    </div>
    </div>

    <!-- ----voters results---- -->
    <div class="overview" id="seven" style=" padding-bottom: 4rem;">
    <div class="title">
    <h2>How to log out of the system</h2>
    </div>
    <div class="help_text">
        <ol>
       <li> To log out of the system, click on the "Log Out" button located in the top right corner of the screen.</li>
       <li> This will redirect you to the system's login page, where you will need to enter your login credentials again to access the system.</li>
        <li>Logging out of the system is important to ensure the security of your account and prevent unauthorized access.</li>
        <li>Always remember to log out of the system when you are finished using it, especially if you are using a public or shared computer.</li>
       <li> If you experience any issues logging out of the system, please contact your administrator for assistance.</li>
      <li>  Do not share your login credentials with anyone, and choose a strong and unique password to protect your account.</li>
       <li> Logging out of the system will also clear any saved data or preferences associated with your account, so make sure to save any changes before logging out. </li> 
        <ol>
    <div>
    </div>


</div>





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
