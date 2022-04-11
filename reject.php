<html>
<head>
  <title>Application Rejected</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
  <div>
<?php
session_start();
if ($_SESSION['LEVEL'] == 1) {
  echo '<script>alert("You need to be logged in as a Coordinator to Remove Application.");
  window.location.href = "application_list.php"</script>';
}
else{
require("config.php");

$organization_id = $_GET["id"];

$sql = "UPDATE applications SET status = 0 WHERE applicationId = '$organization_id'";

if (mysqli_query($connection, $sql)) {
  echo "<br>Application rejected";
} else {
  echo "An error occurred: " . mysqli_error($connection);
}

mysqli_close($connection);
}
 ?>
 <br/><br/>
 <a class="choice" href="application_list.php">Return to applicants list</a>
</div>
</body>
</html>
