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




<?php
$readOrganization = new Voting();
$rtnReadOrg = $readOrganization->READ_ORG();
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h3 style="text-align: center;">Select Election</h3><hr />
            <h4>Welcome <?php echo $_SESSION['NAME']; ?></h4>
            <?php if($rtnReadOrg) { ?>
            <form action="voting_page.php" method="GET" role="form">
                <div class="form-group">
                    <label for="organization">Election</label>
                    <select required class="form-control" name="organization">
                        <option value="">*****Select Election*****</option>
                        <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                        <option value="<?php echo $rowOrg['org']; ?>"><?php echo $rowOrg['org']; ?></option>
                        <?php } //End while ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
                <?php $rtnReadOrg->free(); ?>
            <?php } //End if ?>
        </div>
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