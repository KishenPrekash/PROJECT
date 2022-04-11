<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 1) {
  echo '<script>alert("You need to be logged in as Admin to delete user.");window.location.href = "main.php"</script>';
} else {

require("config.php");
?>
<html>
  <head>
    <title>Delete User</title>
  </head>
  <body>
    <div>
      <?php
      require("config.php");

      $usid = $_GET['id'];

      $sql = "DELETE FROM users WHERE id = '$usid'";

      if (mysqli_query($connection, $sql)) {
        echo "User ID = " . $usid . " deleted <br>";
      } else {
        echo "<h1>Error: " . mysqli_error($connection) . "</h1>";
      }

      mysqli_close($connection);
      ?>
   </div>
  </body>
</html>
<?php } ?>
