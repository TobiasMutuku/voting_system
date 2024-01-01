<?php

//Include authentication
require("process/auth.php");

//Include database connection
require("../config/db.php");

//Include class Voters
require("classes/Voters.php");

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin_page.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="add_org.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Election</a></li>
                <li><a href="add_pos.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Position</a></li>
                <li><a href="add_nominees.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Nominees</a></li>
                <li class="active"><a href="add_voters.php"><span class="glyphicon glyphicon-plus-sign"></span>Add Voters</a></li>
                <li><a href="vote_result.php"><span class="glyphicon glyphicon-plus-sign"></span>Vote Result</a></li>

                 <!-- start helpcenter drop dropdown -->
               <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon "></span>Help center <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="help_center.php#one">System Overview</a></li>
                        <li><a href="help_center.php#two">How to Add Election</a></li>
                        <li><a href="help_center.php#three">How to Add Position</a></li>
                        <li><a href="help_center.php#four">How to Add Nominees</a></li>
                        <li><a href="help_center.php#five">How to Add Voters</a></li>
                        <li><a href="help_center.php#six">How to view voters result</a></li>
                        <li><a href="help_center.php#seven">How to Logout</a></li>
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




<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <?php
            if(isset($_POST['update'])) {
                $name       = trim($_POST['name']);
                $course     = trim($_POST['course']);
                $residence  = trim($_POST['residence']);
                $year       = trim($_POST['year']);
                $stud_id    = trim($_POST['stud_id']);
                $email      = trim($_POST['email']);

                $updateVoter = new Voters();
                $rtnUpdateVoter = $updateVoter->UPDATE_VOTER($name, $course, $residence, $year, $stud_id, $email);

            }
            ?>
            <h4>Edit Voter</h4><hr>
            <?php
            if(isset($_GET['id'])) {
                $id = trim($_GET['id']);

                $editVoter = new Voters();
                $rtnEditVoter = $editVoter->EDIT_VOTER($id);
            }
            ?>

            <?php if($rtnEditVoter) { ?>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                <?php while($rowVoter = $rtnEditVoter->fetch_assoc()) { ?>
                <div class="form-group-sm">
                    <label for="name">Name</label>
                    <input required type="text" name="name" class="form-control" placeholder="LName, FName MI." value="<?php echo $rowVoter['name']; ?>">
                </div>
                <div class="form-group-sm">
                    <label for="course">Course</label>
                    <select required name="course" class="form-control">
                        <option value="<?php echo $rowVoter['course']; ?>"><?php echo $rowVoter['course']; ?></option>
                        <option value="FoA">Faculty of Agriculture</option>
                     <option value="FASS">Faculty of Arts & Social Sciences</option>
                     <option value="FEDCOS">Faculty of Education & Community Development Studies</option>
                     <option value="FET">Faculty of Engineering & Technology</option>
                     <option value="FERD">Faculty of Environment & Resource Development</option>
                     <option value="FHS">Faculty of Health Sciences</option>
                     <option value="FOL">Faculty of Law</option>
                     <option value="FOS">Faculty of Science</option>
                     <option value="FVMS">Faculty of Veterinary Medicine & Surgery</option>
                     <option value="IWGDS">Institute of Women, Gender & Development Studies</option>
                     <option value="SoDL">School of Open & Distance Learning</option>
                    </select>
                </div>
                <div class="form-group-sm">
                     <label for="residence">Residence</label>
                        <select name="residence" class="form-control">
                        <option value="">*****Select Residence*****</option>
                            <option value="CBD">CBD</option>
                            <option value="Maringo/Ruwenzori">Maringo/Ruwenzori</option>
                            <option value="Mama Ngina/Taifa/Thornton/Old Hall">Mama Ngina/Taifa/Thornton/Old Hall</option>
                            <option value="Tatton">Tatton</option>
                            <option value="Riverside/Riverview">Riverside/Riverview</option>
                            <option value="BuruBuru/Hollywood">BuruBuru/Hollywood</option>
                            <option value="NonResidence">Non-Residence</option>
                            
                        </select>
                </div>
                <div class="form-group-sm">
                    <label for="year">Year</label>
                    <select required name="year" class="form-control">
                        <option value="<?php echo $rowVoter['year']; ?>"><?php echo $rowVoter['year']; ?></option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                    </select>
                </div>
                <div class="form-group-sm">
                    <label for="stud_id">Registration No.</label>
                    <input required type="text" name="stud_id" class="form-control" value="<?php echo $rowVoter['stud_id']; ?>">
                </div>
                <div class="form-group-sm">
                    <label for="email">Email</label>
                    <input required type="email" name="email" class="form-control" value="<?php echo $rowVoter['email']; ?>">
                </div>
                <hr>
                <div class="form-group-sm">
                    <input type="hidden" name="voter_id" value="<?php echo $rowVoter['id']; ?>">
                    <input type="submit" name="update" value="Update" class="btn btn-info">
                </div>
                <?php } //End while ?>
            </form>
                <?php $rtnEditVoter->free(); ?>
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
