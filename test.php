<?php
require("config.php");

$sql = "SELECT * FROM applications";
$result = mysqli_query($connection, $sql);

while($rows = mysqli_fetch_assoc($result)) {
  if (is_null($rows['status']))
  echo "null <br>";
}
?>
