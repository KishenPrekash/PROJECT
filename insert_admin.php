<?php

require("config.php");

$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "INSERT INTO users (username, password, level) VALUES ('$user', '$pass', 1)";

if (mysqli_query($connection, $sql)) {
  echo "<br>New admin created";
} else {
  echo "An error occurred: " . mysqli_error($connection);
}

mysqli_close($connection);

 ?>
