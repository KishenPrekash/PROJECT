<?php
session_start();

require("config.php");
?>

<html>
	<head>
		<title>Main Menu</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="style.css">

		<style>
           .choice,.logout{
			   padding: 15px;
			   margin: 14px 100px;
			   display:flex;
			   justify-content: center;
		   }
		   .logout{
			   margin:30px 200px 0px;
			   

		   }
		</style>
	</head>

	<body>
	<h1>Main Menu</h1>
	<div>
	<?php
	if ($_SESSION['LEVEL'] != 3) {
	?>
		<a class='choice' href="users_list.php">View all
			<?php echo $_SESSION['LEVEL']==1 ? 'users' : 'students'; ?>
		</a> 
	<?php
	}
	if ($_SESSION['LEVEL'] == 2) {
	?>
		<a class='choice' href="coordinator_profile.php">User's profile</a> 
	<?php
	}

	if ($_SESSION['LEVEL'] != 3) {
	?>
  	<a class='choice' href="organization_list.php">View all organizations</a> 
	<?php
	}

	if ($_SESSION['LEVEL'] != 3) {
	?>
		<a class='choice' href="application_list.php">View students' applications</a> 
	<?php
	}


	if ($_SESSION['LEVEL'] == 3) {
	?>
		<a class='choice' href="student_profile.php">Student's profile</a>
		<a class='choice' href="application_status.php">View application status</a> 
	<?php
	}
	if ($_SESSION['LEVEL'] != 2) {
	?>
  	<a class='choice' href="application_form.php">Apply for intern</a>
	<?php
	}
	?>

	<a class='logout' href="logout.php">LOGOUT</a>

</div>
</body>
</html>

<?php mysqli_close($connection); ?>
