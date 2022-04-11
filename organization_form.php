<?php
session_start();

if ($_SESSION['Login'] != 'YES')
header("Location: index.php");

if ($_SESSION['LEVEL'] != 1) {
  echo '<script>alert("You need to be logged in as a Admin to apply.");
  window.location.href = "main.php"</script>';
}

require("config.php");
?>

<html>
<head>
  <title>Insert Organization</title>
</head>
<body>

<h1>Organization Form</h1>

<form name='userForm' action="insert_organization.php" method="POST">
  <table border="1">
    <tr>
      <td>Organization Name: </td>
      <td><input type="text" name="name"></td>
    </tr>

    <tr>
      <td>Slot Available: </td>
      <td><input type="text" name="slot"></td>
    </tr>
  </table>

  <input type="submit" name="submitButton">
</form>

</body>
</html>
