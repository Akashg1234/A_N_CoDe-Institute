<?php
	session_start();

	session_unset();

	session_destroy();

	echo "<script>alert('Successfully logout.....');</script>";
	header('Refresh: 1; URL=index.php');
?>