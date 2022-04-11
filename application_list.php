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
<head>
	<title>Viewing<?php echo $_SESSION['LEVEL']==1 ? " Users'" : " Students'"; ?> Data</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Students</h1>
	<div>
  <?php

  $sql = "SELECT * FROM applications
    LEFT JOIN students
    ON students.id = applications.studentid
    LEFT JOIN organizations
    ON organizations.organization_id = applications.organizationid
    ORDER BY FIELD(status, NULL, 1, 0)";

   $result = mysqli_query($connection, $sql);

   if (mysqli_num_rows($result) > 0) { 	?>

  <!-- Start table tag -->
  <table width="790" border="1" cellspacing="0" cellpadding="9">

  <!-- Print table heading -->
  <tr class="row1">
    <td align="center"><strong>Student Name</strong></td>
    <td align="center"><strong>IC</strong></td>
    <td align="center"><strong>Matric No</strong></td>
    <td align="center"><strong>Applied Organization</strong></td>
    <td align="center"><strong>Organization Availability</strong></td>
    <td align="center" ><strong>Approval Status</strong></td>
		<td align="center" colspan="2"><strong>Action</strong></td>
  </tr>

  <?php
    // output data of each row
    while($rows = mysqli_fetch_assoc($result)) {
  ?>
    <tr>
      <td><?php echo $rows['name']; ?></td>
      <td align="center"><?php echo $rows['ic']; ?></td>
      <td align="center"><?php echo $rows['matric']; ?></td>
      <td align="center"><?php echo $rows['organizationName']; ?></td>
      <td align="center"><?php echo $rows['slot']; ?></td>
      <?php if (is_null($rows['status'])) { ?>
        <td>Pending</td>
        <td class="app" align="center"> <a href="approve.php?id=<?php echo $rows['applicationId'] ?>">Approve</a> </td>
				<td class="rej" align="center"> <a href="reject.php?id=<?php echo $rows['applicationId'] ?>">Reject</a> </td>

      <?php } else if ($rows['status'] == 1) { ?>
        <td>Approved</td>
				<td colspan="2" class="del" align="center"> <a href="delete_applicants.php?id=<?php echo $rows['applicationId'] ?>">Delete</a> </td>
      <?php } else { ?>
        <td>Rejected</td>
				<td colspan="2" class="del" align="center"> <a href="delete_applicants.php?id=<?php echo $rows['applicationId'] ?>">Delete</a> </td>
      <?php } ?>

  </tr>

  <?php }

  } else {
    echo "<h3>There are no records to show</h3>";
  }
     // mysqli_close($conn);
   ?>

 </table>


  <?php if ($_SESSION['LEVEL'] == 1) { ?>
    <a class='choice'href="new_user.php">Click here to add new users</a>
  <?php } ?>
  <a class='choice'href="main.php">Return to main menu</a>	
  <a class='logout'href="logout.php">LOGOUT</a>
	</div>
</body>
</html>
