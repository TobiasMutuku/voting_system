<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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
                $name       = trim($_POST['name']);
                $course     = trim($_POST['course']);
                $year       = trim($_POST['year']);
                $stud_id    = trim($_POST['stud_id']);
                $email      = trim($_POST['email']);

                $insertVoter = new Voters();
                $rtnInsertVoter = $insertVoter->INSERT_VOTER($name, $course, $year, $stud_id, $email);

             while($rtnInsertVoter){



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ianmwendwa5@gmail.com';                     //SMTP username
    $mail->Password   = 'bmowwtoyqreccejl';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit ssl encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ianmwendwa5@gmail.com');
    $mail->addAddress($email);     //Add a recipient
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'VOTER CONFIRMATION';
    $mail->Body    = '<div><H3>Hello ' . $name . ' <H3>
                        <p>You have been added to our voting system</P
                      <div>';
   
    $mail->send();
    echo '<script>
    alert(Message has been sent);
    </script>';

     // redirect to success page
     header("Location:add_voters.php");
     exit();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



             }


            }
            ?>
            <h4>Add Voters</h4><hr>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" role="form">
    <div class="form-group-sm">
        <label for="name">Name</label>
        <input required type="text" name="name" class="form-control" placeholder="LName, FName MI." pattern="[A-Za-z ]+" title="Please enter only letters and spaces">
        <span class="error">Please enter a valid name</span>
    </div>
    <div class="form-group-sm">
        <label for="course">Faculty</label>
        <select required name="course" class="form-control">
            <option value="">*****Select Course*****</option>
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
        <label for="stud_id">Registration  No.</label>
        <input required type="password" name="stud_id" class="form-control" pattern="[A-Z]{1}\d{2}\/\d{5}\/\d{2}" title="Please enter correct format A99/09999/99">
                </div>
                <div class="form-group-sm">
        <label for="email">Email</label>
        <input required type="email" name="email" class="form-control">
                </div><hr>
                <div class="form-group-sm">
                    <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
            </form>
        </div>

        <?php
        $readVoters = new Voters();
        $rtnReadVoters = $readVoters->READ_VOTERS();
        ?>
        <div class="col-md-8">
        <div style="display:flex;justify-content:space-between;place-items:center">
            <h4>List of Voters</h4>
            <a href="print_voter.php" target="_blank"><h3><span class="glyphicon glyphicon-print pull-right"></h3></span> </a>
            </div><hr>
            <div class="table-responsive">
                <?php if($rtnReadVoters) { ?>
                <table class="table table-bordered table-condensed table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Course/Year</th>
                        <th>Registration No</th>
                        <th>Email</th>
                        <th><span class="glyphicon glyphicon-edit"></span></th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                    </tr>
                    <?php while($rowVoter = $rtnReadVoters->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $rowVoter['name']; ?></td>
                        <td><?php echo $rowVoter['course'] . "-" . $rowVoter['year']; ?></td>
                        <td><?php echo $rowVoter['stud_id']; ?></td>
                        <td><?php echo $rowVoter['email']; ?></td>
                        
                        <td><a href="./edit_voter.php?id=<?php echo $rowVoter['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="./delete_voter.php?id=<?php echo $rowVoter['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
                    </tr>
                    <?php } //End while ?>
                </table>
                    <?php $rtnReadVoters->free(); ?>
                <?php } //End if ?>
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
<script src="../assets/js/bootstrap.min.js"></script>


</body>
</html>
