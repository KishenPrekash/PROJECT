<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 3) {
  echo '<script>alert("You need to be logged in as a student to apply.")</script>';
} if ($_SESSION['LEVEL'] == 2) {
  echo "<script>window.location.href = 'main.php'</script>";
}

require("config.php");
?>

<html>
<head>
  <title>Apply Organization</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
<style>
div{
		width: 400px;
		margin: 40px auto;

	}
  table{
    
    display:flex;
    justify-content: center;
    border-collapse: collapse;
    background-color: #222230;
  }
  table tr:nth-child(even){
  background-color: #222230;
}
a{
  display:flex;
  justify-content: center;
  width: 50%;
  margin:0px auto;
}

</style>
</head>

<body>

<h1>Application Form</h1>
<div>
<?php

  require ("config.php"); //read up on php includes https://www.w3schools.com/php/php_includes.asp

  $sql = "SELECT organization_id, organizationName, slot FROM organizations WHERE slot < 40";
  $result = mysqli_query($connection, $sql);

  $user_id = $_SESSION["ID"];
  $sql = "SELECT * FROM students WHERE userid = '$user_id'";
  $student = mysqli_query($connection, $sql);
  $student_data = mysqli_fetch_assoc($student);
?>

  <form class="box" action=<?php echo $_SESSION['LEVEL'] == 3 ? '"insert_application.php"' : '"main.php"'; ?> method="post">
    <input type="hidden" name="stu_id" value="<?php echo $_SESSION['LEVEL'] == 3? $student_data['id']: "admin"; ?>">
    <table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Full Name: </td>
        <td> <input type="text" class="name" name="stu_name" value="<?php echo $_SESSION['LEVEL'] == 3? $student_data['name']: "admin"; ?>" readonly> </td>
      </tr>
      <tr>
        <td>Matric No: </td>
        <td> <input type="text" name="matric" value="<?php echo $_SESSION['LEVEL'] == 3? $student_data['matric']: "admin"; ?>" readonly> </td>
      </tr>
      <tr>
        <td>Organization: </td>
        <td>
          <select name="organization">
            <option value="">Choose an organization</option>
            <?php
              while($rows = mysqli_fetch_assoc($result)) {
                ?> <option value="<?php echo $rows['organization_id']; ?>"><?php echo $rows['organizationName'];?></option> <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <?php
        	if ($_SESSION["LEVEL"] == 3) {?><td colspan="2"> <input type="submit" value="Apply"> </td> <?php } ?>
      </tr>
    </table>
  </form>
  
	<a class='choice'href="main.php">Return to main menu</a>

	<a class='logout'href="logout.php">LOGOUT</a>
</div>
</body>
</html>
