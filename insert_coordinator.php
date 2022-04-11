<?php

require("config.php");

$user = $_POST["username"];
$pass = $_POST["password"];
$name = $_POST["lect_name"];
$staf = $_POST["staffid"];

$sql = "INSERT INTO users (username, password, level) VALUES ('$user', '$pass', 2)";

if (mysqli_query($connection, $sql)) {
  $sql = "SELECT id FROM users WHERE username='$user'";
  $result = mysqli_query($connection, $sql);
  $userid = mysqli_fetch_assoc($result)["id"];
  echo "User insert successful, user id is: " . $userid;

  $sql = "INSERT INTO coordinators (name, staffid, userid) VALUES ('$name', '$staf', '$userid')";

  if (mysqli_query($connection, $sql)) {
    echo "Lecturer insert successful";
  }
} else {
  echo "error";
}
echo "<a href='main.php'>Main Page</a><br/><br/>";
mysqli_close($connection);

 ?>
