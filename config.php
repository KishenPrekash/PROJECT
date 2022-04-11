	<?php


		$db_host='localhost';
		$db_user='root';
		$db_pass='';
		$db_name='PangkalanInduk';


	     $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

		 if ( mysqli_connect_errno() )
		  {
			  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
      }
	?>
