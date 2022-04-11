<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] == 3) {
	echo '<script>alert("Forbidden Access.")</script>';
	header("Location: main.php");
}

require("config.php");
?>

	<html>
	<head><title>Organization List</title></head>
	<title>Main Menu</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<body>

	<h1>Organization List</h1>

	<div>
		<?php
	     require("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

	     $sql = "SELECT * FROM organizations";
		 $result = mysqli_query($connection, $sql);

	     if (!$result) die("SQL query error encountered :".mysqli_error() );


		 if (mysqli_num_rows($result) > 0) { ?>


		<!-- Start table tag -->
		<table border="1"width="790" border="1" cellspacing="0" cellpadding="9">


		<!-- Print table heading -->
		<tr class='row1'>
		<td align="center"><strong>Organization Id</strong></td>
		<td align="center"><strong>Organization Name</strong></td>
		<td align="center"><strong>Slot Available</strong></td>
	 	</tr>

		<?php

		// output data of each row
		while($rows = mysqli_fetch_assoc($result)) {

		?>

	     <tr>
			<td><?php echo $rows['organization_id']; ?></td>
			<td><?php echo $rows['organizationName']; ?></td>
			<td><?php echo $rows['slot']; ?> / 40</td>
		</tr>


	<?php }

			}
		else {
			echo "<h3>There are no records to show</h3>";
			}

	     mysqli_close($connection);
	   ?>

	    </table>

<?php
	if ($_SESSION["LEVEL"] == 1) {?>
	<br/><br/>
	<a class='choice'href="organization_form.php">Add an organization</a><?php } ?>

	<br/><br/>
	<a class='choice'href="main.php">Return to main menu</a>

	<br/><br/>
	<a class='logout'href="logout.php">LOGOUT</a>

	</div>
	</body>
	</html>
