<?php

require("config.php");

$usid = $_POST['userid'];
$coid = $_POST['coordinator_id'];
$user = $_POST["username"];
$pass = $_POST["password"];
$name = $_POST["name"];
$staf = $_POST["staffid"];

$sql = "UPDATE users SET username = '$user', password = '$pass' WHERE id = '$usid'";

if (mysqli_query($connection, $sql)) {
  echo "User updated <br>";
} else {
  echo "error";
}

$sql = "UPDATE coordinators SET name = '$name', staffid = '$staf' WHERE id = '$coid'";

if (mysqli_query($connection, $sql)) {
  echo "Coordinator updated <br>";
} else {
  echo "error";
}
echo "<a href='main.php'>Main Page</a><br/><br/>";
mysqli_close($connection);

?>
