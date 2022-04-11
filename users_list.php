<?php
session_start(); // Start up your PHP Session

// If the user is not logged in send him/her to the login form
if ($_SESSION["Login"] != "YES")
header("Location: login.php");

if ($_SESSION["LEVEL"] == 1){ //only user level 1 can acess
?>
	<html>
	<head>
	<title>Viewing Users Data</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
    <style>
		 h1{
		   margin-top:0px;
		 }
	   h3{
		   font-weight: 500;
	   }
		 p{
			 color: #c2484b;
		 }
	   a{
		   display:flex;
		   justify-content: center;
		   margin: 10px;
		   text-decoration:none;
		   color:white;
	   }

	   .newuser{
		   background-color:#04a2b3;
		   color: white;
		   padding: 10px;
		   position: relative;
		   top:10px;
		   margin: 10px 150px 0px;		  
		   border-radius: 10px;
	   }
	   .logout{
		   margin: 30px 200px 0px;
	   }
	   .view{
		   background-color:#04a2b3;
		   padding: 7px;
		   border-radius: 10px;
	   }
	   .search{
		   background-color:#04a2b3;
		   color: white;
		   padding: 7px;
		   border-radius: 10px;
	   }

	</style>
	<head>
	<body>
    <div>
		<h1>Coordinators</h1>
		<?php
	   require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	   $sql = "SELECT coordinators.name, coordinators.staffid, users.username, users.password, users.id, users.level
		 FROM users
		 LEFT JOIN coordinators
		 ON users.id = coordinators.userid
		 WHERE users.level = 2
		 ORDER BY coordinators.name";

		 $coordinators = mysqli_query($connection, $sql);

		 if (mysqli_num_rows($coordinators) > 0) { 	?>

		<!-- Start table tag -->
		<table border="1"width="790" border="1" cellspacing="0" cellpadding="9">

		<!-- Print table heading -->
		<tr class="row1">
		<td align="center"><strong>Name</strong></td>
		<td align="center"><strong>Staff ID</strong></td>
		<td align="center"><strong>Username</strong></td>
		<td align="center"><strong>Password</strong></td>

		<td align="center"><strong>Update</strong></td>
		<td align="center"><strong>Delete</strong></td>

		</tr>

		<?php
			// output data of each row
			while($rows = mysqli_fetch_assoc($coordinators)) {
		?>

	    <tr>
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['staffid']; ?></td>
			<td><?php echo $rows['username']; ?></td>
			<td><?php echo $rows['password']; ?></td>

			<?php $get_param = "?id=" . $rows['id'] . "&level=" . $rows['level']; ?>
			<td class="up" align="center"> <a href="update_form.php<?php echo $get_param ?>">Update</a> </td>
			<td class="del" align="center"> <a href="delete_user.php<?php echo $get_param ?>">Delete</a> </td>
		</tr>

		<?php }

		} else {
			echo "<h3>There are no records to show</h3>";
			}

	     // mysqli_close($conn);
	   ?>

	    </table>
			<br/><br/>
			<h1>Students</h1>
			<?php

		   $sql = "SELECT users.id, students.name, students.ic, students.matric, users.username, users.password, users.id, users.level
			 FROM users
			 LEFT JOIN students
			 ON users.id = students.userid
			 WHERE users.level = 3
			 ORDER BY students.name";

			 $students = mysqli_query($connection, $sql);

			 if (mysqli_num_rows($students) > 0) { 	?>

			<!-- Start table tag -->
			<table border="1" width="790" cellspacing="0" cellpadding="9">

			<!-- Print table heading -->
			<tr class="row1">
			<td align="center"><strong>Name</strong></td>
			<td align="center"><strong>IC</strong></td>
			<td align="center"><strong>Matric No</strong></td>
			<td align="center"><strong>Username</strong></td>
			<td align="center"><strong>Password</strong></td>

			<td align="center"><strong>Update</strong></td>
			<td align="center"><strong>Delete</strong></td>

			</tr>

			<?php
				// output data of each row
				while($rows = mysqli_fetch_assoc($students)) {
			?>

		    <tr>
				<td><?php echo $rows['name']; ?></td>
				<td><?php echo $rows['ic']; ?></td>
				<td><?php echo $rows['matric']; ?></td>
				<td><?php echo $rows['username']; ?></td>
				<td><?php echo $rows['password']; ?></td>

				<?php $get_param = "?id=" . $rows['id'] . "&level=" . $rows['level']; ?>
				<td class="up" align="center"> <a href="update_form.php<?php echo $get_param ?>">Update</a> </td>
				<td class="del" align="center"> <a href="delete_user.php<?php echo $get_param ?>">Delete</a> </td>
			</tr>

			<?php }

			} else {
				echo "<h3>There are no records to show</h3>";
				}

		     // mysqli_close($conn);
		   ?>

		 </table>


		<a class="newuser" href="new_user.php">Add new users</a> 
		<a class="newuser" href="main.php">Return to main menu</a> 
	  <a class= "logout "href="logout.php">LOGOUT</a>
	</div>

	</body>
	</html>


<?php
// If the user does not have the correct User level
} else if ($_SESSION["LEVEL"] != 1) {
?>
	<html>
	<head>
	<title>Error!</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
	   body{
		   font-family: 'Roboto', sans-serif;
		   color: white;
		   background-image: url("image1.png");
		   background-size: 2000px;
	   }
		 div{
       width: 600px;
		   margin: 40px auto;
		   background-color:#222230;
		   box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
		   padding: 20px;
		   border-radius: 10px;
	   }
		 .newuser{
		   background-color:#04a2b3;
		   color: white;
		   padding: 7px;
		   border-radius: 10px;
	   }
		 a{
		   text-decoration:none;
		   color:white;
	   }
		 h2{
			 color: red;
		 }
		</style>
	</head>

	<body>
	<div>
		<h2>You are not authorized to view this page</h2><br/><br/>

		<p><a class="newuser" href='main.php'>Return to main menu</a></p>
	</div>
	</body>
	</html>

<?php } ?>
