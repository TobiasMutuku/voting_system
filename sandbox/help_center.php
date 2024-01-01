<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Organization
require("classes/Organization.php");

//Include class Position
require("classes/Position.php");

//Include class Nominees
require("classes/Nominees.php");

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help center</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">

    <script>
        function getPos(val) {
            $.ajax({
                type: "POST",
                url: "get_pos.php",
                data: 'org='+val,
                success: function(data) {
                    $("#pos-list").html(data);
                }
            });
        }
    </script>
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
            <a class="navbar-brand" href="index.php">Voting System</a>
        </div>

       
<!-- ===dropdown ends here -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Election</a></li>
                <li><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Position</a></li>
                <li class="active"><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Nominees</a></li>
                <li><a href="add_voters.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Voters</a></li>
                <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>
                <li><a href="messages_data.php"><span class="glyphicon glyphicon-inbox"></span>Mesaages</a></li>
               <!-- start helpcenter drop dropdown -->
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon "></span>Help center <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#one">System Overview</a></li>
                        <li><a href="#two">How to Add Election</a></li>
                        <li><a href="#three">How to Add Position</a></li>
                        <li><a href="#four">How to Add Nominees</a></li>
                        <li><a href="#five">How to Add Voters</a></li>
                        <li><a href="#six">How to view voters result</a></li>
                        <li><a href="#seven">How to Logout</a></li>
                    </ul>
                </li>
               <!-- end of help center -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="process/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>
<!-- End Header -->

<!--help center body  -->
<div class="help_center">

    <!-- ----system overview---- -->
    <div class="overview" id="one">
    <h2>System overview</h2>
    <div class="help_text">
    <ol>
   <li> The voting system is a web-based application designed to facilitate online voting.</li>
     <li>It allows the creation and management of elections, positions, nominees, and voters.</li>
    <li>The system provides a secure and efficient way to conduct voting, ensuring accurate and transparent results.</li>
   <li> Administrators have full control over the system and can customize settings to fit their specific needs.</li>
    <li>The system is designed with user-friendliness in mind, making it easy for both administrators and voters to use.</li>
    <li>The system provides real-time updates and notifications to keep users informed about the voting process.</li>
   <li> The system is built using modern web technologies and is fully responsive, ensuring compatibility with various devices and screen sizes.</li>
   <li> The system incorporates security measures such as encryption and authentication to prevent unauthorized access and ensure data privacy.</li>
   <li> The system is continually updated and maintained to ensure optimal performance and usability.</li>


    </ol>

    </div>
    </div>

    <!-- ----elections---- -->
    <div class="overview" id="two">
    <h2>How to add election</h2>
    <div class="help_text">
     <ol>
    <li> To add a new election, log in as an administrator and navigate to the "dashboard" section of the system.</li>
     <li>Click on the "Add Election" button to open the election creation form.</li>
    <li>In the form, enter the name of the election</li>
    <li>Click on the "Submit" button to create the new election.</li>
    <li>The system will now display the new election in the "Elections" section, where you can edit or delete it if needed.</li>
    <li>You can also view the election details and results from this section.</li>
    <li>Remember to inform your voters about the new election and provide them with any necessary instructions or guidelines.</li>
    <li>Repeat these steps for each new election you wish to create.</li>
    <li>print the list of elections by clicking on the print icon on the right</li>

     </ol>

    </div>
    </div>

     <!-- ----positions---- -->
     <div class="overview" id="three">
    <h2>How to add position</h2>
    <div class="help_text">
    <ol>
    <li> To add a new position, log in as an administrator and navigate to the "dashboard" section of the system.</li>
     <li>Click on the "Add Position" button to open the position creation form.</li>
    <li>In the form, choose the type of the election</li>
    <li>In the form, enter the name of the positon</li>
    <li>Click on the "Submit" button to create the new position.</li>
    <li>The system will now display the new position in the "Positions" section, where you can edit or delete it if needed.</li>
    <li>You can also view the positions details from this section.</li>
    <li>Remember to inform your voters about the new position and provide them with any necessary instructions or guidelines.</li>
    <li>Repeat these steps for each new position you wish to create.</li>
    <li>print the list of positions by clicking on the print icon on the right</li>

     </ol>
    </div>
    </div>
    
     <!-- ----nominees---- -->
     <div class="overview" id="four">
    <h2>How to add nominees</h2>
    <div class="help_text">
    <ol>
    <li> To add a new nominees, log in as an administrator and navigate to the "dashboard" section of the system.</li>
     <li>Click on the "Add nominees" button to open the nominees creation form.</li>
    <li>In the form, choose the type of the election</li>
    <li>In the form, choose the position</li>
    <li>In the form, enter the name of the nominee</li>
    <li>In the form, choose the faculty he/she is from</li>
    <li>In the form, choose the residence of the nominee</li>
    <li>In the form, choose the year of study of the nominee</li>
    <li>In the form, enter the registration number of the nominee</li>
    <li>Click on the "Submit" button to add the nominee.</li>
    <li>The system will now display the new nominee in the "nominees" section, where you can edit or delete it if needed.</li>
    <li>You can also view the nominees details from this section.</li>
    <li>Remember to inform your voters about the new nominee and provide them with any necessary instructions or guidelines.</li>
    <li>Repeat these steps for each new nominess you wish to create.</li>
    <li>print the list of nominees by clicking on the print icon on the right</li>

     </ol>


    </div>
    </div>

    <!-- ----voters---- -->
    <div class="overview" id="five">
    <h2>How to add voters</h2>
    <div class="help_text">
    <ol>
    <li> To add a new voters, log in as an administrator and navigate to the "dashboard" section of the system.</li>
     <li>Click on the "Add voters" button to open the nominees creation form.</li>
    <li>In the form, enter the name of the voter</li>
    <li>In the form, choose the faculty he/she is from</li>
    <li>In the form, choose the residence of the voter</li>
    <li>In the form, choose the year of study of the voter</li>
    <li>In the form, enter the registration number of the voter</li>
    <li>In the form, enter the email of the voter</li>
    <li>Click on the "Submit" button to add the voter.</li>
    <li>The system will now display the new voter in the "voters" section, where you can edit or delete it if needed.</li>
    <li>You can also view the voters details from this section.</li>
    <li>Repeat these steps for each new nominess you wish to create.</li>
    <li>print the list of voters by clicking on the print icon on the right</li>
     </ol>

    </div>
    </div>

    <!-- ----voters results---- -->
    <div class="overview" id="six">
    <h2>How to view voters results</h2>
    <div class="help_text">
    <ol>
    <li> To add view voters results, log in as an administrator and navigate to the "dashboard" section of the system.</li>
     <li>Click on the "votes results" button to open the results.</li>
    <li>In the form, choose the type of election</li>
    <li>Click on the "Submit" button to view results on the selected election.</li>
    <li>The system will now display the vote results in the "votes results" section.</li>
    <li>Repeat these steps for each election you wish to view more.</li>
    <li>print the vote results by clicking on the print icon on the right</li>
     </ol>

    </div>
    </div>
    <!-- ----voters results---- -->
    <div class="overview" id="seven">
    <h2>How to log out of the system</h2>
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
        Copyright 2022 @JOEWERU
        </div>
    </div>

</nav>
<!-- End Footer -->

<script src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>
