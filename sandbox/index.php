<?php
//Start session
session_start();

unset($_SESSION['ADMIN_ID']);
unset($_SESSION['ADMIN_NAME']);
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

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-con">
            <?php
if(isset($_SESSION['ERROR_MSG_ARR']) && is_array($_SESSION['ERROR_MSG_ARR']) && count($_SESSION['ERROR_MSG_ARR']) > 0) {
    foreach($_SESSION['ERROR_MSG_ARR'] as $msg) {
        echo "<div class='alert alert-danger'>";
        echo $msg;
        echo "</div>";
    }
    unset($_SESSION['ERROR_MSG_ARR']);
}
?>
<h3>Administrator Log-in</h3><hr>
<form method="post" action="process/login.php" role="form">
    <div class="form-group has-feedback">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" autocomplete="off" pattern="^[A-Z][a-zA-Z]{5,}$" title="Username should start with an uppercase letter and contain only letters (not less than 6 characters)">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" autocomplete="off" pattern="^(?=.*[@#$%])[A-Z](?=.*\d)(?=.*[a-z]).{5,}$" title="Password should start with an uppercase letter, contain at least one of the special characters (@, #, $, %), at least one lowercase letter and one digit (not less than 6 characters)">
    <div class="input_append">
        <div class="input-group-text">
        <span class="glyphicon glyphicon-eye-open " id="eye" style="margin-right:1rem;"></span>
    </div>
    </div>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-danger">
    </div>
</form>

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
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

</body>
</html>
