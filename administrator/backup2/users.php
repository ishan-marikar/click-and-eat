<?php
/**
 * Developed by : Ishan Marikar (ishan.marikar@outlook.com)
 * Started on   : 2/6/2015 at 1:26 AM
 * Project name : FinalProjectClickAndEat
 *
 * "When I wrote this, only God and I understood what I was doing.
 * Now, God only knows." -Karl Weierstrass
 *
 * For the brave souls who get this far: You are the chosen ones,
 * the valiant knights of programming who toil away, without rest,
 * fixing our most awful code. To you, true saviors, kings of men,
 * I say this: never gonna give you up, never gonna let you down,
 * never gonna run around and desert you. Never gonna make you cry,
 * never gonna say goodbye. Never gonna tell a lie and hurt you.
 *
 */
require_once("../includes/users.class.php");
require_once("header.php");

	?>

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Dashboard
				<small>Statistics</small>
			</h1>
			<ol class="breadcrumb">
				<li>
					<i class="fa fa-dashboard"></i>  <a href="index.html">Users</a>
				</li>
				<li class="active">
					<i class="fa fa-file"></i> Insights
				</li>
			</ol>
		</div>
	</div>
	<!-- /.row -->

	<?php


	echo "<div class='right-button-margin'>";
	echo "<a href='index.php' class='btn btn-default pull-right'>Read Users</a>";
	echo "</div>";




	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
		echo "<th>User-Id</th>";
		echo "<th>Full Name</th>";
		echo "<th>Email</th>";
		echo "<th>Actions</th>";
	echo "</tr>";
$users = new \FinalProject\Users();
	$allUsers = $users->getAllUsers();
	foreach ($allUsers as $singleUser) {
		echo "<tr>";

			echo "<td>{$singleUser['id']}</td>";
			echo "<td>{$singleUser['fullName']}</td>";
			echo "<td>{$singleUser['email']}</td>";

			echo "<td>";
			echo "<a href='./delete_user.php?object_id={$singleUser['id']}' class='btn btn-default delete-object'>Delete</a>";
			echo "</td>";

		echo "</tr>";
	}


	echo "</table>";




?>
	<script>
		$(document).on('click', '.delete-object', function(){

			var id = $(this).attr('delete-id');
			var q = confirm("Are you sure?");

			if (q == true){

				$.post('delete_user.php', {
					object_id: id
				}, function(data){
					location.reload();
				}).fail(function() {
					alert('Unable to delete.');
				});

			}

			return false;
		});
	</script>
<?php	require_once("footer.php");