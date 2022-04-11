<?php

require("config.php");

$user = $_POST["username"];
$pass = $_POST["password"];
$name = $_POST["stu_name"];
$ic = $_POST["stu_ic"];
$matric = $_POST["matric"];

$sql = "INSERT INTO users (username, password, level) VALUES ('$user', '$pass', 3)";

if (mysqli_query($connection, $sql)) {
  $sql = "SELECT id FROM users WHERE username='$user'";
  $result = mysqli_query($connection, $sql);
  $userid = mysqli_fetch_assoc($result)["id"];
  echo "User insert successful, user id is: " . $userid;

  $sql = "INSERT INTO students (name, ic, matric, userid) VALUES ('$name', '$ic', '$matric', '$userid')";

  if (mysqli_query($connection, $sql)) {
    echo "Student insert successful";
  }
} else {
  echo "error";
}

mysqli_close($connection);

 ?>
