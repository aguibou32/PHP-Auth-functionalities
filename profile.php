<?php
	// This file displays and update the details of the user using the table user_details it is linked to profile_update.inc.php
	session_start();

	require 'includes/dbh.inc.php';

	if (!isset($_SESSION['user_type'])) {
		header("location:login.php");
	}
	elseif (isset($_SESSION['user_type'])) {
		$sql = "SELECT * FROM user_details WHERE user_name=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) { // If the connexion didnt work
			header("Location: profile.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "s", $_SESSION["user_name"]); // Binding the parametters
			mysqli_stmt_execute($stmt); // Will run the information inside the database
			//mysqli_stmt_store_result($stmt); Run inside the database, get the number of matches then store that number inside the variable $stmt
			$result = mysqli_stmt_get_result($stmt);
			// $resultCheck = mysqli_stmt_num_rows($stmt);  Stores the number of matches inside the variable $resultCheck
			if (!($row = mysqli_fetch_assoc($result))) { // Using an associative array to store the data we got from the variable $result
				header("Location:profile.php");
			}
			else {
				foreach ($result as $row) {
					$user_name = $row['user_name'];
					$user_email = $row['user_email'];
					$user_type = $row['user_type'];
					$user_status = $row['user_status'];
				}
				include 'header.php';
			}
		}
	}

?>

<section id="main-content">
	<section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
            <li><i class="fa fa-user-md"></i>Profile</li>
          </ol>
        </div>
      </div>
				<div class="row">
					<div class="col-lg-12">
					 <section class="panel">
						 <header class="panel-heading tab-bg-info">
							 <ul class="nav nav-tabs">
								 <li class="active">
									 <a data-toggle="tab" href="#profile">
																				 <i class="icon-user"></i>
																				 Profile
																		 </a>
								 </li>
								 <li class="">
									 <a data-toggle="tab" href="#edit-profile">
																				 <i class="icon-envelope"></i>
																				 Edit Profile
																		 </a>
								 </li>
							 </ul>
						 </header>

						 <div class="panel-body">
						 	<div class="tab-content">
						 		<div id="profile" class="tab-pane active">
												<div class="profile-activity">
													<section class="panel">
															<div class="panel-body bio-graph-info">
																	<h1>User Info</h1>
																	<div class="row">
																			<div class="bio-row">
																				<p><span>username </span>: <?php echo $user_name; ?></p>
																			</div>
																			<div class="bio-row">
																				<p><span>Email </span>: <?php echo $user_email; ?></p>
																			</div>
																			<div class="bio-row">
																				<p><span>user type </span>: <?php echo $user_type; ?></p>
																			</div>
																			<div class="bio-row">
																				<p><span>user status </span>: <?php echo $user_status; ?></p>
																			</div>
																	</div>
															</div>
														</section>
														<section>
															<div class="row">
															</div>
														</section>
													</div>
						 					</div>

											<!-- Edit profile -->
										<div id="edit-profile" class="tab-pane">
											<section class="panel">
												<div class="panel-body bio-graph-info">
													<h1> Profile Info</h1>
													<form method="post" action="includes/profile_update.inc.php" id="edit_profile_form" class="form-horizontal" role="form">
														<div class="form-group">
															<div class="col-lg-6">
																<span id="message2"></span>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-2 control-label">Email</label>
															<div class="col-lg-6">
																<input type="text" name="user_email" id="user_email" class="form-control" placeholder="Example: barry@info.com">
																<span id="error_email"></span>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-2 control-label">username</label>
															<div class="col-lg-6">
																<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Example: Barry210">
																<span id="error_username"></span>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-2 control-label">Current password</label>
															<div class="col-lg-6">
																<input type="password" name="user_current_password" id="user_current_password" class="form-control" placeholder=" ">
																<span id="error_current_password"></span>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-2 control-label">New password</label>
															<div class="col-lg-6">
																<input type="password" name="user_new_password" id="user_new_password" class="form-control" placeholder=" ">
																<p class="help-block">*Minimum 8 characters, 1 letter and 1 number</p>
																<span id="error_new_password"></span>
															</div>
														</div>
														<div class="form-group">
															<label class="col-lg-2 control-label">Repeat password</label>
															<div class="col-lg-6">
																<input type="password" name="user_repeat_password" id="user_repeat_password" class="form-control" placeholder=" ">
																<span id="error_repeat_password"></span>
															</div>
														</div>
														<div class="form-group" id="msg-bg">
															<div class="col-lg-6">
																<span id="message"></span>
															</div>
														</div>
														<div class="form-group">
															<div class="col-lg-offset-2 col-lg-10">
																<button type="submit" name="submit" id="submit_button" class="btn btn-primary">Update</button>
																<button type="button" name="cancel" id="cancel_button" class="btn btn-danger">Cancel</button>
															</div>
														</div>
													</form>
												</div>
											</section>
										</div>
						 			</div>
						 </div>
					</div>
			</div>
		</section>
	</section>
</section>

<style>

	input[type="text"], input[type="email"],input[type="password"]
	{
		border-radius: 0;
	}
	.input-error
	{
		border: 1px solid #cc0000;
		background-color: #ffff99;
	}
	.input-error:focus
	{
		border: 1px solid #cc0000;
		background-color: #ffff99;
		box-shadow: 0 0 1px #cc0000;
	}
	#error_username, #error_email, #error_current_password, #error_new_password, #error_repeat_password  #error_password
	{
		color: #cc0000;
		font-size: 16px;
	}
</style>

<script>
	$(document).ready(function(){ // Makes this script run at the last
		$('#edit_profile_form').submit(function(e){ // When the form is submitted
			e.preventDefault(); // We prevent the method and action of the form from happening
			var username = $('#user_name').val();
			var useremail = $('#user_email').val();
			var current_password = $('#user_current_password').val();
			var new_password = $('#user_new_password').val();
			var repeat_password = $('#user_repeat_password').val();
			var submit = $('#submit_button').val();
			$('#message').load("includes/profile_update.inc.php", {
		//  name (will be used inside the .php document) : actual value(We've got from the variables above);
				username: username,
				useremail: useremail,
				password: current_password,
				new_password: new_password,
				repeat_password: repeat_password,
				submit: submit

				
			});

		});
	});

</script>
