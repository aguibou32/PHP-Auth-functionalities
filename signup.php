<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Sign up</title>

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
  <link rel="stylesheet" href="css/signin.css">
</head>
<body class="login-img3-body">
  <div class="container">
    <form id="main" class="login-form" action="includes/signup.inc.php" method="post">
      <div class="login-wrap">
        <p class="login-img">
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <?php
            if (isset($_GET['email'])) {
              $email = $_GET['email'];
              echo '<input type="text" name="user_email" class="form-control" placeholder="email" autofocus value="'.$email.'">';
            }
            else {
              echo '<input type="text" name="user_email" class="form-control" placeholder="email" autofocus>';
            }
            ?>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            <?php
              if (isset($_GET['username'])) {
                $user_name = $_GET['username'];
                echo '<input type="text" name="user_name" class="form-control" placeholder="user name" autofocus value="'.$user_name.'">';
              }
              else {
                echo '<input type="text" name="user_name" class="form-control" placeholder="user name" autofocus>';
              }
            ?>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>

          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" name="repeat-password" class="form-control" placeholder="Confirm password">
          </div>

        <button class="btn btn-info btn-lg btn-block" type="submit" name="signup_form">Sign up</button>
        <button class="btn btn-info btn-lg btn-block" type="submit">Sign in</button>
      </div>
      <?php
        // Getting the url first
        if (!isset($_GET['error'])) { // If we do not have a signup inside the url then we just exist the function; meaning the user did not submit the form
          exit();
        }
        else {
            $signUpCheck = $_GET['error'];

            if ($signUpCheck == "emptyfields") {
              echo "<div class='alert alert-block alert-danger fade in'>All the fields are required !</div>";
              exit();
            }
            elseif ($signUpCheck == "invaliddetails") {
              echo "<div class='alert alert-block alert-danger fade in'>Invalid email and username</div>";
              exit();
            }
            elseif ($signUpCheck == "invalidemail") {
              echo "<div class='alert alert-block alert-danger fade in'>Invalid email!</div>";
              exit();
            }
            elseif ($signUpCheck == "invalidchar") {
              echo "<div class='alert alert-block alert-danger fade in'>Invalid characters for the username!</div>";
              exit();
            }
            elseif ($signUpCheck == "password") {
              echo "<div class='alert alert-block alert-danger fade in'>Passwords do not match!</div>";
              exit();
            }
            elseif ($signUpCheck == "usertaken") {
              echo "<div class='alert alert-block alert-danger fade in'>The username or email address already exist!</div>";
              exit();
            }
            elseif ($signUpCheck == "success") {
              echo "<div class='alert alert-block alert-danger fade in'>You have been signed in!</div>";
              exit();
            }
        }

      ?>
    </form>
    <div class="bg-primary text-right">
        <div class="credits">

        </div>
      </div>
    </div>
  </div>
</body>
</html>
