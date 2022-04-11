<?php

require("config.php");

$name = $_POST["name"];
$slot = $_POST["slot"];

$sql = "INSERT INTO organizations (organizationName, slot) VALUES ('$name', '$slot')";

if (mysqli_query($connection, $sql)) {
  echo "Organization inserted successfully <br>";
} else {
  echo "error: " . mysqli_error($connection);
}

mysqli_close($connection);

 ?>
 <br/><br/>
 <a href="organization_list.php">Go back to Organization List</a>
