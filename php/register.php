<?php
	include 'functions.php';
	if ($_GET[password] && $_GET['repassword'] && $_GET['username'] && $_GET['name'])	:
	if (secure($_GET[password]) != secure($_GET[repassword]))	{
		$data[result] = 'fail';
		$data[problem] = 'Ai introdus 2 parole diferite.';
		echo json_encode($data);
		exit;
	}	else {
		if (strpos(secure($_GET[username]), " "))	{			
			$data[result] = 'fail';
			$data[problem] = 'Numele de utilizator este invalid (contine spatii).';
			echo json_encode($data);
			exit;
		} else {
			connect();
			if (mysql_num_rows(mysql_query("SELECT id FROM users WHERE username = '".secure($_GET[username])."'")) > 0)	{
				$data[result] = 'fail';
				$data[problem] = 'Numele de utilizator este ocupat deja, incearca altul.';
				echo json_encode($data);
				exit;
			}
			else {
				if (mysql_query("INSERT INTO users (username, password, name, tipar, inceput) VALUES('".secure($_GET[username])."', '".md5(secure($_GET[password]))."', '".secure($_GET[name])."', '".secure($_GET[tipar])."', '".date("Y-m-d", strtotime(secure($_GET[data])))."')"))	{
					session_start();
					$sql = mysql_query("SELECT * FROM users WHERE username = '".secure($_GET[username])."' AND password = '".md5(secure($_GET[password]))."'");
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
				else{
					$data[result] = 'fail';
					$data[problem] = "Am o problema cu baza de date : \n ".mysql_error();
					echo json_encode($data);
					exit;					
				}
			}
		}
	}
	else :
		$data[result] = 'fail';
		$data[problem] = 'Trebuie sa introduci atat parola cat si numele de utilizator!';
		echo json_encode($data);
		exit;
	endif;
?>