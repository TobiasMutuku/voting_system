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
    <title>Administrator Login</title>
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
        <div class="col-md-4">
            <?php
            if(isset($_POST['submit'])) {
                $org        = trim($_POST['organization']);
                $pos        = trim($_POST['position']);
                $name       = trim($_POST['name']);
                $course     = trim($_POST['course']);
                $year       = trim($_POST['year']);
                $stud_id    = trim($_POST['stud_id']);

                $insertNominee = new Nominees();
                $rtnInsertNominee = $insertNominee->INSERT_NOMINEE($org, $pos, $name, $course, $year, $stud_id);
            }
            ?>
            <h4>Add Nominees</h4><hr>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
                <?php
                $readOrg = new Organization();
                $rtnReadOrg = $readOrg->READ_ORG();
                ?>
                <div class="form-group-sm">
                    <label for="organization">Election</label>
                    <?php if($rtnReadOrg) { ?>
                        <select required name="organization" class="form-control" id="org-list" onchange="getPos(this.value);">
                            <option value="">*****Select Election*****</option>
                            <?php while($rowOrg = $rtnReadOrg->fetch_assoc()) { ?>
                                <option value="<?php echo $rowOrg['org']; ?>"><?php echo $rowOrg['org']; ?></option>
                            <?php } //End while ?>
                        </select>
                        <?php $rtnReadOrg->free(); ?>
                    <?php } //End if ?>
                </div>
                <div class="form-group-sm">
                    <label for="position">Position</label>
                    <select required name="position" class="form-control" id="pos-list">
                        <option value="">*****Select Position*****</option>
                    </select>
                </div>
                <div class="form-group-sm">
                    <label for="name">Name</label>
                    <input required type="text" name="name" class="form-control" placeholder="LName, FName MI.">
                </div>
                <div class="form-group-sm">
                    <label for="course">Faculty</label>
                    <select required name="course" class="form-control">
                        <option value="">*****Select Faculty*****</option>
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
                        <option value="">*****Select Year*****</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                    </select>
                </div>
                <div class="form-group-sm">
                    <label for="stud_id">Registration No</label>
                    <input required type="text" name="stud_id" class="form-control">
                </div>
                <hr/>
                <div class="form-group-sm">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
        </div>

        <?php
        $readNominees = new Nominees();
        $rtnReadNominees = $readNominees->READ_NOMINEE();
        ?>
        <div class="col-md-8">
            <div style="display:flex;justify-content:space-between;place-items:center">
            <h4>List of Nominees</h4>
            <a href="print_nominee.php" target="_blank"><h3><span class="glyphicon glyphicon-print pull-right"></h3></span> </a>
            </div><hr>
            <div class="table-responsive">
                <?php if($rtnReadNominees) { ?>
                <table class="table table-bordered table-condensed table-striped">
                    <tr>
                        <th>Election</th>
                        <th>Position</th>
                        <th>Name</th>
                        <th>Course/Year</th>
                        <th>Registration No</th>
                        <th><span class="glyphicon glyphicon-edit"></span></th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                    <?php while($rowNom = $rtnReadNominees->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rowNom['org']; ?></td>
                        <td><?php echo $rowNom['pos']; ?></td>
                        <td><?php echo $rowNom['name']; ?></td>
                        <td><?php echo $rowNom['course'] . "-" . $rowNom['year']; ?></td>
                        <td><?php echo $rowNom['stud_id']; ?></td>
                        <td><a href="./edit_nominee.php?id=<?php echo $rowNom['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="./delete_nominee.php?id=<?php echo $rowNom['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <?php } //End while ?>
                </table>
                    <?php $rtnReadNominees->free(); ?>
                <?php } //end if ?>
            </div>
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
<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>
