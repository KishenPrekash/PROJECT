<?php
session_start();

require('config.php');

$myusername=$_POST["username"];
$mypassword=$_POST["password"];

$sql="SELECT * FROM users WHERE username='$myusername' and password='$mypassword'";

$result = mysqli_query($connection, $sql);

$rows=mysqli_fetch_assoc($result);

$user_name=$rows["username"];
$user_id=$rows["id"];
$user_level=$rows["level"];

$count=mysqli_num_rows($result);

if($count==1){

$_SESSION["Login"] = "YES";
$_SESSION["WRONGPASS"] = 'NO';
$_SESSION["USER"] = $user_name;
$_SESSION["ID"] = $user_id;
$_SESSION["LEVEL"] = $user_level;

?>

<html>
<head>
<title>Logging in..</title>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
  body{
    font-family: 'Roboto', sans-serif;
    color: white;
    background-image: url("image1.png");
    background-size: 2000px;
  }
  div{
    width: 600px;
    margin: 40px auto;
    background-color:#222230;
    box-shadow: 1px 1px 22px 0px rgba(0,0,0,0.67);
    padding: 20px;
    border-radius: 10px;
  }
  h2{
    text-align:center;
  }
  a{
    text-decoration: none;
    color: white;
    display:flex;
    justify-content: center;
  }
  .enter{
    position: relative;
    top:30px;
  }
  .logout{
    background-color:#3f7bd2;
    padding: 7px;
    border-radius: 10px;
  }
  .enter{
    background-color:#04a2b3;
    color: white;
    padding: 7px;
    border-radius: 10px;
  }
  </style>
</head>
<body>
  <div>
    <h2>You are now logged in as <?php echo $_SESSION["USER"] ?> with access level <?php echo $_SESSION["LEVEL"] ?></h2><br/>
    <a class='enter' href='main.php'>Enter site</a><br/><br/>
    <a class='logout' href='index.php'>LOGOUT</a><br/><br/><br/>
</div>
</body>
</html>
<?php
} else {

$_SESSION["Login"] = "NO";
$_SESSION['WRONGPASS'] = 'YES';
header("Location: index.php");
}

mysqli_close($connection);

?>
