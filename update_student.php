<html>
<head><title>Tahniah</title></head>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
body{
  font-family: 'Roboto', sans-serif;
  background-image: url("image1.png");
  background-size: 1600px;
}
 div{
   width:400px;
   padding: 20px;
   margin: 40px auto;
   border-radius: 17px;
   text-align: center;
   background-color:#3f7bd2;
   box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
 }
  h1{
    margin: 0px;
    color: white;
  }

</style>
<body>
  <div>
<?php

require("config.php");

$usid = $_POST['userid'];
$stid = $_POST['stu_id'];
$user = $_POST["username"];
$pass = $_POST["password"];
$name = $_POST["name"];
$stic = $_POST["stu_ic"];
$matr = $_POST['matric'];

$sql = "UPDATE users SET username = '$user', password = '$pass' WHERE id = '$usid'";

if (mysqli_query($connection, $sql)) {
  echo "<h1>User updated </h1><br>";
} else {
  echo "error";
}

$sql = "UPDATE students SET name = '$name', ic = '$stic', matric = '$matr' WHERE id = '$stid'";

if (mysqli_query($connection, $sql)) {
  echo "<h1>Student updated</h1> <br>";
} else {
  echo "<h1>error</h1>";
}
echo "<a href='main.php'>Main Page</a><br/><br/>";
mysqli_close($connection);

 ?>
</div>

</body>
</html>
