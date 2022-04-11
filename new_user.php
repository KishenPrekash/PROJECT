<?php
session_start();


if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 1) {
	echo '<script>alert("Forbidden Access.")</script>';
	header("Location: main.php");
}

require("config.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Create New Account</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
		<style>
	   body{
		   font-family: 'Roboto', sans-serif;
		   color: white;
		   background-image: url("image1.png");
		   background-size: 1600px;
	   }
		 .form{
       width: 400px;
			 padding: 25px;
			 border-radius: 15px;
			 background-color:#222230;
		   box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
       border-collapse: collapse;
			 margin: 100px auto;
		 }
		 h1{
			 font-weight: 700;
			 text-align: center;
		 }
		 input{
			  margin-top: 0px;
			 	color: white;
			  border-radius: 8px;
			  border: 1px;
		 }
		 input[type='submit']{
			 outline: none;
			 width: 100%;
			 background-color: #04a2b3;
			 padding: 8px 10px;
			 margin: 10px auto;
			 cursor: pointer;
		 }
		 input[type="text"]{
			 width: 280px;
			 padding: 7px;
			 margin: 10px;
			 border:1px;
			 background-color:#39304d;
		 }

		 </style>
    <script type="text/javascript">

      var previous = document;
      function changed() {
        if (document.userForm.usertype.value == previous) {
          return false;
        } else {
          var previous = document.userForm.usertype.value;
          return true;
        }
      }

      function addStudentTable() {
        var table = document.getElementById('formTable');

        var row1 = table.insertRow(3);
        var row2 = table.insertRow(4);
        var row3 = table.insertRow(5);

        var name_cell = row1.insertCell(0);
        var name_input = row1.insertCell(1);
        var ic_cell = row2.insertCell(0);
        var ic_input = row2.insertCell(1);
        var matric_cell = row3.insertCell(0);
        var matric_input = row3.insertCell(1);

        name_cell.innerHTML = 'Name: ';
        name_input.innerHTML = '<input type="text" name="stu_name">';
        ic_cell.innerHTML = 'IC number: ';
        ic_input.innerHTML = '<input type="text" name="stu_ic">';
        matric_cell.innerHTML = 'Matric No: ';
        matric_input.innerHTML = '<input type="text" name="matric">';
      }

      function addLecturerTable() {
        var table = document.getElementById('formTable');

        var row1 = table.insertRow(3);
        var row2 = table.insertRow(4);

        var name_cell = row1.insertCell(0);
        var name_input = row1.insertCell(1);
        var id_cell = row2.insertCell(0);
        var id_input = row2.insertCell(1);

        name_cell.innerHTML = 'Name: ';
        name_input.innerHTML = '<input type="text" name="lect_name">';
        id_cell.innerHTML = 'Staff ID: ';
        id_input.innerHTML = '<input type="text" name="staffid">';
      }

      function userType() {
        var type = document.userForm.usertype.value;

        var table = document.getElementById('formTable');
        var rows = table.rows.length;

        if (changed()) {
          for (let i=rows; i>3; i--) {
            table.deleteRow(3);
          }

          if (type == 'admin') {
            document.userForm.action = "insert_admin.php";
          } else if (type == 'student') {
            addStudentTable();
            document.userForm.action = "insert_student.php";
          } else if (type == 'coordinator') {
            addLecturerTable();
            document.userForm.action = "insert_coordinator.php";
          }
        }
      }
    </script>

  </head>
  <body>
    <form class="form" name='userForm' action="" method="POST">
      <h1>ADD NEW USER</h1>
			<table id="formTable" border="0">
        <tr>
          <td>Username: </td>
          <td><input type="text" name="username"></td>
        </tr>

        <tr>
          <td>Password: </td>
          <td><input type="text" name="password"></td>
        </tr>

        <tr>
          <td>User type: </td>
          <td onclick="userType()">
            <input type="radio" name="usertype" value="admin">Admin
            <input type="radio" name="usertype" value="student">Student
            <input type="radio" name="usertype" value="coordinator">Coordinator
          </td>
        </tr>
      </table>

      <input type="submit" name="submitButton">
    </form>
  </body>
</html>

<?php


 ?>
