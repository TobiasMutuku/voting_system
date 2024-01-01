<?php

//Include database connection
require("config/db.php");

//Include class Organization
require("sandbox/classes/Organization.php");

//Include class Position
require("sandbox/classes/Position.php");

//Include class Nominees
require("sandbox/classes/Nominees.php");


?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
$readOrg = new Organization();
$rtnReadOrg = $readOrg->READ_ORG();
?>
<div class="container">
    <div class="row">
        <?php if($rtnReadOrg) { ?>
        <div class="col-md-3">
            <h3>Select Election</h3><hr>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET" role="form">
                <div class="form-group">
                    <label for="organization">Election</label>
                    <select name="organization" class="form-control">
                        <option value="">*****Select Election*****</option>
                        <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                        <option value="<?php echo $rowOrg['org']; ?>"><?php echo $rowOrg['org']; ?></option>
                        <?php } //End while ?>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-info">Submit</button>
            </form>
            </div>
            <?php $rtnReadOrg->free(); ?>
        <?php } //End if ?>


        <div class="col-md-9">
            <?php
            if(!isset($_GET['organization'])) {
                echo "<div class='alert alert-warning'> Please select organization and click submit to show vote result.</div>";
            } else {
            $org = trim($_GET['organization']);
            ?>
                <a href="sandbox/print_result.php?organization=<?php echo $org; ?>" target="_blank"><h3><span class="glyphicon glyphicon-print pull-right"></h3></span> </a>
                <h4><?php echo $org; ?> Result</h4>
                <hr>

                <?php
                $readPos = new Position();
                $rtnReadPos = $readPos->READ_POS_BY_ORG($org);
                ?>

                <?php if($rtnReadPos) { ?>

                    <?php while($rowPos = $rtnReadPos->fetch_assoc()) { ?>
                    <h5><?php echo $rowPos['pos']; ?></h5>

                        <?php
                        $readNomOrgPos = new Nominees();
                        $rtnReadNomOrgPos = $readNomOrgPos->READ_NOM_BY_ORG_POS($org, $rowPos['pos']);
                        ?>

                        <div class="table-responsive">
                            <?php if($rtnReadNomOrgPos) { ?>
                            <table class="table table-condensed table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Votes</th>
                                </tr>
                                <?php while($rowCountVotes = $rtnReadNomOrgPos->fetch_assoc()) { ?>




                                    <?php
                                    $countVotes = new Nominees();
                                    $rtnCountVotes = $countVotes->COUNT_VOTES($rowCountVotes['id'])
                                    ?>
                                    <tr>
                                        <td style="width: 20%;"><?php echo $rowCountVotes['id']; ?></td>
                                        <td style="width: 70%;"><?php echo $rowCountVotes['name']; ?></td>
                                        <td style="width: 10%;"><?php echo $rtnCountVotes->num_rows; ?></td>
                                    </tr>





                                <?php } //End while ?>
                            </table>
                            <?php $rtnReadNomOrgPos->free(); } //End if ?>
                        </div>

                    <?php } //End while ?>

                <?php $rtnReadPos->free(); } //End if ?>

            <?php } //End if ?>
        </div>



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
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>