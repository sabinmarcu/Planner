<?php
	session_start();
	include 'functions.php';
	$data = explode(",", str_replace(" ", "", secure($_SESSION[zilelibere])));
	$data[count($data)] = strtotime(secure($_GET[day]));
	$_SESSION[zilelibere]  = implode(", ", $data);
	connect();
	if (mysql_query("UPDATE users SET zilelibere = '".secure($_SESSION[zilelibere])."' WHERE id = '".$_SESSION[id]."'"))
		{
			$json[result] = 'success';
			echo json_encode($json);
			exit;
		}
	else {
		$json[result] = 'fail';
		$json[problem] = "Error ... \n ".mysql_error();
		echo json_encode($json);
		exit;
	}
?>