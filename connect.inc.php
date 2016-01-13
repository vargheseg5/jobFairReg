<?php
	$dbhost = "localhost";
	$dbuser = "jobFair";
	$dbpass = "cultJobFair2016";
	$dbname = "jobFair_DB";

	$conn_error = "Could Not Connect!";

	if(!mysql_connect($dbhost, $dbuser, $dbpass) || !mysql_select_db($dbname))
	{
		die($conn_error);
	}
?>