<?php
	include 'functions.php';
	if (strpos(secure($_GET[username]), " "))	{
		$data[result] = 'fail';
		$data[problem] = 'Numele de utilizator este invalid!';
		echo json_encode($data);
		exit;
	}
	else {
		connect();
		$sql = mysql_query("SELECT * FROM users WHERE username = '".secure($_GET[username])."' AND password = '".md5(secure($_GET[password]))."'");
		if (mysql_num_rows($sql) > 0)	{
			session_start();
			$user = mysql_fetch_array($sql, MYSQL_ASSOC);
			$_SESSION['id'] = $user[id];
			$_SESSION['tipar'] = $user[tipar];
			$_SESSION['inceput'] = $user[inceput];
			$_SESSION['zilelibere'] = $user[zilelibere];
			$data[result] = 'success';
			$data[name] = $user[name];
			echo json_encode($data);
			exit;
		}
		else {
			$data[result] = 'fail';
			$data[problem] = "Combinatia de username si parola este incorecta !";
			echo json_encode($data);
			exit;
		}
	}
?>