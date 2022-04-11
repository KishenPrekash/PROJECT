<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 2) {
  echo '<script>alert("You need to be logged in as Coordinator to delete an applicant.");window.location.href = "main.php"</script>';
} else {

require("config.php");
?>
<html>
  <head>
    <title>Delete Appllicants</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  	<link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div>
      <?php
      require("config.php");

      $application_id = $_GET["id"];

      $sql = "DELETE FROM applications WHERE applicationId = '$application_id'";

      if (mysqli_query($connection, $sql)) {
        echo "Applicant deleted";
      } else {
        echo "<h1>Error: " . mysqli_error($connection) . "</h1>";
      }

      mysqli_close($connection);
      ?>
   <br/><br/>
   <a class="choice" href="application_list.php">Return to applicants list</a>
   </div>
  </body>
</html>
<?php } ?>
