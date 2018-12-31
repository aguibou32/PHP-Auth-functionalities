<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">m

  <title>Login Page</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/login.css">

</head>

<body class="login-img3-body">

  <div class="container">
    <form class="login-form" action="includes/login.inc.php" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <?php
            if (isset($_GET['username'])) { // Looking inside the url and checking if it is set
              $user_name = $_GET['username']; // Then we get its value
              echo '<input type="text" name="username" class="form-control" value="'.$user_name.'">'; // Setting the value inside the field
            }
            else {
              echo '<input type="text" name="username" class="form-control" placeholder="email or username" >';
            }
          ?>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>
      </div>
      <?php
        if (!isset($_GET['error'])) {
          exit();
        }
        else {
          $loginCheck = $_GET['error'];
          if ($loginCheck =="empty") {
            echo '<div class="alert alert-block alert-danger fade in">All filled required </div>';
          }
          if ($loginCheck =="sqlerror") {
            echo '<div class="alert alert-block alert-danger fade in">Connection to the database failled </div>';
          }
          elseif ($loginCheck == "wrongpassword") {
            echo '<div class="alert alert-block alert-danger">Password incorrect ! </div>';
          }
          elseif ($loginCheck == "nouser") {
            echo '<div class="alert alert-block alert-danger">Username inexistant !</div>';
          }
          elseif ($loginCheck == "error") {
            echo '<div class="alert alert-block alert-danger">Form was not submitted !</div>';
          }
        }
      ?>
    </form>
    <div class="text-right">
      <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </div>
</body>
</html>
