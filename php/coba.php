<?php


	include("connection.php");
	
		


       $retval = mysql_query($sql1);
		if(! $retval )
		{
		  die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully\n";



?>		