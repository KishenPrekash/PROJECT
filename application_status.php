<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 3) {
	echo '<script>alert("You need to be logged in as a student to view this page.")</script>';
	header("Location: main.php");
}

require("config.php");
?>

<html>
<head>
	<title>Application Status</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>List of Applications</h1>
	<div>
  <?php

  $user_id = $_SESSION["ID"];
  $sql = "SELECT * FROM applications
    INNER JOIN students
    ON students.id = applications.studentid
    INNER JOIN users
    ON users.id = students.userid
    LEFT JOIN organizations
    ON organizations.organization_id = applications.organizationid
    WHERE users.id = '$user_id'
    ORDER BY FIELD(status, NULL, 1, 0)";

   $result = mysqli_query($connection, $sql);

   if (mysqli_num_rows($result) > 0) { 	?>

  <!-- Start table tag -->
  <table width="790" border="1" cellspacing="0" cellpadding="9">

  <!-- Print table heading -->
  <tr class="row1">
    <td align="center"><strong>Requested Organization</strong></td>
    <td align="center"><strong>Organization Availability</strong></td>
    <td align="center"><strong>Approval Status</strong></td>
  </tr>

  <?php
    // output data of each row
    while($rows = mysqli_fetch_assoc($result)) {
  ?>
    <tr>
      <td><?php echo $rows['organizationName']; ?></td>
      <td><?php echo $rows['slot']; ?></td>
      <?php if (is_null($rows['status'])) { ?>
        <td>Pending</td>
      <?php } else if ($rows['status'] == 1) { ?>
        <td>Approved</td>
      <?php } else { ?>
        <td>Rejected</td>
      <?php } ?>
  </tr>

  <?php }

  } else {
    echo "<p>You haven't submitted any applications yet.</p>";
  }
     // mysqli_close($conn);
   ?>

 </table>


  <a class="submit" href="application_form.php">Submit an application</a> 
  <a class="choice" href="main.php">Return to main menu</a>	
  <a class="logout" href="logout.php">LOGOUT</a>
</div>
</body>
</html>
