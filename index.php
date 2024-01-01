<?php
//Start session
session_start();

unset($_SESSION['ID']);
unset($_SESSION['NAME']);
unset($_SESSION['COURSE']);
unset($_SESSION['YEAR']);
unset($_SESSION['STUD_ID']);
?>
<?php
require("config/db.php");
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
<body class="form_body">
<section class="login">
<!-- End Header -->

                 



                <?php
if(isset($_POST['submit'])) {
    $stud_id = $_POST['stud_id'];
    header('Location: stud_page.php');
    exit;
}
?>  
 <div class="form_wrapper">  
 <div class="class-title">
                <h3>Student Log-in</h3><hr>
                </div>          
<!-- HTML form -->
<form action="process/login.php" method="POST" role="form" class="login_form">
    <div class="form-group">
        <label for="reg_no">Registration No</label>
        <input required type="password" name="stud_id" class="form-control" pattern="[A-Z]{1}\d{2}\/\d{5}\/\d{2}" title="Please enter correct format A99/09999/99"id="password">
          <div class="input_append">  
        <div class="input-group-text">
             <span class="glyphicon glyphicon-eye-open" id="eye" style="color:#666;padding:1rem 0"></span>
            </div>
        </div>
    </div>

    <input type="submit" name="submit" value="Submit" class="btn btn-info">
</form>
        </div>
</div>

     <div class="system-info">
                <h3 style="font-size:2rem">About the System</h3><hr>
                <p style="font-size:1.5rem">This is a voting system designed for students to vote for their preferred candidates during school elections.</p>
                <p style="font-size:1.5rem" >Only registered students are allowed to log in and cast their votes.</p>
                <p style="font-size:1.5rem">If you encounter any issues with the system, please contact the administrator for assistance.</p>
    </div>

</section>





<!-- Footer -->
<nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">

    <div class="container">
        <div class="navbar-text pull-left">
            Copyright 2022 @ JOEWERU
        </div>
    </div>

</nav>
<!-- End Footer -->
<script>
const eye = document.getElementById('eye');
const password = document.getElementById('password');

eye.addEventListener("click", () => {
  const type = password.getAttribute("type");

  if (type === "password") {
    password.setAttribute("type", "text");
    eye.classList.remove('glyphicon-eye-open');
    eye.classList.add('glyphicon-eye-close');
  } else if (type === "text") {
    password.setAttribute("type", "password");
    eye.classList.remove('glyphicon-eye-close');
    eye.classList.add('glyphicon-eye-open');
  }
});

</script>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
