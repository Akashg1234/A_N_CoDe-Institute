<?php
	$username='root';
	$server='localhost';
	$pass='';
	$dbname='ein';

	$connect=mysqli_connect($server,$username,$pass);
	if(!$connect)
		die("Connection faild...".mysqli_connect_error());
	#else
	#	echo "Successfully connected...";
	mysqli_select_db($connect,$dbname);
?>