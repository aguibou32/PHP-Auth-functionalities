<?php
		session_start();
		include ('includes/dbh.inc.php');

		if (!isset($_SESSION["user_type"])) { // We restricting users who are not logged in to access this page
			header("location: login.php?&error=sessionsnotset"); // We redirect the user that is logged in to the login.php
		}
		else {
				include ('header.php');
		}
 ?>
