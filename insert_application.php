<html>
<head>
  <title>Application Inserted!</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Application Confirmed</h1>
  <div>
<?php

require("config.php");

$student_id = $_POST["stu_id"];
$organization_id = $_POST["organization"];

$sql = "INSERT INTO applications (studentid, organizationid) VALUES ('$student_id', '$organization_id')";

if (mysqli_query($connection, $sql)) {
  echo "Application submitted. Waiting for approval.";
} else {
  echo "An error occurred: " . mysqli_error($connection);
}

mysqli_close($connection);

 ?>
 <br/><br/>
 <a class="choice" href="main.php">Return to main menu</a>
</body>
</html>
