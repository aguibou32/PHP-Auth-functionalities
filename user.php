<?php
	session_start();
	//user.php
	require 'includes/dbh.inc.php';


	if(!isset($_SESSION['user_type'])) // If this variable is not set, it means the user is not logged in to the system
	{
		header('location:login.php?error=sessionsNotset'); // If the user is not logged in to the system, we redirect him/her to this url;
	}
	include 'header.php';
 ?>
	<div id="main-content">
		<div class="wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-user-md"></i> Users</h3>
	          <ol class="breadcrumb">
	            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
	            <li><i class="fa fa-user-md"></i>Users</li>
	          </ol>
				</div>
			</div>
			<div class="row">
				<span id="alert_action"></span> <!--Where we gonna display a message-->
				  <div class="col-lg-12">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
				          <div class="row">
				            <h3 class="panel-title">Users List</h3>
				          </div>
				        </div>
				        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
				          <div class="row" align="right">

				          </div>
				        </div>
				      </div>
				      <div class="panel-body">
				        <div class="row">
				          <div class="col-sm-12 table-responsive">
				            <table id="user_data" class="table table-bordered table-striped">
				              <thead>
				                <tr>
				                  <th>ID</th>
				                  <th>Email</th>
				                  <th>Name</th>
				                  <th>Status</th>
				                  <th>Edit</th>
				                  <th>Delete</th>
				                </tr>
				              </thead>
				            </table>
				          </div>
				        </div>
				      </div>
				    </div>
				  </div>
			</div>
			</div>
		</div>






 	<script type="">
 		$(document).ready(function() {
 			var userdataTable = $('#user_data').DataTable({
 				"processing": true,
 				"serverSide": true,
 				"order": [],
 				"ajax":{
 					url:"includes/user_fetch.inc.php",
 					type:"POST"
 				},
 				"columnDefs":[
	 				{
	 					"target":[4,5],
	 					"orderable":false
	 				}
 				],
 				"pageLength": 25

 			});
 		});
 	</script>
