	<html>
	<head><title>Updating User Data</title><head>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<style>
  body{
		font-family: 'Roboto', sans-serif;
		color: white;
		background-image: url("image1.png");
		background-size: 1600px;
	}
	div{
		width: 350px;
		margin: 40px auto;
		background-color:#222230;
		box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
		padding: 20px;
		border-radius: 10px;
	}
	h1{
		margin-top: 30px;
		text-align: center;
	}
	input{
		 color: white;
		 border-radius: 8px;
		 border: 1px;
	}
	input[type="text"]{
		width: 230px;
		padding: 7px;
		margin: 10px;
		border:1px;
		background-color:#39304d;
	}
	input[type='submit']{
		outline: none;
		width: 100%;
		background-color: #04a2b3;
		padding: 8px 10px;
		margin: 10px auto;
		cursor: pointer;
	}
	a{
		text-decoration: none;
		color: #3f7bd2;
	}
	</style>
	<body>

	<h1>Update User Data Form</h1>
<div>
<?php
		 $ID = $_GET['id'];

		 require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

		 if ($_GET['level'] == 2) {
			 $sql = "SELECT coordinators.id, coordinators.name, coordinators.staffid, users.username, users.password
			 FROM users
			 LEFT JOIN coordinators
			 ON users.id = coordinators.userid
			 WHERE users.id = '$ID'";

			 $result = mysqli_query($connection, $sql);
			 $rows=mysqli_fetch_assoc($result);
			 ?>

			 <form action="update_coordinator.php" method="post">
			 		<table>
			 			<tr>
			 				<td>Name: </td>
							<td>
								<input name="coordinator_id" type="hidden" value="<?php echo $rows['id']; ?>">
								<input name="userid" type="hidden" value="<?php echo $ID; ?>">
								<input type="text" name="name" value="<?php echo $rows['name']; ?>">
							</td>
			 			</tr>
						<tr>
			 				<td>Staff ID: </td>
							<td> <input type="text" name="staffid" value="<?php echo $rows['staffid']; ?>"> </td>
			 			</tr>
						<tr>
			 				<td>Username: </td>
							<td> <input type="text" name="username" value="<?php echo $rows['username']; ?>"> </td>
			 			</tr>
						<tr>
			 				<td>Password: </td>
							<td> <input type="text" name="password" value="<?php echo $rows['password']; ?>"> </td>
			 			</tr>
						<tr>
							<td colspan="2"> <input type="submit" name="submit" value="Update"> </td>
						</tr>
						<tr>
							<td colspan="2"> <a href="coordinator_profile.php">Back</a> </td>
						</tr>
			 		</table>
			 </form>

<?php
		 } else if ($_GET['level'] == 3) {
			 $sql = "SELECT students.id, students.name, students.ic, students.matric, users.username, users.password
			 FROM users
			 LEFT JOIN students
			 ON users.id = students.userid
			 WHERE users.id = '$ID'";

			 $result = mysqli_query($connection, $sql);
			 $rows=mysqli_fetch_assoc($result);
			 ?>

			 <form action="update_student.php" method="post">
			 		<table>
			 			<tr>
			 				<td>Name: </td>
							<td>
								<input name="stu_id" type="hidden" value="<?php echo $rows['id']; ?>">
								<input name="userid" type="hidden" value="<?php echo $ID; ?>">
								<input type="text" name="name" value="<?php echo $rows['name']; ?>">
							</td>
			 			</tr>
						<tr>
			 				<td>IC Number: </td>
							<td> <input type="text" name="stu_ic" value="<?php echo $rows['ic']; ?>"> </td>
			 			</tr>
						<tr>
			 				<td>Matric Number: </td>
							<td> <input type="text" name="matric" value="<?php echo $rows['matric']; ?>"> </td>
			 			</tr>
						<tr>
			 				<td>Username: </td>
							<td> <input type="text" name="username" value="<?php echo $rows['username']; ?>"> </td>
			 			</tr>
						<tr>
			 				<td>Password: </td>
							<td> <input type="text" name="password" value="<?php echo $rows['password']; ?>"> </td>
			 			</tr>
						<tr>
							<td colspan="2"> <input type="submit" name="submit" value="Update"> </td>
						</tr>
			 		</table>
			 </form>

<?php
		 } else {

		 }
?>
</div>
</body>
</html>
