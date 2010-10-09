<?php
	include 'functions.php';
	session_start();
	connect();
	if (!($_GET[password]) && !($_GET[repassword]))	{
		$sql = mysql_query("SELECT * FROM users WHERE id = ".$_SESSION['id']);
		$user = mysql_fetch_array($sql);;
	}
	if (($_GET[password] != $_GET[repassword]) || !$user['id'])	{
		$data[result] = 'fail';
		$data[problem] = 'Ai introdus 2 parole diferite.';
		echo json_encode($data);
		exit;
	}	else {
		if ($user['id'])	$password = $user['password'];
			else $password = md5(secure($_GET['password']));
		if (mysql_query("UPDATE users SET password = '".$password."', name = '".secure($_GET[name])."', tipar = '".secure($_GET[tipar])."', inceput = '".date("Y-m-d", strtotime(secure($_GET[data])))."' WHERE id = ".$_SESSION[id]))	{
			$_SESSION['tipar'] = secure($_GET[tipar]);
			$_SESSION['inceput'] = secure($_GET[inceput]);
			$_SESSION['zilelibere'] = secure($_GET[zilelibere]);
			$data[result] = 'success';
			$data[name] = $user[name];
			echo json_encode($data);
			exit;
			}
		else {
			$data[result] = 'fail';
			$data[problem] = "Am o problema cu baza de date : \n "."UPDATE users SET password = '".md5(secure($_GET[password]))."', name = '".secure($_GET[name])."', tipar = '".secure($_GET[tipar])."', inceput = '".date("Y-m-d", strtotime(secure($_GET[data])))."' WHERE id = ".$_SESSION[id];
			echo json_encode($data);
			exit;					
		}
	}
?>
