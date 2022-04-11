<?php
session_start();
if ($_SESSION['Login'] != 'YES')
header("Location: index.php");
require("config.php");
 ?>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Student Profile</title>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
   	 <link rel="stylesheet" href="style.css">
   </head>
   <body>
     <h1>Student Profile</h1>
     <div>
     <?php
           $user_id = $_SESSION["ID"];
     		   $sql = "SELECT users.id, students.name, students.ic, students.matric, users.username, users.password, users.id, users.level
     			 FROM users
     			 LEFT JOIN students
     			 ON users.id = students.userid
     			 WHERE users.id = $user_id
     			 ORDER BY students.name";

     			 $students = mysqli_query($connection, $sql);
      ?>
      <table border="1" width="790" cellspacing="0" cellpadding="9">

      <!-- Print table heading -->
      <tr class="row1">
      <td align="center"><strong>Name</strong></td>
      <td align="center"><strong>IC</strong></td>
      <td align="center"><strong>Matric No</strong></td>
      <td align="center"><strong>Username</strong></td>
      <td align="center"><strong>Password</strong></td>
      <td align="center"><strong>Update</strong></td>
      </tr>

      <?php
      $rows = mysqli_fetch_assoc($students) ?>
      <tr>
      <td><?php echo $rows['name']; ?></td>
      <td><?php echo $rows['ic']; ?></td>
      <td><?php echo $rows['matric']; ?></td>
      <td><?php echo $rows['username']; ?></td>
      <td><?php echo $rows['password']; ?></td>
      <?php $get_param = "?id=" . $rows['id'] . "&level=" . $rows['level']; ?>
      <td class="up"align="center"> <a href="update_form.php<?php echo $get_param ?>">Update</a> </td>
      </tr>
      </table>

    
      <a class='choice'href="main.php">Return to main menu</a>

	    
	     <a class='logout'href="logout.php">LOGOUT</a>
     </div>
    </body>
 </html>
