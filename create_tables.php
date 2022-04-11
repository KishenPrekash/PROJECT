<?php

require("config.php");

if (!$connection) {
  die("Error, cannot connect to database: " . mysqli_connect_error());
}

$sql = "CREATE TABLE users (
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) UNIQUE,
  password VARCHAR(100),
  level INT(3)
)";

if (mysqli_query($connection, $sql)) {
  echo "Table users created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE students (
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150),
  ic VARCHAR(12) UNIQUE,
  matric VARCHAR(30) UNIQUE,
  userid INT(4) UNSIGNED NOT NULL UNIQUE,
  CONSTRAINT student_fk FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE
)";

if (mysqli_query($connection, $sql)) {
  echo "Table students created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE coordinators (
  id INT(4) AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150),
  staffid VARCHAR(150) UNIQUE,
  userid INT(4) UNSIGNED NOT NULL UNIQUE,
  CONSTRAINT lect_fk FOREIGN KEY (userid) REFERENCES users(id) ON DELETE CASCADE
)";

if (mysqli_query($connection, $sql)) {
  echo "Table coordinators created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE organizations (
  organization_id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  organizationName VARCHAR(150) UNIQUE,
  slot INT
)";

if (mysqli_query($connection, $sql)) {
  echo "Table organizations created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

$sql = "CREATE TABLE applications (
  applicationId INT(4) AUTO_INCREMENT PRIMARY KEY,
  studentid INT(4) UNSIGNED NOT NULL,
  organizationid INT(4) UNSIGNED NOT NULL,
  status bit,
  CONSTRAINT application_fk_student FOREIGN KEY (studentid) REFERENCES students(id) ON DELETE CASCADE,
  CONSTRAINT application_fk_organization FOREIGN KEY (organizationid) REFERENCES organizations(organization_id) ON DELETE CASCADE
)";

if (mysqli_query($connection, $sql)) {
  echo "Table applications created <br>";
} else {
  echo "Error creating table: " . mysqli_error($connection) . "<br>";
}

mysqli_close($connection);

 ?>
