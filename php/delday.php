<?php
	session_start();
	include 'functions.php';
	$aux = strtotime(secure($_GET[day]))." ".str_replace(" ", "", secure($_GET[text]));
	$_SESSION[zilelibere] = str_replace(",,", "", str_replace(strval($aux), "", secure($_SESSION[zilelibere])));
	connect();
	if (mysql_query("UPDATE users SET zilelibere = '".secure($_SESSION[zilelibere])."' WHERE id = '".$_SESSION[id]."'"))
		{
			$json[result] = 'success';
			$diff = floor((strtotime(secure($_GET[day])) - strtotime($_SESSION[inceput])) /(60*60*24));
			$data = explode(">", str_replace(" ", "", $_SESSION[tipar]));
			$diff = $diff - intval($diff / count($data)) * count($data);
			$json[plan] = $data[$diff];
			$json['return'] = $aux;
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