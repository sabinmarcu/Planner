<?php
	include 'functions.php';
	connect();
	session_start();
	$user = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = ".$_SESSION[id]));
	echo json_encode($user);
	exit;
?>